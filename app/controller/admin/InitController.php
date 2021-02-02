<?php

namespace app\controller\admin;

use app\service\ShopService;
use app\support\Controller;

/**
 * 管理中心公用文件
 * Class InitController
 * @package app\controller\admin
 */
class InitController extends Controller
{
    protected function initialize()
    {
        define('ECS_ADMIN', true);

        define('PHP_SELF', parse_name(request()->controller()) . '.php');

        /* 对用户传入的变量进行转义操作。*/
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
            return redirect("" . substr(PHP_SELF, 0, strpos(PHP_SELF, '.php/') + 4));
        }

        /* 创建 ECSHOP 对象 */
        $ecs = new ECS($db_name, $prefix);
        define('DATA_DIR', $ecs->data_dir());
        define('IMAGE_DIR', $ecs->image_dir());

        /* 初始化数据库类 */
        $db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
        $db_host = $db_user = $db_pass = $db_name = null;

        /* 创建错误处理对象 */
        $err = new ecs_error('message.htm');

        /* 初始化session */
        $sess = new cls_session($db, table('sessions'), table('sessions_data'), 'ECSCP_ID');

        /* 初始化 action */
        if (!isset($_REQUEST['act'])) {
            $_REQUEST['act'] = '';
        } elseif (($_REQUEST['act'] == 'login' || $_REQUEST['act'] == 'logout' || $_REQUEST['act'] == 'signin') &&
            strpos(PHP_SELF, '/privilege.php') === false) {
            $_REQUEST['act'] = '';
        } elseif (($_REQUEST['act'] == 'forget_pwd' || $_REQUEST['act'] == 'reset_pwd' || $_REQUEST['act'] == 'get_pwd') &&
            strpos(PHP_SELF, '/get_password.php') === false) {
            $_REQUEST['act'] = '';
        }

        /* 载入系统参数 */
        $shopService = new ShopService();
        config(['config' => $shopService->getConfig()]);

        // TODO : 登录部分准备拿出去做，到时候把以下操作一起挪过去
        function captchaAction()
        {

            $img = new captcha('../data/captcha/');
            @ob_end_clean(); //清除之前出现的多余输入
            $img->generate_image();

            exit;
        }

        require(ROOT_PATH . 'languages/' . config('shop.lang') . '/admin/common.php');
        require(ROOT_PATH . 'languages/' . config('shop.lang') . '/admin/log_action.php');

        if (file_exists(ROOT_PATH . 'languages/' . config('shop.lang') . '/admin/' . basename(PHP_SELF))) {
            include(ROOT_PATH . 'languages/' . config('shop.lang') . '/admin/' . basename(PHP_SELF));
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

        if (preg_replace('/(?:\.|\s+)[a-z]*$/i', '', config('shop.ecs_version')) != preg_replace('/(?:\.|\s+)[a-z]*$/i', '', VERSION)
            && file_exists('../upgrade/index.php')) {
            // 转到升级文件
            return redirect("../upgrade/index.php");

            exit;
        }

        /* 创建 Smarty 对象。*/
        $smarty = new cls_template;

        $smarty->template_dir = ROOT_PATH . ADMIN_PATH . '/templates';
        $smarty->compile_dir = ROOT_PATH . 'temp/compiled/admin';
        $smarty->force_compile = true;

        $this->assign('lang', $_LANG);
        $this->assign('help_open', config('shop.help_open'));

        $this->assign('enable_order_check', config('shop.enable_order_check'));

        /* 验证管理员身份 */
        if ((!isset($_SESSION['admin_id']) || intval($_SESSION['admin_id']) <= 0) &&
            $_REQUEST['act'] != 'login' && $_REQUEST['act'] != 'signin' &&
            $_REQUEST['act'] != 'forget_pwd' && $_REQUEST['act'] != 'reset_pwd' && $_REQUEST['act'] != 'check_order') {
            /* session 不存在，检查cookie */
            if (!empty($_COOKIE['ECSCP']['admin_id']) && !empty($_COOKIE['ECSCP']['admin_pass'])) {
                // 找到了cookie, 验证cookie信息
                $sql = 'SELECT user_id, user_name, password, add_time, action_list, last_login ' .
                    ' FROM ' . table('admin_user') .
                    " WHERE user_id = '" . intval($_COOKIE['ECSCP']['admin_id']) . "'";
                $row = $db->getRow($sql);

                if (!$row) {
                    // 没有找到这个记录
                    setcookie($_COOKIE['ECSCP']['admin_id'], '', 1, null, null, null, true);
                    setcookie($_COOKIE['ECSCP']['admin_pass'], '', 1, null, null, null, true);

                    if (!empty($_REQUEST['is_ajax'])) {
                        return make_json_error($_LANG['priv_error']);
                    } else {
                        return redirect("privilege.php?act=login");
                    }

                    exit;
                } else {
                    // 检查密码是否正确
                    if (md5($row['password'] . config('shop.hash_code') . $row['add_time']) == $_COOKIE['ECSCP']['admin_pass']) {
                        !isset($row['last_time']) && $row['last_time'] = '';
                        set_admin_session($row['user_id'], $row['user_name'], $row['action_list'], $row['last_time']);

                        // 更新最后登录时间和IP
                        $db->query('UPDATE ' . table('admin_user') .
                            " SET last_login = '" . gmtime() . "', last_ip = '" . real_ip() . "'" .
                            " WHERE user_id = '" . $_SESSION['admin_id'] . "'");
                    } else {
                        setcookie($_COOKIE['ECSCP']['admin_id'], '', 1, null, null, null, true);
                        setcookie($_COOKIE['ECSCP']['admin_pass'], '', 1, null, null, null, true);

                        if (!empty($_REQUEST['is_ajax'])) {
                            return make_json_error($_LANG['priv_error']);
                        } else {
                            return redirect("privilege.php?act=login");
                        }

                        exit;
                    }
                }
            } else {
                if (!empty($_REQUEST['is_ajax'])) {
                    return make_json_error($_LANG['priv_error']);
                } else {
                    return redirect("privilege.php?act=login");
                }

                exit;
            }
        }

        $this->assign('token', config('shop.token'));

        if ($_REQUEST['act'] != 'login' && $_REQUEST['act'] != 'signin' &&
            $_REQUEST['act'] != 'forget_pwd' && $_REQUEST['act'] != 'reset_pwd' && $_REQUEST['act'] != 'check_order') {
            $admin_path = preg_replace('/:\d+/', '', $ecs->url()) . ADMIN_PATH;
            if (!empty($_SERVER['HTTP_REFERER']) &&
                strpos(preg_replace('/:\d+/', '', $_SERVER['HTTP_REFERER']), $admin_path) === false) {
                if (!empty($_REQUEST['is_ajax'])) {
                    return make_json_error($_LANG['priv_error']);
                } else {
                    return redirect("privilege.php?act=login");
                }

                exit;
            }
        }

        //header('Cache-control: private');
        header('content-type: text/html; charset=' . EC_CHARSET);
        header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');

        /* 判断是否支持gzip模式 */
        if (gzip_enabled()) {
            ob_start('ob_gzhandler');
        } else {
            ob_start();
        }
    }
}
