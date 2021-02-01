<?php

namespace app\controller\admin;

/**
 * 管理中心积分兑换商品程序文件
 */
class ExchangeGoodsController extends InitController
{
    public function initialize()
    {
        parent::initialize();


        /*初始化数据交换对象 */
        $exc = new exchange(table("exchange_goods"), $db, 'goods_id', 'exchange_integral');
    }

    /*------------------------------------------------------ */
    //-- 商品列表
    /*------------------------------------------------------ */
    public function listAction()
    {
        /* 权限判断 */
        admin_priv('exchange_goods');

        /* 取得过滤条件 */
        $filter = array();
        $this->assign('ur_here', $_LANG['15_exchange_goods_list']);
        $this->assign('action_link', array('text' => $_LANG['exchange_goods_add'], 'href' => 'exchange_goods.php?act=add'));
        $this->assign('full_page', 1);
        $this->assign('filter', $filter);

        $goods_list = get_exchange_goodslist();

        $this->assign('goods_list', $goods_list['arr']);
        $this->assign('filter', $goods_list['filter']);
        $this->assign('record_count', $goods_list['record_count']);
        $this->assign('page_count', $goods_list['page_count']);

        $sort_flag = sort_flag($goods_list['filter']);
        $this->assign($sort_flag['tag'], $sort_flag['img']);

        assign_query_info();
        return $this->display('exchange_goods_list.htm');
    }

    /*------------------------------------------------------ */
    //-- 翻页，排序
    /*------------------------------------------------------ */
    public function queryAction()
    {
        check_authz_json('exchange_goods');

        $goods_list = get_exchange_goodslist();

        $this->assign('goods_list', $goods_list['arr']);
        $this->assign('filter', $goods_list['filter']);
        $this->assign('record_count', $goods_list['record_count']);
        $this->assign('page_count', $goods_list['page_count']);

        $sort_flag = sort_flag($goods_list['filter']);
        $this->assign($sort_flag['tag'], $sort_flag['img']);

        return make_json_result(
            $smarty->fetch('exchange_goods_list.htm'),
            '',
            array('filter' => $goods_list['filter'], 'page_count' => $goods_list['page_count'])
        );
    }

    /*------------------------------------------------------ */
    //-- 添加商品
    /*------------------------------------------------------ */
    public function addAction()
    {
        /* 权限判断 */
        admin_priv('exchange_goods');

        /*初始化*/
        $goods = array();
        $goods['is_exchange'] = 1;
        $goods['is_hot'] = 0;
        $goods['option'] = '<option value="0">' . $_LANG['make_option'] . '</option>';

        $this->assign('goods', $goods);
        $this->assign('ur_here', $_LANG['exchange_goods_add']);
        $this->assign('action_link', array('text' => $_LANG['15_exchange_goods_list'], 'href' => 'exchange_goods.php?act=list'));
        $this->assign('form_action', 'insert');

        assign_query_info();
        return $this->display('exchange_goods_info.htm');
    }

    /*------------------------------------------------------ */
    //-- 添加商品
    /*------------------------------------------------------ */
    public function insertAction()
    {
        /* 权限判断 */
        admin_priv('exchange_goods');

        /*检查是否重复*/
        $is_only = $exc->is_only('goods_id', $_POST['goods_id'], 0, " goods_id ='$_POST[goods_id]'");

        if (!$is_only) {
            sys_msg($_LANG['goods_exist'], 1);
        }

        /*插入数据*/
        $add_time = gmtime();
        if (empty($_POST['goods_id'])) {
            $_POST['goods_id'] = 0;
        }
        $sql = "INSERT INTO " . table('exchange_goods') . "(goods_id, exchange_integral, is_exchange, is_hot) " .
            "VALUES ('$_POST[goods_id]', '$_POST[exchange_integral]', '$_POST[is_exchange]', '$_POST[is_hot]')";
        $db->query($sql);

        $link[0]['text'] = $_LANG['continue_add'];
        $link[0]['href'] = 'exchange_goods.php?act=add';

        $link[1]['text'] = $_LANG['back_list'];
        $link[1]['href'] = 'exchange_goods.php?act=list';

        admin_log($_POST['goods_id'], 'add', 'exchange_goods');

        clear_cache_files(); // 清除相关的缓存文件

        sys_msg($_LANG['articleadd_succeed'], 0, $link);
    }

    /*------------------------------------------------------ */
    //-- 编辑
    /*------------------------------------------------------ */
    public function editAction()
    {
        /* 权限判断 */
        admin_priv('exchange_goods');

        /* 取商品数据 */
        $sql = "SELECT eg.goods_id, eg.exchange_integral,eg.is_exchange, eg.is_hot, g.goods_name " .
            " FROM " . table('exchange_goods') . " AS eg " .
            "  LEFT JOIN " . table('goods') . " AS g ON g.goods_id = eg.goods_id " .
            " WHERE eg.goods_id='$_REQUEST[id]'";
        $goods = $db->getRow($sql);
        $goods['option'] = '<option value="' . $goods['goods_id'] . '">' . $goods['goods_name'] . '</option>';

        $this->assign('goods', $goods);
        $this->assign('ur_here', $_LANG['exchange_goods_add']);
        $this->assign('action_link', array('text' => $_LANG['15_exchange_goods_list'], 'href' => 'exchange_goods.php?act=list&' . list_link_postfix()));
        $this->assign('form_action', 'update');

        assign_query_info();
        return $this->display('exchange_goods_info.htm');
    }

