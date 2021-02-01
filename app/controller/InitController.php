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
            $smarty = new cls_template;

            $smarty->cache_lifetime = $_CFG['cache_time'];
            $smarty->template_dir = ROOT_PATH . 'themes/' . $_CFG['template'];
            $smarty->cache_dir = ROOT_PATH . 'temp/caches';
            $smarty->compile_dir = ROOT_PATH . 'temp/compiled';
            $smarty->direct_output = true;
            $smarty->force_compile = true;

            $this->assign('lang', $_LANG);
            $this->assign('ecs_charset', EC_CHARSET);
            if (!empty($_CFG['stylename'])) {
                $this->assign('ecs_css_path', 'themes/' . $_CFG['template'] . '/style_' . $_CFG['stylename'] . '.css');
            } else {
                $this->assign('ecs_css_path', 'themes/' . $_CFG['template'] . '/style.css');
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
                $this->assign('ecs_session', $_SESSION);
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

        $this->assign('image_width', $GLOBALS['_CFG']['image_width']);
        $this->assign('image_height', $GLOBALS['_CFG']['image_height']);
        $this->assign('points_name', $GLOBALS['_CFG']['integral_name']);
        $this->assign('qq', explode(',', $GLOBALS['_CFG']['qq']));
        $this->assign('ww', explode(',', $GLOBALS['_CFG']['ww']));
        $this->assign('ym', explode(',', $GLOBALS['_CFG']['ym']));
        $this->assign('msn', explode(',', $GLOBALS['_CFG']['msn']));
        $this->assign('skype', explode(',', $GLOBALS['_CFG']['skype']));
        $this->assign('stats_code', $GLOBALS['_CFG']['stats_code']);
        $this->assign('copyright', sprintf($GLOBALS['_LANG']['copyright'], date('Y'), $GLOBALS['_CFG']['shop_name']));
        $this->assign('shop_name', $GLOBALS['_CFG']['shop_name']);
        $this->assign('service_email', $GLOBALS['_CFG']['service_email']);
        $this->assign('service_phone', $GLOBALS['_CFG']['service_phone']);
        $this->assign('shop_address', $GLOBALS['_CFG']['shop_address']);
        $this->assign('licensed', license_info());
        $this->assign('ecs_version', VERSION);
        $this->assign('icp_number', $GLOBALS['_CFG']['icp_number']);
        $this->assign('username', !empty($_SESSION['user_name']) ? $_SESSION['user_name'] : '');
        $this->assign('category_list', cat_list(0, 0, true, 2, false));
        $this->assign('catalog_list', cat_list(0, 0, false, 1, false));
        $this->assign('navigator_list', get_navigator($ctype, $catlist));  //自定义导航栏

        if (!empty($GLOBALS['_CFG']['search_keywords'])) {
            $searchkeywords = explode(',', trim($GLOBALS['_CFG']['search_keywords']));
        } else {
            $searchkeywords = array();
        }
        $this->assign('searchkeywords', $searchkeywords);
    }

    /**
     * 取得当前位置和页面标题
     *
     * @access  public
     * @param integer $cat 分类编号（只有商品及分类、文章及分类用到）
     * @param string $str 商品名、文章标题或其他附加的内容（无链接）
     * @return  array
     */
    public function assign_ur_here($cat = 0, $str = '')
    {
        /* 判断是否重写，取得文件名 */
        $cur_url = basename(PHP_SELF);
        if (intval($GLOBALS['_CFG']['rewrite'])) {
            $filename = strpos($cur_url, '-') ? substr($cur_url, 0, strpos($cur_url, '-')) : substr($cur_url, 0, -4);
        } else {
            $filename = substr($cur_url, 0, -4);
        }

        /* 初始化“页面标题”和“当前位置” */
        $page_title = $GLOBALS['_CFG']['shop_title'];
        $ur_here = '<a href=".">' . $GLOBALS['_LANG']['home'] . '</a>';

        /* 根据文件名分别处理中间的部分 */
        if ($filename != 'index') {
            /* 处理有分类的 */
            if (in_array($filename, array('category', 'goods', 'article_cat', 'article', 'brand'))) {
                /* 商品分类或商品 */
                if ('category' == $filename || 'goods' == $filename || 'brand' == $filename) {
                    if ($cat > 0) {
                        $cat_arr = get_parent_cats($cat);

                        $key = 'cid';
                        $type = 'category';
                    } else {
                        $cat_arr = array();
                    }
                } /* 文章分类或文章 */
                elseif ('article_cat' == $filename || 'article' == $filename) {
                    if ($cat > 0) {
                        $cat_arr = get_article_parent_cats($cat);

                        $key = 'acid';
                        $type = 'article_cat';
                    } else {
                        $cat_arr = array();
                    }
                }

                /* 循环分类 */
                if (!empty($cat_arr)) {
                    krsort($cat_arr);
                    foreach ($cat_arr as $val) {
                        $page_title = htmlspecialchars($val['cat_name']) . '_' . $page_title;
                        $args = array($key => $val['cat_id']);
                        $ur_here .= ' <code>&gt;</code> <a href="' . build_uri($type, $args, $val['cat_name']) . '">' .
                            htmlspecialchars($val['cat_name']) . '</a>';
                    }
                }
            } /* 处理无分类的 */
            else {
                /* 团购 */
                if ('group_buy' == $filename) {
                    $page_title = $GLOBALS['_LANG']['group_buy_goods'] . '_' . $page_title;
                    $args = array('gbid' => '0');
                    $ur_here .= ' <code>&gt;</code> <a href="group_buy.php">' .
                        $GLOBALS['_LANG']['group_buy_goods'] . '</a>';
                } /* 拍卖 */
                elseif ('auction' == $filename) {
                    $page_title = $GLOBALS['_LANG']['auction'] . '_' . $page_title;
                    $args = array('auid' => '0');
                    $ur_here .= ' <code>&gt;</code> <a href="auction.php">' .
                        $GLOBALS['_LANG']['auction'] . '</a>';
                } /* 夺宝 */
                elseif ('snatch' == $filename) {
                    $page_title = $GLOBALS['_LANG']['snatch'] . '_' . $page_title;
                    $args = array('id' => '0');
                    $ur_here .= ' <code> &gt; </code><a href="snatch.php">' . $GLOBALS['_LANG']['snatch_list'] . '</a>';
                } /* 批发 */
                elseif ('wholesale' == $filename) {
                    $page_title = $GLOBALS['_LANG']['wholesale'] . '_' . $page_title;
                    $args = array('wsid' => '0');
                    $ur_here .= ' <code>&gt;</code> <a href="wholesale.php">' .
                        $GLOBALS['_LANG']['wholesale'] . '</a>';
                } /* 积分兑换 */
                elseif ('exchange' == $filename) {
                    $page_title = $GLOBALS['_LANG']['exchange'] . '_' . $page_title;
                    $args = array('wsid' => '0');
                    $ur_here .= ' <code>&gt;</code> <a href="exchange.php">' .
                        $GLOBALS['_LANG']['exchange'] . '</a>';
                }
                /* 其他的在这里补充 */
            }
        }

        /* 处理最后一部分 */
        if (!empty($str)) {
            $page_title = $str . '_' . $page_title;
            $ur_here .= ' <code>&gt;</code> ' . $str;
        }

        /* 返回值 */
        return array('title' => $page_title, 'ur_here' => $ur_here);
    }

    /**
     * 获得指定页面的动态内容
     *
     * @access  public
     * @param string $tmp 模板名称
     * @return  void
     */
    public function assign_dynamic($tmp)
    {
        $sql = 'SELECT id, number, type FROM ' . $GLOBALS['ecs']->table('template') .
            " WHERE filename = '$tmp' AND type > 0 AND remarks ='' AND theme='" . $GLOBALS['_CFG']['template'] . "'";
        $res = $GLOBALS['db']->getAll($sql);

        foreach ($res as $row) {
            switch ($row['type']) {
                case 1:
                    /* 分类下的商品 */
                    $this->assign('goods_cat_' . $row['id'], assign_cat_goods($row['id'], $row['number']));
                    break;
                case 2:
                    /* 品牌的商品 */
                    $brand_goods = assign_brand_goods($row['id'], $row['number']);

                    $this->assign('brand_goods_' . $row['id'], $brand_goods['goods']);
                    $this->assign('goods_brand_' . $row['id'], $brand_goods['brand']);
                    break;
                case 3:
                    /* 文章列表 */
                    $cat_articles = assign_articles($row['id'], $row['number']);

                    $this->assign('articles_cat_' . $row['id'], $cat_articles['cat']);
                    $this->assign('articles_' . $row['id'], $cat_articles['arr']);
                    break;
            }
        }
    }

    /**
     * 显示一个提示信息
     *
     * @access  public
     * @param string $content
     * @param string $link
     * @param string $href
     * @param string $type 信息类型：warning, error, info
     * @param string $auto_redirect 是否自动跳转
     * @return  void
     */
    public function show_message($content, $links = '', $hrefs = '', $type = 'info', $auto_redirect = true)
    {
        $this->assign_template();

        $msg['content'] = $content;
        if (is_array($links) && is_array($hrefs)) {
            if (!empty($links) && count($links) == count($hrefs)) {
                foreach ($links as $key => $val) {
                    $msg['url_info'][$val] = $hrefs[$key];
                }
                $msg['back_url'] = $hrefs['0'];
            }
        } else {
            $link = empty($links) ? $GLOBALS['_LANG']['back_up_page'] : $links;
            $href = empty($hrefs) ? 'javascript:history.back()' : $hrefs;
            $msg['url_info'][$link] = $href;
            $msg['back_url'] = $href;
        }

        $msg['type'] = $type;
        $position = $this->assign_ur_here(0, $GLOBALS['_LANG']['sys_msg']);
        $this->assign('page_title', $position['title']);   // 页面标题
        $this->assign('ur_here', $position['ur_here']); // 当前位置

        if (is_null($GLOBALS['smarty']->get_template_vars('helps'))) {
            $this->assign('helps', get_shop_help()); // 网店帮助
        }

        $this->assign('auto_redirect', $auto_redirect);
        $this->assign('message', $msg);
        return $GLOBALS['smarty']->display('message.dwt');
    }
}
