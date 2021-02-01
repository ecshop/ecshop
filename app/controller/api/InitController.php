<?php

namespace app\controller\api;

use app\support\Controller;

/**
 * API 公用初始化文件
 */
class InitController extends Controller
{
    protected function initialize()
    {

        $php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        if ('/' == substr($php_self, -1)) {
            $php_self .= 'index.php';
        }
        define('PHP_SELF', $php_self);

        require(ROOT_PATH . 'includes/inc_constant.php');
        require(ROOT_PATH . 'includes/cls_ecshop.php');
        require(ROOT_PATH . 'includes/lib_base.php');
        require(ROOT_PATH . 'includes/lib_common.php');
        require(ROOT_PATH . 'includes/lib_time.php');

        /* 对用户传入的变量进行转义操作。*/
        if (!get_magic_quotes_gpc()) {
            if (!empty($_GET)) {
                $_GET = addslashes_deep($_GET);
            }
            if (!empty($_POST)) {
                $_POST = addslashes_deep($_POST);
            }

            $_COOKIE = addslashes_deep($_COOKIE);
            $_REQUEST = addslashes_deep($_REQUEST);
        }

        /* 创建 ECSHOP 对象 */
        $ecs = new ECS($db_name, $prefix);
        $data_dir = $ecs->data_dir();

        /* 初始化数据库类 */
        require(ROOT_PATH . 'includes/cls_mysql.php');
        $db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
        $db_host = $db_user = $db_pass = $db_name = null;

        /* 初始化session */
        require(ROOT_PATH . 'includes/cls_session.php');
        $sess_name = defined("SESS_NAME") ? SESS_NAME : 'ECS_ID';
        $sess = new cls_session($db, $ecs->table('sessions'), $ecs->table('sessions_data'), $sess_name);

        /* 载入系统参数 */
        $_CFG = load_config();

        /* 初始化用户插件 */
        $user = init_users();

        if ((DEBUG_MODE & 1) == 1) {
            error_reporting(E_ALL);
        } else {
            error_reporting(E_ALL ^ E_NOTICE);
        }

        /* 判断是否支持 Gzip 模式 */
        if (gzip_enabled()) {
            ob_start('ob_gzhandler');
        }

        header('Content-type: text/html; charset=' . EC_CHARSET);
    }
}