    /*------------------------------------------------------ */
    //-- 编辑
    /*------------------------------------------------------ */
    public function updateAction()
    {
        /* 权限判断 */
        admin_priv('exchange_goods');

        if (empty($_POST['goods_id'])) {
            $_POST['goods_id'] = 0;
        }

        if ($exc->edit("exchange_integral='$_POST[exchange_integral]', is_exchange='$_POST[is_exchange]', is_hot='$_POST[is_hot]' ", $_POST['goods_id'])) {
            $link[0]['text'] = $_LANG['back_list'];
            $link[0]['href'] = 'exchange_goods.php?act=list&' . list_link_postfix();

            admin_log($_POST['goods_id'], 'edit', 'exchange_goods');

            clear_cache_files();
            sys_msg($_LANG['articleedit_succeed'], 0, $link);
        } else {
            die($db->error());
        }
    }

    /*------------------------------------------------------ */
    //-- 编辑使用积分值
    /*------------------------------------------------------ */
    public function edit_exchange_integralAction()
    {
        check_authz_json('exchange_goods');

        $id = intval($_POST['id']);
        $exchange_integral = floatval($_POST['val']);

        /* 检查文章标题是否重复 */
        if ($exchange_integral < 0 || $exchange_integral == 0 && $_POST['val'] != "$goods_price") {
            return make_json_error($_LANG['exchange_integral_invalid']);
        } else {
            if ($exc->edit("exchange_integral = '$exchange_integral'", $id)) {
                clear_cache_files();
                admin_log($id, 'edit', 'exchange_goods');
                return make_json_result(stripslashes($exchange_integral));
            } else {
                return make_json_error($db->error());
            }
        }
    }

    /*------------------------------------------------------ */
    //-- 切换是否兑换
    /*------------------------------------------------------ */
    public function toggle_exchangeAction()
    {
        check_authz_json('exchange_goods');

        $id = intval($_POST['id']);
        $val = intval($_POST['val']);

        $exc->edit("is_exchange = '$val'", $id);
        clear_cache_files();

        return make_json_result($val);
    }

    /*------------------------------------------------------ */
    //-- 切换是否兑换
    /*------------------------------------------------------ */
    public function toggle_hotAction()
    {
        check_authz_json('exchange_goods');

        $id = intval($_POST['id']);
        $val = intval($_POST['val']);

        $exc->edit("is_hot = '$val'", $id);
        clear_cache_files();

        return make_json_result($val);
    }

    /*------------------------------------------------------ */
    //-- 批量删除商品
    /*------------------------------------------------------ */
    public function batch_removeAction()
    {
        admin_priv('exchange_goods');

        if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes'])) {
            sys_msg($_LANG['no_select_goods'], 1);
        }

        $count = 0;
        foreach ($_POST['checkboxes'] as $key => $id) {
            if ($exc->drop($id)) {
                admin_log($id, 'remove', 'exchange_goods');
                $count++;
            }
        }

        $lnk[] = array('text' => $_LANG['back_list'], 'href' => 'exchange_goods.php?act=list');
        sys_msg(sprintf($_LANG['batch_remove_succeed'], $count), 0, $lnk);
    }

    /*------------------------------------------------------ */
    //-- 删除商品
    /*------------------------------------------------------ */
    public function removeAction()
    {
        check_authz_json('exchange_goods');

        $id = intval($_GET['id']);
        if ($exc->drop($id)) {
            admin_log($id, 'remove', 'article');
            clear_cache_files();
        }

        $url = 'exchange_goods.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

        return redirect($url);
    }

    /*------------------------------------------------------ */
    //-- 搜索商品
    /*------------------------------------------------------ */

    public function search_goodsAction()
    {
        $json = new JSON;

        $filters = $json->decode($_GET['JSON']);

        $arr = get_goods_list($filters);

        return make_json_result($arr);
    }

    /* 获得商品列表 */
    public function get_exchange_goodslist()
    {
        $result = get_filter();
        if ($result === false) {
            $filter = array();
            $filter['keyword'] = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
            if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1) {
                $filter['keyword'] = json_str_iconv($filter['keyword']);
            }
            $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'eg.goods_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

            $where = '';
            if (!empty($filter['keyword'])) {
                $where = " AND g.goods_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
            }

            /* 文章总数 */
            $sql = 'SELECT COUNT(*) FROM ' . table('exchange_goods') . ' AS eg ' .
                'LEFT JOIN ' . table('goods') . ' AS g ON g.goods_id = eg.goods_id ' .
                'WHERE 1 ' . $where;
            $filter['record_count'] = $GLOBALS['db']->getOne($sql);

            $filter = page_and_size($filter);

            /* 获取文章数据 */
            $sql = 'SELECT eg.* , g.goods_name ' .
                'FROM ' . table('exchange_goods') . ' AS eg ' .
                'LEFT JOIN ' . table('goods') . ' AS g ON g.goods_id = eg.goods_id ' .
                'WHERE 1 ' . $where . ' ORDER by ' . $filter['sort_by'] . ' ' . $filter['sort_order'];

            $filter['keyword'] = stripslashes($filter['keyword']);
            set_filter($filter, $sql);
        } else {
            $sql = $result['sql'];
            $filter = $result['filter'];
        }
        $arr = array();
        $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);

        while ($rows = $GLOBALS['db']->fetchRow($res)) {
            $arr[] = $rows;
        }
        return array('arr' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    }
}
