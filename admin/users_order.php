<?php

define('IN_ECS', true);

require dirname(__FILE__).'/includes/init.php';
require_once ROOT_PATH.'includes/lib_order.php';
require_once ROOT_PATH.'languages/'.$_CFG['lang'].'/admin/statistic.php';
$smarty->assign('lang', $_LANG);

if (isset($_REQUEST['act']) && ($_REQUEST['act'] == 'query' || $_REQUEST['act'] == 'download')) {
    /* 检查权限 */
    check_authz_json('client_flow_stats');
    if (strstr($_REQUEST['start_date'], '-') === false) {
        $_REQUEST['start_date'] = local_date('Y-m-d', $_REQUEST['start_date']);
        $_REQUEST['end_date'] = local_date('Y-m-d', $_REQUEST['end_date']);
    }

    if ($_REQUEST['act'] == 'download') {
        $user_orderinfo = get_user_orderinfo(false);
        $filename = $_REQUEST['start_date'].'_'.$_REQUEST['end_date'].'users_order';

        header('Content-type: application/vnd.ms-excel; charset=utf-8');
        header("Content-Disposition: attachment; filename=$filename.xls");

        $data = "$_LANG[visit_buy]\t\n";
        $data .= "$_LANG[order_by]\t$_LANG[member_name]\t$_LANG[order_amount]\t$_LANG[buy_sum]\t\n";

        foreach ($user_orderinfo['user_orderinfo'] as $k => $row) {
            $order_by = $k + 1;
            $data .= "$order_by\t$row[user_name]\t$row[order_num]\t$row[turnover]\n";
        }
        echo ecs_iconv(EC_CHARSET, 'GB2312', $data);
        exit;
    }
    $user_orderinfo = get_user_orderinfo();
    $smarty->assign('filter', $user_orderinfo['filter']);
    $smarty->assign('record_count', $user_orderinfo['record_count']);
    $smarty->assign('page_count', $user_orderinfo['page_count']);
    $smarty->assign('user_orderinfo', $user_orderinfo['user_orderinfo']);

    $sort_flag = sort_flag($user_orderinfo['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('users_order.htm'), '', ['filter' => $user_orderinfo['filter'], 'page_count' => $user_orderinfo['page_count']]);
}

if ($_REQUEST['act'] == 'list') {
    /* 权限判断 */
    admin_priv('client_flow_stats');
    /* 时间参数 */
    if (! isset($_REQUEST['start_date'])) {
        $start_date = local_strtotime('-7 days');
    }
    if (! isset($_REQUEST['end_date'])) {
        $end_date = local_strtotime('today');
    }

    /* 取得会员排行数据 */
    $user_orderinfo = get_user_orderinfo();

    /* 赋值到模板 */
    $smarty->assign('ur_here', $_LANG['report_users']);
    $smarty->assign('action_link', ['text' => $_LANG['download_amount_sort'], 'href' => '#download']);
    $smarty->assign('filter', $user_orderinfo['filter']);
    $smarty->assign('record_count', $user_orderinfo['record_count']);
    $smarty->assign('page_count', $user_orderinfo['page_count']);
    $smarty->assign('user_orderinfo', $user_orderinfo['user_orderinfo']);
    $smarty->assign('full_page', 1);
    $smarty->assign('start_date', local_date('Y-m-d', $start_date));
    $smarty->assign('end_date', local_date('Y-m-d', $end_date));
    $smarty->assign('sort_order_num', '<img src="images/sort_desc.gif">');
    /* 页面显示 */
    assign_query_info();
    $smarty->display('users_order.htm');
}

/* ------------------------------------------------------ */
// --会员排行需要的函数
/* ------------------------------------------------------ */
/*
 * 取得会员订单量/购物额排名统计数据
 * @param   bool  $is_pagination  是否分页
 * @return  array   取得会员订单量/购物额排名统计数据
 */
function get_user_orderinfo($is_pagination = true)
{
    global $db, $ecs, $start_date, $end_date;

    $filter['start_date'] = empty($_REQUEST['start_date']) ? $start_date : local_strtotime($_REQUEST['start_date']);
    $filter['end_date'] = empty($_REQUEST['end_date']) ? $end_date : local_strtotime($_REQUEST['end_date']);
    $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'order_num' : trim($_REQUEST['sort_by']);
    $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

    $where = 'WHERE u.user_id = o.user_id '.
        'AND u.user_id > 0 '.order_query_sql('finished', 'o.');
    if ($filter['start_date']) {
        $where .= " AND o.add_time >= '".$filter['start_date']."'";
    }
    if ($filter['end_date']) {
        $where .= " AND o.add_time <= '".$filter['end_date']."'";
    }

    $sql = 'SELECT count(distinct(u.user_id)) FROM '.$ecs->table('users').' AS u, '.$ecs->table('order_info').' AS o '.$where;
    $filter['record_count'] = $GLOBALS['db']->getOne($sql);
    /* 分页大小 */
    $filter = page_and_size($filter);

    /* 计算订单各种费用之和的语句 */
    $total_fee = ' SUM('.order_amount_field().') AS turnover ';

    $sql = 'SELECT u.user_id, u.user_name, COUNT(*) AS order_num, '.$total_fee.
        'FROM '.$ecs->table('users').' AS u, '.$ecs->table('order_info').' AS o '.$where.
        ' GROUP BY u.user_id'.' ORDER BY '.$filter['sort_by'].' '.$filter['sort_order'];
    if ($is_pagination) {
        $sql .= ' LIMIT '.$filter['start'].', '.$filter['page_size'];
    }
    $user_orderinfo = [];
    $res = $db->query($sql);

    while ($items = $db->fetchRow($res)) {
        $items['turnover'] = price_format($items['turnover']);
        $user_orderinfo[] = $items;
    }
    $arr = ['user_orderinfo' => $user_orderinfo, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']];

    return $arr;
}
