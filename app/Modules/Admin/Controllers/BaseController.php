<?php

declare(strict_types=1);

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use ECS;
use cls_mysql;
use ecs_error;
use cls_session;
use cls_template;
use captcha;

abstract class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(function (Request $request, $next) {
            $response = $this->initialize($request);
            if ($response) {
                return $response;
            }
            return $next($request);
        });
    }

    protected function initialize(Request $request)
    {
        if (!defined('ECS_ADMIN')) {
            define('ECS_ADMIN', true);
        }

        error_reporting(E_ALL);

        if (!defined('ROOT_PATH')) {
            define('ROOT_PATH', str_replace('\\', '/', dirname(__DIR__, 2)) . '/');
        }

        require_once ROOT_PATH . 'includes/inc_constant.php';

        /* 初始化设置 */
        @ini_set('memory_limit', '1G');
        @ini_set('session.cache_expire', '180');
        @ini_set('session.use_trans_sid', '0');
        @ini_set('session.use_cookies', '1');
        @ini_set('session.auto_start', '0');
        @ini_set('display_errors', defined('DEBUG_MODE') && DEBUG_MODE ? '1' : '0');

        require_once ROOT_PATH . '/data/config.php';

        date_default_timezone_set($timezone ?? 'PRC');

        if (isset($_SERVER['PHP_SELF'])) {
            if (!defined('PHP_SELF')) define('PHP_SELF', $_SERVER['PHP_SELF']);
        } else {
            if (!defined('PHP_SELF')) define('PHP_SELF', $_SERVER['SCRIPT_NAME']);
        }

        require_once ROOT_PATH . 'includes/cls_ecshop.php';
        require_once ROOT_PATH . 'includes/cls_error.php';
        require_once ROOT_PATH . 'includes/lib_time.php';
        require_once ROOT_PATH . 'includes/lib_base.php';
        require_once ROOT_PATH . 'includes/lib_common.php';
        require_once ROOT_PATH . ADMIN_PATH . '/includes/lib_main.php';
        require_once ROOT_PATH . ADMIN_PATH . '/includes/cls_exchange.php';

        /* 对用户传入的变量进行转义操作。 */
        if (!empty($_GET)) {
            $_GET = addslashes_deep($_GET);
        }
        if (!empty($_POST)) {
            $_POST = addslashes_deep($_POST);
        }

        $_COOKIE = addslashes_deep($_COOKIE);
        $_REQUEST = addslashes_deep($_REQUEST);

        /* 对路径进行安全处理 */
        if (strpos(PHP_SELF, '.php/') !== false) {
            return redirect(substr(PHP_SELF, 0, strpos(PHP_SELF, '.php/') + 4));
        }

        /* 创建 ECSHOP 对象 */
        global $ecs, $db, $err, $sess, $smarty, $_CFG, $_LANG;

        $ecs = new ECS($db_name, $prefix);
        if (!defined('DATA_DIR')) define('DATA_DIR', $ecs->data_dir());
        if (!defined('IMAGE_DIR')) define('IMAGE_DIR', $ecs->image_dir());

        /* 初始化数据库类 */
        require_once ROOT_PATH . 'includes/cls_mysql.php';
        $db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
        $db_host = $db_user = $db_pass = $db_name = null;

        /* 创建错误处理对象 */
        $err = new ecs_error('message.htm');

        /* 初始化session */
        require_once ROOT_PATH . 'includes/cls_session.php';
        $sess = new cls_session($db, $ecs->table('sessions'), $ecs->table('sessions_data'), 'ECSCP_ID');

        /* 初始化 action */
        $act = $request->input('act', '');
        if (in_array($act, ['login', 'logout', 'signin']) && strpos(PHP_SELF, '/privilege.php') === false) {
            $act = '';
        } elseif (in_array($act, ['forget_pwd', 'reset_pwd', 'get_pwd']) && strpos(PHP_SELF, '/get_password.php') === false) {
            $act = '';
        }
        $request->merge(['act' => $act]);
        $_REQUEST['act'] = $act;

        /* 载入系统参数 */
        $_CFG = load_config();

        // TODO : 登录部分准备拿出去做，到时候把以下操作一起挪过去
        if ($act == 'captcha') {
            include_once ROOT_PATH . 'includes/cls_captcha.php';

            $img = new captcha('../data/captcha/');
            @ob_end_clean(); // 清除之前出现的多余输入
            $img->generate_image();

            exit;
        }

        require_once ROOT_PATH . 'languages/' . $_CFG['lang'] . '/admin/common.php';
        require_once ROOT_PATH . 'languages/' . $_CFG['lang'] . '/admin/log_action.php';

        if (file_exists(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/admin/' . basename(PHP_SELF))) {
            include_once ROOT_PATH . 'languages/' . $_CFG['lang'] . '/admin/' . basename(PHP_SELF);
        }

        if (!file_exists('../temp/caches')) {
            @mkdir('../temp/caches', 0777);
            @chmod('../temp/caches', 0777);
        }

        if (!file_exists('../temp/compiled/admin')) {
            @mkdir('../temp/compiled/admin', 0777);
            @chmod('../temp/compiled/admin', 0777);
        }

        clearstatcache();

        if (preg_replace('/(?:\.|\s+)[a-z]*$/i', '', $_CFG['ecs_version']) != preg_replace('/(?:\.|\s+)[a-z]*$/i', '', VERSION)
            && file_exists('../upgrade/index.php')) {
            // 转到升级文件
            return redirect('../upgrade/index.php');
        }

        /* 创建 Smarty 对象。 */
        require_once ROOT_PATH . 'includes/cls_template.php';
        $smarty = new cls_template;

        $smarty->template_dir = ROOT_PATH . ADMIN_PATH . '/templates';
        $smarty->compile_dir = ROOT_PATH . 'temp/compiled/admin';

        if (defined('DEBUG_MODE') && DEBUG_MODE) {
            $smarty->force_compile = true;
        }

        $this->assign('lang', $_LANG);
        $this->assign('help_open', $_CFG['help_open'] ?? 0);

        if (isset($_CFG['enable_order_check'])) {  // 为了从旧版本顺利升级到2.5.0
            $this->assign('enable_order_check', $_CFG['enable_order_check']);
        } else {
            $this->assign('enable_order_check', 0);
        }

        /* 验证管理员身份 */
        $allowedActs = ['login', 'signin', 'forget_pwd', 'reset_pwd', 'check_order'];
        if ((!Session::has('admin_id') || intval(Session::get('admin_id')) <= 0) && !in_array($act, $allowedActs)) {
            /* session 不存在，检查cookie */
            $ecscpCookie = $request->cookie('ECSCP');
            if (!empty($ecscpCookie['admin_id']) && !empty($ecscpCookie['admin_pass'])) {
                // 找到了cookie, 验证cookie信息
                $row = DB::table('admin_user')->where('user_id', intval($ecscpCookie['admin_id']))->first();

                if (!$row) {
                    // 没有找到这个记录
                    Cookie::queue(Cookie::forget('ECSCP[admin_id]'));
                    Cookie::queue(Cookie::forget('ECSCP[admin_pass]'));

                    if ($request->input('is_ajax') || $request->ajax()) {
                        return response()->json(['error' => 1, 'message' => $_LANG['priv_error']]);
                    } else {
                        return redirect()->route('admin.login');
                    }
                } else {
                    // 检查密码是否正确
                    if (md5($row->password . $_CFG['hash_code'] . $row->add_time) == $ecscpCookie['admin_pass']) {
                        !isset($row->last_time) && $row->last_time = '';
                        set_admin_session($row->user_id, $row->user_name, $row->action_list, $row->last_time);

                        // 更新最后登录时间和IP
                        DB::table('admin_user')->where('user_id', Session::get('admin_id'))->update([
                            'last_login' => gmtime(),
                            'last_ip' => $request->ip()
                        ]);
                    } else {
                        Cookie::queue(Cookie::forget('ECSCP[admin_id]'));
                        Cookie::queue(Cookie::forget('ECSCP[admin_pass]'));

                        if ($request->input('is_ajax') || $request->ajax()) {
                            return response()->json(['error' => 1, 'message' => $_LANG['priv_error']]);
                        } else {
                            return redirect()->route('admin.login');
                        }
                    }
                }
            } else {
                if ($request->input('is_ajax') || $request->ajax()) {
                    return response()->json(['error' => 1, 'message' => $_LANG['priv_error']]);
                } else {
                    return redirect()->route('admin.login');
                }
            }
        }

        $this->assign('token', $_CFG['token'] ?? '');

        if (!in_array($act, $allowedActs)) {
            $admin_path = preg_replace('/:\d+/', '', $ecs->url()) . ADMIN_PATH;
            if (!empty($_SERVER['HTTP_REFERER']) &&
                strpos(preg_replace('/:\d+/', '', $_SERVER['HTTP_REFERER']), $admin_path) === false) {
                if ($request->input('is_ajax') || $request->ajax()) {
                    return response()->json(['error' => 1, 'message' => $_LANG['priv_error']]);
                } else {
                    return redirect()->route('admin.login');
                }
            }
        }

        header('content-type: text/html; charset=' . EC_CHARSET);
        header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');

        if (defined('DEBUG_MODE') && DEBUG_MODE) {
            error_reporting(E_ALL);
        } else {
            error_reporting(E_ALL ^ E_NOTICE);
        }

        /* 判断是否支持gzip模式 */
        if (function_exists('gzip_enabled') && gzip_enabled()) {
            ob_start('ob_gzhandler');
        } else {
            ob_start();
        }

        return null;
    }
}
