<?php

define('IN_ECS', true);
require dirname(__FILE__).'/includes/init.php';
admin_priv('view_sendlist');
if ($_REQUEST['act'] == 'list') {
    $listdb = get_sendlist();
    $smarty->assign('ur_here', $_LANG['view_sendlist']);
    $smarty->assign('full_page', 1);

    $smarty->assign('listdb', $listdb['listdb']);
    $smarty->assign('filter', $listdb['filter']);
    $smarty->assign('record_count', $listdb['record_count']);
    $smarty->assign('page_count', $listdb['page_count']);

    assign_query_info();
    $smarty->display('view_sendlist.htm');
}
if ($_REQUEST['act'] == 'query') {
    $listdb = get_sendlist();
    $smarty->assign('listdb', $listdb['listdb']);
    $smarty->assign('filter', $listdb['filter']);
    $smarty->assign('record_count', $listdb['record_count']);
    $smarty->assign('page_count', $listdb['page_count']);

    $sort_flag = sort_flag($listdb['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('view_sendlist.htm'), '', ['filter' => $listdb['filter'], 'page_count' => $listdb['page_count']]);
}
if ($_REQUEST['act'] == 'del') {
    $id = (int) $_REQUEST['id'];
    $sql = 'DELETE FROM '.$GLOBALS['ecs']->table('email_sendlist')." WHERE id = '$id' LIMIT 1";
    $db->query($sql);
    $links[] = ['text' => $_LANG['view_sendlist'], 'href' => 'view_sendlist.php?act=list'];
    sys_msg($_LANG['del_ok'], 0, $links);
}

/* ------------------------------------------------------ */
// -- 批量删除
/* ------------------------------------------------------ */

if ($_REQUEST['act'] == 'batch_remove') {
    /* 检查权限 */
    if (isset($_POST['checkboxes'])) {
        $sql = 'DELETE FROM '.$ecs->table('email_sendlist').' WHERE id '.db_create_in($_POST['checkboxes']);
        $db->query($sql);

        $links[] = ['text' => $_LANG['view_sendlist'], 'href' => 'view_sendlist.php?act=list'];
        sys_msg($_LANG['del_ok'], 0, $links);
    } else {
        $links[] = ['text' => $_LANG['view_sendlist'], 'href' => 'view_sendlist.php?act=list'];
        sys_msg($_LANG['no_select'], 0, $links);
    }
}

/* ------------------------------------------------------ */
// -- 批量发送
/* ------------------------------------------------------ */

if ($_REQUEST['act'] == 'batch_send') {
    /* 检查权限 */
    if (isset($_POST['checkboxes'])) {
        $sql = 'SELECT * FROM '.$ecs->table('email_sendlist').'WHERE id '.db_create_in($_POST['checkboxes']).' ORDER BY pri DESC, last_send ASC LIMIT 1';
        $row = $db->getRow($sql);

        // 发送列表为空
        if (empty($row['id'])) {
            $links[] = ['text' => $_LANG['view_sendlist'], 'href' => 'view_sendlist.php?act=list'];
            sys_msg($_LANG['mailsend_null'], 0, $links);
        }

        $sql = 'SELECT * FROM '.$ecs->table('email_sendlist').'WHERE id '.db_create_in($_POST['checkboxes']).' ORDER BY pri DESC, last_send ASC';
        $res = $db->query($sql);
        while ($row = $db->fetchRow($res)) {
            // 发送列表不为空，邮件地址为空
            if (! empty($row['id']) && empty($row['email'])) {
                $sql = 'DELETE FROM '.$ecs->table('email_sendlist')." WHERE id = '$row[id]'";
                $db->query($sql);

                continue;
            }

            // 查询相关模板
            $sql = 'SELECT * FROM '.$ecs->table('mail_templates')." WHERE template_id = '$row[template_id]'";
            $rt = $db->getRow($sql);

            // 如果是模板，则将已存入email_sendlist的内容作为邮件内容
            // 否则即是杂质，将mail_templates调出的内容作为邮件内容
            if ($rt['type'] == 'template') {
                $rt['template_content'] = $row['email_content'];
            }

            if ($rt['template_id'] && $rt['template_content']) {
                if (send_mail('', $row['email'], $rt['template_subject'], $rt['template_content'], $rt['is_html'])) {
                    // 发送成功

                    // 从列表中删除
                    $sql = 'DELETE FROM '.$ecs->table('email_sendlist')." WHERE id = '$row[id]'";
                    $db->query($sql);
                } else {
                    // 发送出错

                    if ($row['error'] < 3) {
                        $time = time();
                        $sql = 'UPDATE '.$ecs->table('email_sendlist')." SET error = error + 1, pri = 0, last_send = '$time' WHERE id = '$row[id]'";
                    } else {
                        // 将出错超次的纪录删除
                        $sql = 'DELETE FROM '.$ecs->table('email_sendlist')." WHERE id = '$row[id]'";
                    }
                    $db->query($sql);
                }
            } else {
                // 无效的邮件队列
                $sql = 'DELETE FROM '.$ecs->table('email_sendlist')." WHERE id = '$row[id]'";
                $db->query($sql);
            }
        }

        $links[] = ['text' => $_LANG['view_sendlist'], 'href' => 'view_sendlist.php?act=list'];
        sys_msg($_LANG['mailsend_finished'], 0, $links);
    } else {
        $links[] = ['text' => $_LANG['view_sendlist'], 'href' => 'view_sendlist.php?act=list'];
        sys_msg($_LANG['no_select'], 0, $links);
    }
}

/* ------------------------------------------------------ */
// -- 全部发送
/* ------------------------------------------------------ */

if ($_REQUEST['act'] == 'all_send') {
    $sql = 'SELECT * FROM '.$ecs->table('email_sendlist').' ORDER BY pri DESC, last_send ASC LIMIT 1';
    $row = $db->getRow($sql);

    // 发送列表为空
    if (empty($row['id'])) {
        $links[] = ['text' => $_LANG['view_sendlist'], 'href' => 'view_sendlist.php?act=list'];
        sys_msg($_LANG['mailsend_null'], 0, $links);
    }

    $sql = 'SELECT * FROM '.$ecs->table('email_sendlist').' ORDER BY pri DESC, last_send ASC';
    $res = $db->query($sql);
    while ($row = $db->fetchRow($res)) {
        // 发送列表不为空，邮件地址为空
        if (! empty($row['id']) && empty($row['email'])) {
            $sql = 'DELETE FROM '.$ecs->table('email_sendlist')." WHERE id = '$row[id]'";
            $db->query($sql);

            continue;
        }

        // 查询相关模板
        $sql = 'SELECT * FROM '.$ecs->table('mail_templates')." WHERE template_id = '$row[template_id]'";
        $rt = $db->getRow($sql);

        // 如果是模板，则将已存入email_sendlist的内容作为邮件内容
        // 否则即是杂质，将mail_templates调出的内容作为邮件内容
        if ($rt['type'] == 'template') {
            $rt['template_content'] = $row['email_content'];
        }

        if ($rt['template_id'] && $rt['template_content']) {
            if (send_mail('', $row['email'], $rt['template_subject'], $rt['template_content'], $rt['is_html'])) {
                // 发送成功

                // 从列表中删除
                $sql = 'DELETE FROM '.$ecs->table('email_sendlist')." WHERE id = '$row[id]'";
                $db->query($sql);
            } else {
                // 发送出错

                if ($row['error'] < 3) {
                    $time = time();
                    $sql = 'UPDATE '.$ecs->table('email_sendlist')." SET error = error + 1, pri = 0, last_send = '$time' WHERE id = '$row[id]'";
                } else {
                    // 将出错超次的纪录删除
                    $sql = 'DELETE FROM '.$ecs->table('email_sendlist')." WHERE id = '$row[id]'";
                }
                $db->query($sql);
            }
        } else {
            // 无效的邮件队列
            $sql = 'DELETE FROM '.$ecs->table('email_sendlist')." WHERE id = '$row[id]'";
            $db->query($sql);
        }
    }

    $links[] = ['text' => $_LANG['view_sendlist'], 'href' => 'view_sendlist.php?act=list'];
    sys_msg($_LANG['mailsend_finished'], 0, $links);
}

function get_sendlist()
{
    $result = get_filter();
    if ($result === false) {
        $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'pri' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

        $sql = 'SELECT count(*) FROM '.$GLOBALS['ecs']->table('email_sendlist').' e LEFT JOIN '.$GLOBALS['ecs']->table('mail_templates').' m ON e.template_id = m.template_id';
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        /* 分页大小 */
        $filter = page_and_size($filter);

        /* 查询 */
        $sql = 'SELECT e.id, e.email, e.pri, e.error, FROM_UNIXTIME(e.last_send) AS last_send, m.template_subject, m.type FROM '.$GLOBALS['ecs']->table('email_sendlist').' e LEFT JOIN '.$GLOBALS['ecs']->table('mail_templates').' m ON e.template_id = m.template_id'.
            ' ORDER by '.$filter['sort_by'].' '.$filter['sort_order'].
            ' LIMIT '.$filter['start'].",$filter[page_size]";
        set_filter($filter, $sql);
    } else {
        $sql = $result['sql'];
        $filter = $result['filter'];
    }

    $listdb = $GLOBALS['db']->getAll($sql);

    $arr = ['listdb' => $listdb, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']];

    return $arr;
}
