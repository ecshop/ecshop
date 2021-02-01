<?php

namespace app\controller\admin;

/**
 * 帮助信息管理程序
 */
class ShophelpController extends InitController
{
    public function initialize()
    {
        parent::initialize();


        require_once(ROOT_PATH . "includes/fckeditor/fckeditor.php");

        /*初始化数据交换对象 */
        $exc_article = new exchange($ecs->table("article"), $db, 'article_id', 'title');
        $exc_cat = new exchange($ecs->table("article_cat"), $db, 'cat_id', 'cat_name');
    }

    /*------------------------------------------------------ */
    //-- 列出所有文章分类
    /*------------------------------------------------------ */
    public function list_catAction()
    {
        $this->assign('action_link', array('text' => $_LANG['article_add'], 'href' => 'shophelp.php?act=add'));
        $this->assign('ur_here', $_LANG['cat_list']);
        $this->assign('full_page', 1);
        $this->assign('list', get_shophelp_list());

        assign_query_info();
        return $this->display('shophelp_cat_list.htm');
    }

    /*------------------------------------------------------ */
    //-- 分类下的文章
    /*------------------------------------------------------ */
    public function list_articleAction()
    {
        $this->assign('ur_here', $_LANG['article_list']);
        $this->assign('action_link', array('text' => $_LANG['article_add'], 'href' => 'shophelp.php?act=add&cat_id=' . $_REQUEST['cat_id']));
        $this->assign('full_page', 1);
        $this->assign('cat', article_cat_list($_REQUEST['cat_id'], true, 'cat_id', 0, "onchange=\"location.href='?act=list_article&cat_id='+this.value\""));
        $this->assign('list', shophelp_article_list($_REQUEST['cat_id']));

        assign_query_info();
        return $this->display('shophelp_article_list.htm');
    }

    /*------------------------------------------------------ */
    //-- 查询分类下的文章
    /*------------------------------------------------------ */
    public function query_artAction()
    {
        $cat_id = intval($_GET['cat']);

        $this->assign('list', shophelp_article_list($cat_id));
        make_json_result($smarty->fetch('shophelp_article_list.htm'));
    }

    /*------------------------------------------------------ */
    //-- 查询
    /*------------------------------------------------------ */
    public function queryAction()
    {
        $this->assign('list', get_shophelp_list());

        make_json_result($smarty->fetch('shophelp_cat_list.htm'));
    }

    /*------------------------------------------------------ */
    //-- 添加文章
    /*------------------------------------------------------ */
    public function addAction()
    {
        /* 权限判断 */
        admin_priv('shophelp_manage');
        $_POST['id'] = intval($_POST['id']);

        /* 创建 html editor */
        create_html_editor('FCKeditor1');

        if (empty($_REQUEST['cat_id'])) {
            $selected = 0;
        } else {
            $selected = $_REQUEST['cat_id'];
        }
        $cat_list = article_cat_list($selected, true, 'cat_id', 0);
        $cat_list = str_replace('select please', $_LANG['select_plz'], $cat_list);
        $this->assign('cat_list', $cat_list);
        $this->assign('ur_here', $_LANG['article_add']);
        $this->assign('action_link', array('text' => $_LANG['cat_list'], 'href' => 'shophelp.php?act=list_cat'));
        $this->assign('form_action', 'insert');
        return $this->display('shophelp_info.htm');
    }

    public function insertAction()
    {
        /* 权限判断 */
        admin_priv('shophelp_manage');
        $_POST['id'] = intval($_POST['id']);

        /* 判断是否重名 */
        $exc_article->is_only('title', $_POST['title'], $_LANG['title_exist']);

        /* 插入数据 */
        $add_time = gmtime();
        $sql = "INSERT INTO " . $ecs->table('article') . "(title, cat_id, article_type, content, add_time, author) VALUES('$_POST[title]', '$_POST[cat_id]', '$_POST[article_type]','$_POST[FCKeditor1]','$add_time', '_SHOPHELP' )";
        $db->query($sql);

        $link[0]['text'] = $_LANG['back_list'];
        $link[0]['href'] = 'shophelp.php?act=list_article&cat_id=' . $_POST['cat_id'];
        $link[1]['text'] = $_LANG['continue_add'];
        $link[1]['href'] = 'shophelp.php?act=add&cat_id=' . $_POST['cat_id'];

        /* 清除缓存 */
        clear_cache_files();

        admin_log($_POST['title'], 'add', 'shophelp');
        sys_msg($_LANG['articleadd_succeed'], 0, $link);
    }

