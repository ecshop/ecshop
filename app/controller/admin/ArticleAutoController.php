<?php

namespace app\controller\admin;

class ArticleAutoController extends InitController
{
    public function initialize()
    {
        parent::initialize();
        admin_priv('article_auto');
        $this->assign('thisfile', 'article_auto.php');
    }

    public function listAction()
    {
        $goodsdb = get_auto_goods();
        $crons_enable = $db->getOne("SELECT enable FROM " . table('crons') . " WHERE cron_code='ipdel'");
        $this->assign('crons_enable', $crons_enable);
        $this->assign('full_page', 1);
        $this->assign('ur_here', $_LANG['article_auto']);
        $this->assign('goodsdb', $goodsdb['goodsdb']);
        $this->assign('filter', $goodsdb['filter']);
        $this->assign('record_count', $goodsdb['record_count']);
        $this->assign('page_count', $goodsdb['page_count']);
        assign_query_info();
        return $this->display('goods_auto.htm');
    }

    public function queryAction()
    {
        $goodsdb = get_auto_goods();
        $this->assign('goodsdb', $goodsdb['goodsdb']);
        $this->assign('filter', $goodsdb['filter']);
        $this->assign('record_count', $goodsdb['record_count']);
        $this->assign('page_count', $goodsdb['page_count']);

        $sort_flag = sort_flag($goodsdb['filter']);
        $this->assign($sort_flag['tag'], $sort_flag['img']);

        return make_json_result($smarty->fetch('goods_auto.htm'), '', array('filter' => $goodsdb['filter'], 'page_count' => $goodsdb['page_count']));
    }

    public function delAction()
    {
        $goods_id = (int)$_REQUEST['goods_id'];
        $sql = "DELETE FROM " . table('auto_manage') . " WHERE item_id = '$goods_id' AND type = 'article'";
        $db->query($sql);
        $links[] = array('text' => $_LANG['article_auto'], 'href' => 'article_auto.php?act=list');
        sys_msg($_LANG['edit_ok'], 0, $links);
    }

    public function edit_starttimeAction()
    {
        check_authz_json('goods_auto');

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($_POST['val']))) {
            return make_json_error('');
        }

        $id = intval($_POST['id']);
        $time = local_strtotime(trim($_POST['val']));
        if ($id <= 0 || $_POST['val'] == '0000-00-00' || $time <= 0) {
            return make_json_error('');
        }

        $db->autoReplace(table('auto_manage'), array('item_id' => $id, 'type' => 'article',
            'starttime' => $time), array('starttime' => (string)$time));

        clear_cache_files();
        return make_json_result(stripslashes($_POST['val']), '', array('act' => 'article_auto', 'id' => $id));
    }

    public function edit_endtimeAction()
    {
        check_authz_json('goods_auto');

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($_POST['val']))) {
            return make_json_error('');
        }

        $id = intval($_POST['id']);
        $time = local_strtotime(trim($_POST['val']));
        if ($id <= 0 || $_POST['val'] == '0000-00-00' || $time <= 0) {
            return make_json_error('');
        }

        $db->autoReplace(table('auto_manage'), array('item_id' => $id, 'type' => 'article',
            'endtime' => $time), array('endtime' => (string)$time));

        clear_cache_files();
        return make_json_result(stripslashes($_POST['val']), '', array('act' => 'article_auto', 'id' => $id));
    } //批量发布

    public function batch_startAction()
    {
        admin_priv('goods_auto');

        if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes'])) {
            sys_msg($_LANG['no_select_goods'], 1);
        }

        if ($_POST['date'] == '0000-00-00') {
            $_POST['date'] = 0;
        } else {
            $_POST['date'] = local_strtotime(trim($_POST['date']));
        }

        foreach ($_POST['checkboxes'] as $id) {
            $db->autoReplace(table('auto_manage'), array('item_id' => $id, 'type' => 'article',
                'starttime' => $_POST['date']), array('starttime' => (string)$_POST['date']));
        }

        $lnk[] = array('text' => $_LANG['back_list'], 'href' => 'article_auto.php?act=list');
        sys_msg($_LANG['batch_start_succeed'], 0, $lnk);
    } //批量取消发布

    public function batch_endAction()
    {
        admin_priv('goods_auto');

        if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes'])) {
            sys_msg($_LANG['no_select_goods'], 1);
        }

        if ($_POST['date'] == '0000-00-00') {
            $_POST['date'] = 0;
        } else {
            $_POST['date'] = local_strtotime(trim($_POST['date']));
        }

        foreach ($_POST['checkboxes'] as $id) {
            $db->autoReplace(table('auto_manage'), array('item_id' => $id, 'type' => 'article',
                'endtime' => $_POST['date']), array('endtime' => (string)$_POST['date']));
        }

        $lnk[] = array('text' => $_LANG['back_list'], 'href' => 'article_auto.php?act=list');
        sys_msg($_LANG['batch_end_succeed'], 0, $lnk);
    }

    public function get_auto_goods()
    {
        $where = '';
        if (!empty($_POST['goods_name'])) {
            $goods_name = trim($_POST['goods_name']);
            $where = " WHERE g.title LIKE '%$goods_name%'";
            $filter['goods_name'] = $goods_name;
        }
        $sql = "SELECT COUNT(*) FROM " . table('article') . " g" . $where;
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);
        $goodsdb = array();
        $filter = page_and_size($filter);
        $sql = "SELECT g.*,a.starttime,a.endtime FROM " . table('article') . " g LEFT JOIN " . table('auto_manage') . " a ON g.article_id = a.item_id AND a.type='article'" . $where .
            " ORDER BY g. add_time DESC" .
            " LIMIT " . $filter['start'] . ",$filter[page_size]";
        $query = $GLOBALS['db']->query($sql);
        while ($rt = $GLOBALS['db']->fetch_array($query)) {
            if (!empty($rt['starttime'])) {
                $rt['starttime'] = local_date('Y-m-d', $rt['starttime']);
            }
            if (!empty($rt['endtime'])) {
                $rt['endtime'] = local_date('Y-m-d', $rt['endtime']);
            }
            $rt['goods_id'] = $rt['article_id'];
            $rt['goods_name'] = $rt['title'];
            $goodsdb[] = $rt;
        }
        $arr = array('goodsdb' => $goodsdb, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

        return $arr;
    }
}
