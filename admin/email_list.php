<?php

define('IN_ECS', true);
require dirname(__FILE__).'/includes/init.php';
admin_priv('email_list');

if ($_REQUEST['act'] == 'list') {
    $emaildb = get_email_list();
    $smarty->assign('full_page', 1);
    $smarty->assign('ur_here', $_LANG['email_list']);
    $smarty->assign('emaildb', $emaildb['emaildb']);
    $smarty->assign('filter', $emaildb['filter']);
    $smarty->assign('record_count', $emaildb['record_count']);
    $smarty->assign('page_count', $emaildb['page_count']);
    assign_query_info();
    $smarty->display('email_list.htm');
}
if ($_REQUEST['act'] == 'export') {
    $sql = 'SELECT email FROM '.$ecs->table('email_list').'WHERE stat = 1';
    $emails = $db->getAll($sql);
    $out = '';
    foreach ($emails as $key => $val) {
        $out .= "$val[email]\n";
    }
    $contentType = 'text/plain';
    $len = strlen($out);
    header('Last-Modified: '.gmdate('D, d M Y H:i:s', time() + 31536000).' GMT');
    header('Pragma: no-cache');
    header('Content-Encoding: none');
    header('Content-type: '.$contentType);
    header('Content-Length: '.$len);
    header('Content-Disposition: attachment; filename="email_list.txt"');
    echo $out;
    exit;
}
if ($_REQUEST['act'] == 'query') {
    $emaildb = get_email_list();
    $smarty->assign('emaildb', $emaildb['emaildb']);
    $smarty->assign('filter', $emaildb['filter']);
    $smarty->assign('record_count', $emaildb['record_count']);
    $smarty->assign('page_count', $emaildb['page_count']);

    $sort_flag = sort_flag($emaildb['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result(
        $smarty->fetch('email_list.htm'),
        '',
        ['filter' => $emaildb['filter'], 'page_count' => $emaildb['page_count']]
    );
}

/* ------------------------------------------------------ */
// -- 批量删除
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'batch_remove') {
    if (! isset($_POST['checkboxes']) || ! is_array($_POST['checkboxes'])) {
        sys_msg($_LANG['no_select_email'], 1);
    }

    $sql = 'DELETE FROM '.$ecs->table('email_list').
        ' WHERE id '.db_create_in(implode(',', $_POST['checkboxes']));
    $db->query($sql);

    $lnk[] = ['text' => $_LANG['back_list'], 'href' => 'email_list.php?act=list'];
    sys_msg(sprintf($_LANG['batch_remove_succeed'], $db->affected_rows()), 0, $lnk);
}

/* ------------------------------------------------------ */
// -- 批量恢复
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'batch_unremove') {
    if (! isset($_POST['checkboxes']) || ! is_array($_POST['checkboxes'])) {
        sys_msg($_LANG['no_select_email'], 1);
    }

    $sql = 'UPDATE '.$ecs->table('email_list').
        ' SET stat = 1 WHERE stat <> 1 AND id '.db_create_in(implode(',', $_POST['checkboxes']));
    $db->query($sql);

    $lnk[] = ['text' => $_LANG['back_list'], 'href' => 'email_list.php?act=list'];
    sys_msg(sprintf($_LANG['batch_unremove_succeed'], $db->affected_rows()), 0, $lnk);
}

/* ------------------------------------------------------ */
// -- 批量退订
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'batch_exit') {
    if (! isset($_POST['checkboxes']) || ! is_array($_POST['checkboxes'])) {
        sys_msg($_LANG['no_select_email'], 1);
    }

    $sql = 'UPDATE '.$ecs->table('email_list').
        ' SET stat = 2 WHERE stat <> 2 AND id '.db_create_in(implode(',', $_POST['checkboxes']));
    $db->query($sql);

    $lnk[] = ['text' => $_LANG['back_list'], 'href' => 'email_list.php?act=list'];
    sys_msg(sprintf($_LANG['batch_exit_succeed'], $db->affected_rows()), 0, $lnk);
}

function get_email_list()
{
    $result = get_filter();
    if ($result === false) {
        $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'stat' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'ASC' : trim($_REQUEST['sort_order']);

        $sql = 'SELECT COUNT(*) FROM '.$GLOBALS['ecs']->table('email_list');
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        /* 分页大小 */
        $filter = page_and_size($filter);

        /* 查询 */

        $sql = 'SELECT * FROM '.$GLOBALS['ecs']->table('email_list').
            ' ORDER BY '.$filter['sort_by'].' '.$filter['sort_order'].
            ' LIMIT '.$filter['start'].",$filter[page_size]";

        set_filter($filter, $sql);
    } else {
        $sql = $result['sql'];
        $filter = $result['filter'];
    }

    $emaildb = $GLOBALS['db']->getAll($sql);

    $arr = ['emaildb' => $emaildb, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']];

    return $arr;
}