    /*------------------------------------------------------ */
    //-- 编辑文章
    /*------------------------------------------------------ */
    public function editAction()
    {
        /* 权限判断 */
        admin_priv('shophelp_manage');
        $_POST['id'] = intval($_POST['id']);

        /* 取文章数据 */
        $sql = "SELECT article_id,title, cat_id, article_type, is_open, author, author_email, keywords, content FROM " . $ecs->table('article') . " WHERE article_id='$_REQUEST[id]'";
        $article = $db->getRow($sql);

        /* 创建 html editor */
        create_html_editor('FCKeditor1', $article['content']);

        $this->assign('cat_list', article_cat_list($article['cat_id'], true, 'cat_id', 0));
        $this->assign('ur_here', $_LANG['article_add']);
        $this->assign('action_link', array('text' => $_LANG['article_list'], 'href' => 'shophelp.php?act=list_article&cat_id=' . $article['cat_id']));
        $this->assign('article', $article);
        $this->assign('form_action', 'update');

        assign_query_info();
        return $this->display('shophelp_info.htm');
    }

    public function updateAction()
    {
        /* 权限判断 */
        admin_priv('shophelp_manage');
        $_POST['id'] = intval($_POST['id']);

        /* 检查重名 */
        if ($_POST['title'] != $_POST['old_title']) {
            $exc_article->is_only('title', $_POST['title'], $_LANG['articlename_exist'], $_POST['id']);
        }
        /* 更新 */
        if ($exc_article->edit("title = '$_POST[title]', cat_id = '$_POST[cat_id]', article_type = '$_POST[article_type]', content = '$_POST[FCKeditor1]'", $_POST['id'])) {
            /* 清除缓存 */
            clear_cache_files();

            $link[0]['text'] = $_LANG['back_list'];
            $link[0]['href'] = 'shophelp.php?act=list_article&cat_id=' . $_POST['cat_id'];

            sys_msg(sprintf($_LANG['articleedit_succeed'], $_POST['title']), 0, $link);
            admin_log($_POST['title'], 'edit', 'shophelp');
        }
    }

    /*------------------------------------------------------ */
    //-- 编辑分类的名称
    /*------------------------------------------------------ */
    public function edit_catnameAction()
    {
        check_authz_json('shophelp_manage');

        $id = intval($_POST['id']);
        $cat_name = json_str_iconv(trim($_POST['val']));

        /* 检查分类名称是否重复 */
        if ($exc_cat->num("cat_name", $cat_name, $id) != 0) {
            make_json_error(sprintf($_LANG['catname_exist'], $cat_name));
        } else {
            if ($exc_cat->edit("cat_name = '$cat_name'", $id)) {
                clear_cache_files();
                admin_log($cat_name, 'edit', 'shophelpcat');
                make_json_result(stripslashes($cat_name));
            } else {
                make_json_error($db->error());
            }
        }
    }

    /*------------------------------------------------------ */
    //-- 编辑分类的排序
    /*------------------------------------------------------ */
    public function edit_cat_orderAction()
    {
        check_authz_json('shophelp_manage');

        $id = intval($_POST['id']);
        $order = json_str_iconv(trim($_POST['val']));

        /* 检查输入的值是否合法 */
        if (!preg_match("/^[0-9]+$/", $order)) {
            make_json_result('', sprintf($_LANG['enter_int'], $order));
        } else {
            if ($exc_cat->edit("sort_order = '$order'", $id)) {
                clear_cache_files();
                make_json_result(stripslashes($order));
            }
        }
    }

