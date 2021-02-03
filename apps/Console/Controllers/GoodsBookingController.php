<?php

namespace App\Console\Controllers;

/**
 * 缺货处理管理程序
 */
class GoodsBookingController extends InitController
{
    public function initialize()
    {
        parent::initialize();
        admin_priv('booking');
    }

    /*------------------------------------------------------ */
    //-- 列出所有订购信息
    /*------------------------------------------------------ */
    public function list_allAction()
    {
        $this->assign('ur_here', $_LANG['list_all']);
        $this->assign('full_page', 1);

        $list = get_bookinglist();

        $this->assign('booking_list', $list['item']);
        $this->assign('filter', $list['filter']);
        $this->assign('record_count', $list['record_count']);
        $this->assign('page_count', $list['page_count']);

        $sort_flag = sort_flag($list['filter']);
        $this->assign($sort_flag['tag'], $sort_flag['img']);

        assign_query_info();
        return $this->display('booking_list.htm');
    }

    /*------------------------------------------------------ */
    //-- 翻页、排序
    /*------------------------------------------------------ */
    public function queryAction()
    {
        $list = get_bookinglist();

        $this->assign('booking_list', $list['item']);
        $this->assign('filter', $list['filter']);
        $this->assign('record_count', $list['record_count']);
        $this->assign('page_count', $list['page_count']);

        $sort_flag = sort_flag($list['filter']);
        $this->assign($sort_flag['tag'], $sort_flag['img']);

        return make_json_result(
            $smarty->fetch('booking_list.htm'),
            '',
            array('filter' => $list['filter'], 'page_count' => $list['page_count'])
        );
    }

    /*------------------------------------------------------ */
    //-- 删除缺货登记
    /*------------------------------------------------------ */

    public function removeAction()
    {
        check_authz_json('booking');

        $id = intval($_GET['id']);

        $db->query("DELETE FROM " . table('booking_goods') . " WHERE rec_id='$id'");

        $url = 'goods_booking.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

        return redirect($url);
    }

    /*------------------------------------------------------ */
    //-- 显示详情
    /*------------------------------------------------------ */
    public function detailAction()
    {
        $id = intval($_REQUEST['id']);

        $this->assign('send_fail', !empty($_REQUEST['send_ok']));
        $this->assign('booking', get_booking_info($id));
        $this->assign('ur_here', $_LANG['detail']);
        $this->assign('action_link', array('text' => $_LANG['06_undispose_booking'], 'href' => 'goods_booking.php?act=list_all'));
        return $this->display('booking_info.htm');
    }

    /*------------------------------------------------------ */
    //-- 处理提交数据
    /*------------------------------------------------------ */
    public function updateAction()
    {
        /* 权限判断 */
        admin_priv('booking');

        $dispose_note = !empty($_POST['dispose_note']) ? trim($_POST['dispose_note']) : '';

        $sql = "UPDATE  " . table('booking_goods') .
            " SET is_dispose='1', dispose_note='$dispose_note', " .
            "dispose_time='" . gmtime() . "', dispose_user='" . $_SESSION['admin_name'] . "'" .
            " WHERE rec_id='$_REQUEST[rec_id]'";
        $db->query($sql);

        /* 邮件通知处理流程 */
        if (!empty($_POST['send_email_notice']) or isset($_POST['remail'])) {
            //获取邮件中的必要内容
            $sql = 'SELECT bg.email, bg.link_man, bg.goods_id, g.goods_name ' .
                'FROM ' . table('booking_goods') . ' AS bg, ' . table('goods') . ' AS g ' .
                "WHERE bg.goods_id = g.goods_id AND bg.rec_id='$_REQUEST[rec_id]'";
            $booking_info = $db->getRow($sql);

            /* 设置缺货回复模板所需要的内容信息 */
            $template = get_mail_template('goods_booking');
            $goods_link = $ecs->url() . 'goods.php?id=' . $booking_info['goods_id'];

            $this->assign('user_name', $booking_info['link_man']);
            $this->assign('goods_link', $goods_link);
            $this->assign('goods_name', $booking_info['goods_name']);
            $this->assign('dispose_note', $dispose_note);
            $this->assign('shop_name', "<a href='" . $ecs->url() . "'>" . config('shop.shop_name') . '</a>');
            $this->assign('send_date', date('Y-m-d'));

            $content = $smarty->fetch('str:' . $template['template_content']);

            /* 发送邮件 */
            if (send_mail($booking_info['link_man'], $booking_info['email'], $template['template_subject'], $content, $template['is_html'])) {
                $send_ok = 0;
            } else {
                $send_ok = 1;
            }
        }

        return redirect("?act=detail&id=" . $_REQUEST['rec_id'] . "&send_ok=$send_ok");
    }

