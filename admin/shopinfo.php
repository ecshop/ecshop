<?php

define('IN_ECS', true);

require dirname(__FILE__).'/includes/init.php';
require_once ROOT_PATH.'includes/fckeditor/fckeditor.php';

$exc = new exchange($ecs->table('article'), $db, 'article_id', 'title');

/* ------------------------------------------------------ */
// -- 文章列表
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'list') {
    $smarty->assign('ur_here', $_LANG['shop_info']);
    $smarty->assign('action_link', ['text' => $_LANG['shopinfo_add'], 'href' => 'shopinfo.php?act=add']);
    $smarty->assign('full_page', 1);
    $smarty->assign('list', shopinfo_article_list());

    assign_query_info();
    $smarty->display('shopinfo_list.htm');
}

/* ------------------------------------------------------ */
// -- 查询
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'query') {
    $smarty->assign('list', shopinfo_article_list());

    make_json_result($smarty->fetch('shopinfo_list.htm'));
}

/* ------------------------------------------------------ */
// -- 添加新文章
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'add') {
    /* 权限判断 */
    admin_priv('shopinfo_manage');
    $_REQUEST['id'] = intval($_REQUEST['id']);

    /* 创建 html editor */
    create_html_editor('FCKeditor1');

    /* 初始化 */
    $article['article_type'] = 0;

    $smarty->assign('ur_here', $_LANG['shopinfo_add']);
    $smarty->assign('action_link', ['text' => $_LANG['shopinfo_list'], 'href' => 'shopinfo.php?act=list']);
    $smarty->assign('form_action', 'insert');

    assign_query_info();
    $smarty->display('shopinfo_info.htm');
}
if ($_REQUEST['act'] == 'insert') {
    /* 权限判断 */
    admin_priv('shopinfo_manage');
    $_REQUEST['id'] = intval($_REQUEST['id']);

    /* 判断是否重名 */
    $is_only = $exc->is_only('title', $_POST['title']);

    if (! $is_only) {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }

    /* 插入数据 */
    $add_time = gmtime();
    $sql = 'INSERT INTO '.$ecs->table('article')."(title, cat_id, content, add_time) VALUES('$_POST[title]', '0', '$_POST[FCKeditor1]','$add_time' )";
    $db->query($sql);

    $link[0]['text'] = $_LANG['continue_add'];
    $link[0]['href'] = 'shopinfo.php?act=add';

    $link[1]['text'] = $_LANG['back_list'];
    $link[1]['href'] = 'shopinfo.php?act=list';

    /* 清除缓存 */
    clear_cache_files();

    admin_log($_POST['title'], 'add', 'shopinfo');
    sys_msg($_LANG['articleadd_succeed'], 0, $link);
}

/* ------------------------------------------------------ */
// -- 文章编辑
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit') {
    /* 权限判断 */
    admin_priv('shopinfo_manage');
    $_REQUEST['id'] = intval($_REQUEST['id']);

    /* 取得文章数据 */
    $sql = 'SELECT article_id, title, content FROM '.$ecs->table('article').'WHERE article_id ='.$_REQUEST['id'];
    $article = $db->getRow($sql);

    /* 创建 html editor */
    create_html_editor('FCKeditor1', $article['content']);

    $smarty->assign('ur_here', $_LANG['article_add']);
    $smarty->assign('action_link', ['text' => $_LANG['shopinfo_list'], 'href' => 'shopinfo.php?act=list']);
    $smarty->assign('article', $article);
    $smarty->assign('form_action', 'update');
    $smarty->display('shopinfo_info.htm');
}
if ($_REQUEST['act'] == 'update') {
    /* 权限判断 */
    admin_priv('shopinfo_manage');
    $_REQUEST['id'] = intval($_REQUEST['id']);

    /* 检查重名 */
    if ($_POST['title'] != $_POST['old_title']) {
        $is_only = $exc->is_only('title', $_POST['title'], $_POST['id']);

        if (! $is_only) {
            sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
        }
    }

    /* 更新数据 */
    $cur_time = gmtime();
    if ($exc->edit("title='$_POST[title]', content='$_POST[FCKeditor1]',add_time ='$cur_time'", $_POST['id'])) {
        /* 清除缓存 */
        clear_cache_files();

        $link[0]['text'] = $_LANG['back_list'];
        $link[0]['href'] = 'shopinfo.php?act=list';

        sys_msg(sprintf($_LANG['articleedit_succeed'], $_POST['title']), 0, $link);
        admin_log($_POST['title'], 'edit', 'shopinfo');
    }
}

/* ------------------------------------------------------ */
// -- 编辑文章主题
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit_title') {
    check_authz_json('shopinfo_manage');

    $id = intval($_POST['id']);
    $title = json_str_iconv(trim($_POST['val']));

    /* 检查文章标题是否有重名 */
    if ($exc->num('title', $title, $id) == 0) {
        if ($exc->edit("title = '$title'", $id)) {
            clear_cache_files();
            admin_log($title, 'edit', 'shopinfo');
            make_json_result(stripslashes($title));
        }
    } else {
        make_json_error(sprintf($_LANG['title_exist'], $title));
    }
}

/* ------------------------------------------------------ */
// -- 删除文章
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'remove') {
    check_authz_json('shopinfo_manage');

    $id = intval($_GET['id']);

    /* 获得文章主题 */
    $title = $exc->get_name($id);
    if ($exc->drop($id)) {
        clear_cache_files();
        admin_log(addslashes($title), 'remove', 'shopinfo');
    }

    $url = 'shopinfo.php?act=query&'.str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
    exit;
}

/* 获取网店信息文章数据 */
function shopinfo_article_list()
{
    $list = [];
    $sql = 'SELECT article_id, title ,add_time'.
        ' FROM '.$GLOBALS['ecs']->table('article').
        ' WHERE cat_id = 0 ORDER BY article_id';
    $res = $GLOBALS['db']->query($sql);
    while ($rows = $GLOBALS['db']->fetchRow($res)) {
        $rows['add_time'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);

        $list[] = $rows;
    }

    return $list;
}