    /*------------------------------------------------------ */
    //-- 删除分类
    /*------------------------------------------------------ */
    public function removeAction()
    {
        check_authz_json('shophelp_manage');

        $id = intval($_GET['id']);

        /* 非空的分类不允许删除 */
        if ($exc_article->num('cat_id', $id) != 0) {
            make_json_error(sprintf($_LANG['not_emptycat']));
        } else {
            $exc_cat->drop($id);
            clear_cache_files();
            admin_log('', 'remove', 'shophelpcat');
        }

        $url = 'shophelp.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

        return redirect($url);
    }

    /*------------------------------------------------------ */
    //-- 删除分类下的某文章
    /*------------------------------------------------------ */
    public function remove_artAction()
    {
        check_authz_json('shophelp_manage');

        $id = intval($_GET['id']);
        $cat_id = $db->getOne('SELECT cat_id FROM ' . $ecs->table('article') . " WHERE article_id='$id'");

        if ($exc_article->drop($id)) {
            /* 清除缓存 */
            clear_cache_files();
            admin_log('', 'remove', 'shophelp');
        } else {
            make_json_error(sprintf($_LANG['remove_fail']));
        }

        $url = 'shophelp.php?act=query_art&cat=' . $cat_id . '&' . str_replace('act=remove_art', '', $_SERVER['QUERY_STRING']);

        return redirect($url);
    }

    /*------------------------------------------------------ */
    //-- 添加一个新分类
    /*------------------------------------------------------ */
    public function add_catnameAction()
    {
        check_authz_json('shophelp_manage');

        $cat_name = trim($_POST['cat_name']);

        if (!empty($cat_name)) {
            if ($exc_cat->num("cat_name", $cat_name) != 0) {
                make_json_error($_LANG['catname_exist']);
            } else {
                $sql = "INSERT INTO " . $ecs->table('article_cat') . " (cat_name, cat_type) VALUES ('$cat_name', 0)";
                $db->query($sql);

                admin_log($cat_name, 'add', 'shophelpcat');

                return redirect("shophelp.php?act=query");
            }
        } else {
            make_json_error($_LANG['js_languages']['no_catname']);
        }

        return redirect("shophelp.php?act=list_cat");
    }

    /*------------------------------------------------------ */
    //-- 编辑文章标题
    /*------------------------------------------------------ */
    public function edit_titleAction()
    {
        check_authz_json('shophelp_manage');

        $id = intval($_POST['id']);
        $title = json_str_iconv(trim($_POST['val']));

        /* 检查文章标题是否有重名 */
        if ($exc_article->num('title', $title, $id) == 0) {
            if ($exc_article->edit("title = '$title'", $id)) {
                clear_cache_files();
                admin_log($title, 'edit', 'shophelp');
                make_json_result(stripslashes($title));
            }
        } else {
            make_json_error(sprintf($_LANG['articlename_exist'], $title));
        }
    }

    /* 获得网店帮助文章分类 */
    public function get_shophelp_list()
    {
        $list = array();
        $sql = 'SELECT cat_id, cat_name, sort_order' .
            ' FROM ' . $GLOBALS['ecs']->table('article_cat') .
            ' WHERE cat_type = 0 ORDER BY sort_order';
        $res = $GLOBALS['db']->query($sql);
        while ($rows = $GLOBALS['db']->fetchRow($res)) {
            $sql = 'SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('article') . " WHERE cat_id = '$rows[cat_id]'";
            $rows['num'] = $GLOBALS['db']->getOne($sql);

            $list[] = $rows;
        }

        return $list;
    }

    /* 获得网店帮助某分类下的文章 */
    public function shophelp_article_list($cat_id)
    {
        $list = array();
        $sql = 'SELECT article_id, title, article_type , add_time' .
            ' FROM ' . $GLOBALS['ecs']->table('article') .
            " WHERE cat_id = '$cat_id' ORDER BY article_type DESC";
        $res = $GLOBALS['db']->query($sql);
        while ($rows = $GLOBALS['db']->fetchRow($res)) {
            $rows['add_time'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);

            $list[] = $rows;
        }

        return $list;
    }
}