    /**
     * 获取订购信息
     *
     * @access  public
     *
     * @return array
     */
    public function get_bookinglist()
    {
        /* 查询条件 */
        $filter['keywords'] = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1) {
            $filter['keywords'] = json_str_iconv($filter['keywords']);
        }
        $filter['dispose'] = empty($_REQUEST['dispose']) ? 0 : intval($_REQUEST['dispose']);
        $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'sort_order' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

        $where = (!empty($_REQUEST['keywords'])) ? " AND g.goods_name LIKE '%" . mysql_like_quote($filter['keywords']) . "%' " : '';
        $where .= (!empty($_REQUEST['dispose'])) ? " AND bg.is_dispose = '$filter[dispose]' " : '';

        $sql = 'SELECT COUNT(*) FROM ' . table('booking_goods') . ' AS bg, ' .
            table('goods') . ' AS g ' .
            "WHERE bg.goods_id = g.goods_id $where";
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        /* 分页大小 */
        $filter = page_and_size($filter);

        /* 获取活动数据 */
        $sql = 'SELECT bg.rec_id, bg.link_man, g.goods_id, g.goods_name, bg.goods_number, bg.booking_time, bg.is_dispose ' .
            'FROM ' . table('booking_goods') . ' AS bg, ' . table('goods') . ' AS g ' .
            "WHERE bg.goods_id = g.goods_id $where " .
            "ORDER BY $filter[sort_by] $filter[sort_order] " .
            "LIMIT " . $filter['start'] . ", $filter[page_size]";
        $row = $GLOBALS['db']->getAll($sql);

        foreach ($row as $key => $val) {
            $row[$key]['booking_time'] = local_date(config('shop.time_format'), $val['booking_time']);
        }
        $filter['keywords'] = stripslashes($filter['keywords']);
        $arr = array('item' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

        return $arr;
    }

    /**
     * 获得缺货登记的详细信息
     *
     * @param integer $id
     *
     * @return  array
     */
    public function get_booking_info($id)
    {

        $sql = "SELECT bg.rec_id, bg.user_id, IFNULL(u.user_name, '$_LANG[guest_user]') AS user_name, " .
            "bg.link_man, g.goods_name, bg.goods_id, bg.goods_number, " .
            "bg.booking_time, bg.goods_desc,bg.dispose_user, bg.dispose_time, bg.email, " .
            "bg.tel, bg.dispose_note ,bg.dispose_user, bg.dispose_time,bg.is_dispose  " .
            "FROM " . table('booking_goods') . " AS bg " .
            "LEFT JOIN " . table('goods') . " AS g ON g.goods_id=bg.goods_id " .
            "LEFT JOIN " . table('users') . " AS u ON u.user_id=bg.user_id " .
            "WHERE bg.rec_id ='$id'";

        $res = $db->getRow($sql);

        /* 格式化时间 */
        $res['booking_time'] = local_date(config('shop.time_format'), $res['booking_time']);
        if (!empty($res['dispose_time'])) {
            $res['dispose_time'] = local_date(config('shop.time_format'), $res['dispose_time']);
        }

        return $res;
    }
}
