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

        return null;
    }
}
