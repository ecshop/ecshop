<?php

declare(strict_types=1);

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchLogController extends BaseController
{
    public function __invoke(Request $request)
    {



$_REQUEST['act'] = trim($_REQUEST['act']);

admin_priv('search_log');
if ($_REQUEST['act'] == 'list') {
    $logdb = $this->get_search_log();
    $this->assign('ur_here', $_LANG['search_log']);
    $this->assign('full_page', 1);
    $this->assign('logdb', $logdb['logdb']);
    $this->assign('filter', $logdb['filter']);
    $this->assign('record_count', $logdb['record_count']);
    $this->assign('page_count', $logdb['page_count']);
    $this->assign('start_date', local_date('Y-m-d'));
    $this->assign('end_date', local_date('Y-m-d'));
    assign_query_info();
    return $this->display('search_log_list.htm');
}
if ($_REQUEST['act'] == 'query') {
    $logdb = $this->get_search_log();
    $this->assign('full_page', 0);
    $this->assign('logdb', $logdb['logdb']);
    $this->assign('filter', $logdb['filter']);
    $this->assign('record_count', $logdb['record_count']);
    $this->assign('page_count', $logdb['page_count']);
    $this->assign('start_date', local_date('Y-m-d'));
    $this->assign('end_date', local_date('Y-m-d'));
    make_json_result(
        $smarty->fetch('search_log_list.htm'),
        '',
        ['filter' => $logdb['filter'], 'page_count' => $logdb['page_count']]
    );
}

}

private function get_search_log()
{
    $where = '';
    if (isset($_REQUEST['start_dateYear']) && isset($_REQUEST['end_dateYear'])) {
        $start_date = $_POST['start_dateYear'].'-'.$_POST['start_dateMonth'].'-'.$_POST['start_dateDay'];
        $end_date = $_POST['end_dateYear'].'-'.$_POST['end_dateMonth'].'-'.$_POST['end_dateDay'];
        $where .= " AND date <= '$end_date' AND date >= '$start_date'";
        $filter['start_dateYear'] = $_REQUEST['start_dateYear'];
        $filter['start_dateMonth'] = $_REQUEST['start_dateMonth'];
        $filter['start_dateDay'] = $_REQUEST['start_dateDay'];

        $filter['end_dateYear'] = $_REQUEST['end_dateYear'];
        $filter['end_dateMonth'] = $_REQUEST['end_dateMonth'];
        $filter['end_dateDay'] = $_REQUEST['end_dateDay'];
    }

    $sql = 'SELECT COUNT(*) FROM '.$GLOBALS['ecs']->table('keywords')." WHERE  searchengine='ecshop' $where";
    $filter['record_count'] = $GLOBALS['db']->getOne($sql);
    $logdb = [];
    $filter = page_and_size($filter);
    $sql = 'SELECT * FROM '.$GLOBALS['ecs']->table('keywords').
        " WHERE  searchengine='ecshop' $where".
        ' ORDER BY date DESC, count DESC'.
        "  LIMIT $filter[start],$filter[page_size]";
    $query = $GLOBALS['db']->query($sql);

    while ($rt = $GLOBALS['db']->fetch_array($query)) {
        $logdb[] = $rt;
    }
    $arr = ['logdb' => $logdb, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']];

    return $arr;
}

}
