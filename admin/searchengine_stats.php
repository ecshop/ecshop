<?php

define('IN_ECS', true);

require dirname(__FILE__).'/includes/init.php';
require_once ROOT_PATH.'languages/'.$_CFG['lang'].'/admin/statistic.php';

/* act操作项的初始化 */
if (empty($_REQUEST['act'])) {
    $_REQUEST['act'] = 'view';
} else {
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

if ($_REQUEST['act'] == 'view') {
    admin_priv('client_flow_stats');

    /* 时间参数 */
    /* TODO: 时间需要改 */
    if (isset($_POST) && ! empty($_POST)) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
    } else {
        $start_date = local_date('Y-m-d', strtotime('-1 week'));
        $end_date = local_date('Y-m-d');
    }
    /* ------------------------------------- */
    /* --综合流量
    /* ------------------------------------- */
    $max = 0;
    $general_xml = "<chart caption='$_LANG[tab_keywords]' shownames='1' showvalues='0' decimals='0' numberPrefix='' outCnvBaseFontSize='12' baseFontSize='12'>";
    $sql = 'SELECT keyword, count, searchengine '.
        ' FROM '.$ecs->table('keywords').
        " WHERE date >= '$start_date' AND date <= '".$end_date."'";
    if (isset($_POST['filter'])) {
        $sql .= ' AND '.db_create_in($_POST['filter'], 'searchengine');
    }
    $res = $db->query($sql);
    $search = [];
    $searchengine = [];
    $keyword = [];

    while ($val = $db->fetchRow($res)) {
        $keyword[$val['keyword']] = 1;
        $searchengine[$val['searchengine']][$val['keyword']] = $val['count'];
    }

    $general_xml .= '<categories>';
    foreach ($keyword as $key => $val) {
        $key = str_replace('&', '＆', $key);
        $key = str_replace('>', '＞', $key);
        $key = str_replace('<', '＜', $key);
        $key = htmlspecialchars($key);
        $general_xml .= "<category label='".str_replace('\'', '', $key)."' />";
    }
    $general_xml .= "</categories>\n";

    $i = 0;

    foreach ($searchengine as $key => $val) {
        $general_xml .= "<dataset seriesName='$key' color='".chart_color($i)."' showValues='0'>";
        foreach ($keyword as $k => $v) {
            $count = 0;
            if (! empty($searchengine[$key][$k])) {
                $count = $searchengine[$key][$k];
            }
            $general_xml .= "<set value='$count' />";
        }
        $general_xml .= '</dataset>';
        $i++;
    }

    $general_xml .= '</chart>';

    /* 模板赋值 */
    $smarty->assign('ur_here', $_LANG['searchengine_stats']);
    $smarty->assign('general_data', $general_xml);

    $searchengines = ['ecshop' => false,
        'MSLIVE' => false,
        'BAIDU' => false,
        'GOOGLE' => false,
        'GOOGLE CHINA' => false,
        'CT114' => false,
        'SOSO' => false];

    if (isset($_POST['filter'])) {
        foreach ($_POST['filter'] as $v) {
            $searchengines[$v] = true;
        }
    }
    $smarty->assign('searchengines', $searchengines);

    /* 显示日期 */
    $smarty->assign('start_date', $start_date);
    $smarty->assign('end_date', $end_date);

    $filename = str_replace('-', '', $start_date.'_'.$end_date);
    $smarty->assign('action_link', ['text' => $_LANG['down_search_stats'], 'href' => 'searchengine_stats.php?act=download&start_date='.$start_date.'&end_date='.$end_date.'&filename='.$filename]);

    $smarty->assign('lang', $_LANG);
    /* 显示页面 */
    assign_query_info();
    $smarty->display('searchengine_stats.htm');
}
if ($_REQUEST['act'] == 'download') {
    $start_date = empty($_REQUEST['start_date']) ? strtotime('-20 day') : intval($_REQUEST['start_date']);
    $end_date = empty($_REQUEST['end_date']) ? time() : intval($_REQUEST['end_date']);

    $filename = $start_date.'_'.$end_date;
    $sql = 'SELECT keyword, count,searchengine '.
        ' FROM '.$ecs->table('keywords').
        " WHERE date >= '$start_date' AND date <= '$end_date'";
    $res = $db->query($sql);

    $searchengine = [];
    $keyword = [];

    while ($val = $db->fetchRow($res)) {
        $keyword[$val['keyword']] = 1;
        $searchengine[$val['searchengine']][$val['keyword']] = $val['count'];
    }
    header('Content-type: application/vnd.ms-excel; charset=utf-8');
    header("Content-Disposition: attachment; filename=$filename.xls");
    $data = "\t";
    foreach ($searchengine as $k => $v) {
        $data .= "$k\t";
    }
    foreach ($keyword as $kw => $val) {
        $data .= "\n$kw\t";
        foreach ($searchengine as $k => $v) {
            if (isset($searchengine[$k][$kw])) {
                $data .= $searchengine[$k][$kw]."\t";
            } else {
                $data .= '0'."\t";
            }
        }
    }
    echo ecs_iconv(EC_CHARSET, 'GB2312', $data)."\t";
}
