<?php

namespace app\controller;

use app\support\Controller;

/**
 * 前台公用文件
 */
class InitController extends Controller
{
    protected function initialize()
    {
        if (!file_exists(ROOT_PATH . 'data/install.lock') && !file_exists(ROOT_PATH . 'includes/install.lock')
            && !defined('NO_CHECK_INSTALL')) {
            header("Location: ./install/index.php\n");

            exit;
        }

        $php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        if ('/' == substr($php_self, -1)) {
            $php_self .= 'index.php';
        }
        define('PHP_SELF', $php_self);

        require(ROOT_PATH . 'includes/inc_constant.php');
        require(ROOT_PATH . 'includes/cls_ecshop.php');
        require(ROOT_PATH . 'includes/cls_error.php');
        require(ROOT_PATH . 'includes/lib_time.php');
        require(ROOT_PATH . 'includes/lib_base.php');
        require(ROOT_PATH . 'includes/lib_common.php');
        require(ROOT_PATH . 'includes/lib_main.php');
        require(ROOT_PATH . 'includes/lib_insert.php');
        require(ROOT_PATH . 'includes/lib_goods.php');
        require(ROOT_PATH . 'includes/lib_article.php');

        /* 对用户传入的变量进行转义操作。*/
        if (!empty($_GET)) {
            $_GET = addslashes_deep($_GET);
        }
        if (!empty($_POST)) {
            $_POST = addslashes_deep($_POST);
        }

        $_COOKIE = addslashes_deep($_COOKIE);
        $_REQUEST = addslashes_deep($_REQUEST);

        /* 创建 ECSHOP 对象 */
        $ecs = new ECS($db_name, $prefix);
        define('DATA_DIR', $ecs->data_dir());
        define('IMAGE_DIR', $ecs->image_dir());

        /* 初始化数据库类 */
        require(ROOT_PATH . 'includes/cls_mysql.php');
        $db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
        $db->set_disable_cache_tables(array($ecs->table('sessions'), $ecs->table('sessions_data'), $ecs->table('cart')));
        $db_host = $db_user = $db_pass = $db_name = null;

        /* 创建错误处理对象 */
        $err = new ecs_error('message.dwt');

        /* 载入系统参数 */
        $_CFG = load_config();

        /* 载入语言文件 */
        require(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/common.php');

        if ($_CFG['shop_closed'] == 1) {
            /* 商店关闭了，输出关闭的消息 */
            header('Content-type: text/html; charset=' . EC_CHARSET);

            die('<div style="margin: 150px; text-align: center; font-size: 14px"><p>' . $_LANG['shop_closed'] . '</p><p>' . $_CFG['close_comment'] . '</p></div>');
        }

        if (is_spider()) {
            /* 如果是蜘蛛的访问，那么默认为访客方式，并且不记录到日志中 */
            if (!defined('INIT_NO_USERS')) {
                define('INIT_NO_USERS', true);
                /* 整合UC后，如果是蜘蛛访问，初始化UC需要的常量 */
                if ($_CFG['integrate_code'] == 'ucenter') {
                    $user = init_users();
                }
            }
            $_SESSION = array();
            $_SESSION['user_id'] = 0;
            $_SESSION['user_name'] = '';
            $_SESSION['email'] = '';
            $_SESSION['user_rank'] = 0;
            $_SESSION['discount'] = 1.00;
        }

        if (!defined('INIT_NO_USERS')) {
            /* 初始化session */
            include(ROOT_PATH . 'includes/cls_session.php');

            $sess = new cls_session($db, $ecs->table('sessions'), $ecs->table('sessions_data'));

            define('SESS_ID', $sess->get_session_id());
        }
        if (isset($_SERVER['PHP_SELF'])) {
            $_SERVER['PHP_SELF'] = htmlspecialchars($_SERVER['PHP_SELF']);
        }
        if (!defined('INIT_NO_SMARTY')) {
            header('Cache-control: private');
            header('Content-type: text/html; charset=' . EC_CHARSET);

            /* 创建 Smarty 对象。*/
            require(ROOT_PATH . 'includes/cls_template.php');
            $smarty = new cls_template;

            $smarty->cache_lifetime = $_CFG['cache_time'];
            $smarty->template_dir = ROOT_PATH . 'themes/' . $_CFG['template'];
            $smarty->cache_dir = ROOT_PATH . 'temp/caches';
            $smarty->compile_dir = ROOT_PATH . 'temp/compiled';
            $smarty->direct_output = true;
            $smarty->force_compile = true;

            $smarty->assign('lang', $_LANG);
            $smarty->assign('ecs_charset', EC_CHARSET);
            if (!empty($_CFG['stylename'])) {
                $smarty->assign('ecs_css_path', 'themes/' . $_CFG['template'] . '/style_' . $_CFG['stylename'] . '.css');
            } else {
                $smarty->assign('ecs_css_path', 'themes/' . $_CFG['template'] . '/style.css');
            }
        }

        if (!defined('INIT_NO_USERS')) {
            /* 会员信息 */
            $user = init_users();

            if (!isset($_SESSION['user_id'])) {
                /* 获取投放站点的名称 */
                $site_name = isset($_GET['from']) ? htmlspecialchars($_GET['from']) : addslashes($_LANG['self_site']);
                $from_ad = !empty($_GET['ad_id']) ? intval($_GET['ad_id']) : 0;

                $_SESSION['from_ad'] = $from_ad; // 用户点击的广告ID
                $_SESSION['referer'] = stripslashes($site_name); // 用户来源

                unset($site_name);

                if (!defined('INGORE_VISIT_STATS')) {
                    visit_stats();
                }
            }

            if (empty($_SESSION['user_id'])) {
                if ($user->get_cookie()) {
                    /* 如果会员已经登录并且还没有获得会员的帐户余额、积分以及优惠券 */
                    if ($_SESSION['user_id'] > 0) {
                        update_user_info();
                    }
                } else {
                    $_SESSION['user_id'] = 0;
                    $_SESSION['user_name'] = '';
                    $_SESSION['email'] = '';
                    $_SESSION['user_rank'] = 0;
                    $_SESSION['discount'] = 1.00;
                    if (!isset($_SESSION['login_fail'])) {
                        $_SESSION['login_fail'] = 0;
                    }
                }
            }

            /* 设置推荐会员 */
            if (isset($_GET['u'])) {
                set_affiliate();
            }

            /* session 不存在，检查cookie */
            if (!empty($_COOKIE['ECS']['user_id']) && !empty($_COOKIE['ECS']['password'])) {
                // 找到了cookie, 验证cookie信息
                $sql = 'SELECT user_id, user_name, password ' .
                    ' FROM ' . $ecs->table('users') .
                    " WHERE user_id = '" . intval($_COOKIE['ECS']['user_id']) . "' AND password = '" . $_COOKIE['ECS']['password'] . "'";

                $row = $db->getRow($sql);

                if (!$row) {
                    // 没有找到这个记录
                    $time = time() - 3600;
                    setcookie("ECS[user_id]", '', $time, '/', null, null, true);
                    setcookie("ECS[password]", '', $time, '/', null, null, true);
                } else {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    update_user_info();
                }
            }

            if (isset($smarty)) {
                $smarty->assign('ecs_session', $_SESSION);
            }
        }

        /* 判断是否支持 Gzip 模式 */
        if (!defined('INIT_NO_SMARTY') && gzip_enabled()) {
            ob_start('ob_gzhandler');
        } else {
            ob_start();
        }
    }

    protected function assign_template($ctype = '', $catlist = array())
    {
        global $smarty;

        $smarty->assign('image_width', $GLOBALS['_CFG']['image_width']);
        $smarty->assign('image_height', $GLOBALS['_CFG']['image_height']);
        $smarty->assign('points_name', $GLOBALS['_CFG']['integral_name']);
        $smarty->assign('qq', explode(',', $GLOBALS['_CFG']['qq']));
        $smarty->assign('ww', explode(',', $GLOBALS['_CFG']['ww']));
        $smarty->assign('ym', explode(',', $GLOBALS['_CFG']['ym']));
        $smarty->assign('msn', explode(',', $GLOBALS['_CFG']['msn']));
        $smarty->assign('skype', explode(',', $GLOBALS['_CFG']['skype']));
        $smarty->assign('stats_code', $GLOBALS['_CFG']['stats_code']);
        $smarty->assign('copyright', sprintf($GLOBALS['_LANG']['copyright'], date('Y'), $GLOBALS['_CFG']['shop_name']));
        $smarty->assign('shop_name', $GLOBALS['_CFG']['shop_name']);
        $smarty->assign('service_email', $GLOBALS['_CFG']['service_email']);
        $smarty->assign('service_phone', $GLOBALS['_CFG']['service_phone']);
        $smarty->assign('shop_address', $GLOBALS['_CFG']['shop_address']);
        $smarty->assign('licensed', license_info());
        $smarty->assign('ecs_version', VERSION);
        $smarty->assign('icp_number', $GLOBALS['_CFG']['icp_number']);
        $smarty->assign('username', !empty($_SESSION['user_name']) ? $_SESSION['user_name'] : '');
        $smarty->assign('category_list', cat_list(0, 0, true, 2, false));
        $smarty->assign('catalog_list', cat_list(0, 0, false, 1, false));
        $smarty->assign('navigator_list', get_navigator($ctype, $catlist));  //自定义导航栏

        if (!empty($GLOBALS['_CFG']['search_keywords'])) {
            $searchkeywords = explode(',', trim($GLOBALS['_CFG']['search_keywords']));
        } else {
            $searchkeywords = array();
        }
        $smarty->assign('searchkeywords', $searchkeywords);
    }
}
