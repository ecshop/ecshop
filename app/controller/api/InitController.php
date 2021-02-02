<?php

namespace app\controller\api;

use app\service\ShopService;
use app\support\Controller;

/**
 * API 公用初始化文件
 */
class InitController extends Controller
{
    protected function initialize()
    {
        define('PHP_SELF', parse_name(request()->controller()) . '.php');

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
        $db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
        $db_host = $db_user = $db_pass = $db_name = null;

        /* 初始化session */
        $sess_name = defined("SESS_NAME") ? SESS_NAME : 'ECS_ID';
        $sess = new cls_session($db, table('sessions'), table('sessions_data'), $sess_name);

        /* 载入系统参数 */
        $shopService = new ShopService();
        config(['config' => $shopService->getConfig()]);

        /* 初始化用户插件 */
        $user = init_users();

        /* 判断是否支持 Gzip 模式 */
        if (gzip_enabled()) {
            ob_start('ob_gzhandler');
        }

        header('Content-type: text/html; charset=' . EC_CHARSET);
    }
}
