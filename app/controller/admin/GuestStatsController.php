<?php

namespace app\controller\admin;

/**
 * 客户统计
 */
class GuestStatsController extends InitController
{
    public function initialize()
    {
        parent::initialize();

        require_once(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/admin/statistic.php');
    }

    /*------------------------------------------------------ */
    //-- 客户统计列表
    /*------------------------------------------------------ */
    public function listAction()
    {
        /* 权限判断 */
        admin_priv('client_flow_stats');

        /* 取得会员总数 */
        $users = init_users();
        $sql = "SELECT COUNT(*) FROM " . $ecs->table("users");
        $res = $db->getCol($sql);
        $user_num = $res[0];


        /* 计算订单各种费用之和的语句 */
        $total_fee = " SUM(" . order_amount_field() . ") AS turnover ";

        /* 有过订单的会员数 */
        $sql = 'SELECT COUNT(DISTINCT user_id) FROM ' . $ecs->table('order_info') .
            " WHERE user_id > 0 " . order_query_sql('finished');
        $have_order_usernum = $db->getOne($sql);

        /* 会员订单总数和订单总购物额 */
        $user_all_order = array();
        $sql = "SELECT COUNT(*) AS order_num, " . $total_fee .
            "FROM " . $ecs->table('order_info') .
            " WHERE user_id > 0 " . order_query_sql('finished');
        $user_all_order = $db->getRow($sql);
        $user_all_order['turnover'] = floatval($user_all_order['turnover']);

        /* 匿名会员订单总数和总购物额 */
        $guest_all_order = array();
        $sql = "SELECT COUNT(*) AS order_num, " . $total_fee .
            "FROM " . $ecs->table('order_info') .
            " WHERE user_id = 0 " . order_query_sql('finished');
        $guest_all_order = $db->getRow($sql);

        /* 匿名会员平均订单额: 购物总额/订单数 */
        $guest_order_amount = ($guest_all_order['order_num'] > 0) ? floatval($guest_all_order['turnover'] / $guest_all_order['order_num']) : '0.00';

        $_GET['flag'] = isset($_GET['flag']) ? 'download' : '';
        if ($_GET['flag'] == 'download') {
            $filename = ecs_iconv(EC_CHARSET, 'GB2312', $_LANG['guest_statistics']);

            header("Content-type: application/vnd.ms-excel; charset=utf-8");
            header("Content-Disposition: attachment; filename=$filename.xls");

            /* 生成会员购买率 */
            $data = $_LANG['percent_buy_member'] . "\t\n";
            $data .= $_LANG['member_count'] . "\t" . $_LANG['order_member_count'] . "\t" .
                $_LANG['member_order_count'] . "\t" . $_LANG['percent_buy_member'] . "\n";

            $data .= $user_num . "\t" . $have_order_usernum . "\t" .
                $user_all_order['order_num'] . "\t" . sprintf("%0.2f", ($user_num > 0 ? $have_order_usernum / $user_num : 0) * 100) . "\n\n";

            /* 每会员平均订单数及购物额 */
            $data .= $_LANG['order_turnover_peruser'] . "\t\n";

            $data .= $_LANG['member_sum'] . "\t" . $_LANG['average_member_order'] . "\t" .
                $_LANG['member_order_sum'] . "\n";

            $ave_user_ordernum = $user_num > 0 ? sprintf("%0.2f", $user_all_order['order_num'] / $user_num) : 0;
            $ave_user_turnover = $user_num > 0 ? price_format($user_all_order['turnover'] / $user_num) : 0;

            $data .= price_format($user_all_order['turnover']) . "\t" . $ave_user_ordernum . "\t" . $ave_user_turnover . "\n\n";

            /* 每会员平均订单数及购物额 */
            $data .= $_LANG['order_turnover_percus'] . "\t\n";
            $data .= $_LANG['guest_member_orderamount'] . "\t" . $_LANG['guest_member_ordercount'] . "\t" .
                $_LANG['guest_order_sum'] . "\n";

            $order_num = $guest_all_order['order_num'] > 0 ? price_format($guest_all_order['turnover'] / $guest_all_order['order_num']) : 0;
            $data .= price_format($guest_all_order['turnover']) . "\t" . $guest_all_order['order_num'] . "\t" .
                $order_num;

            echo ecs_iconv(EC_CHARSET, 'GB2312', $data) . "\t";
            exit;
        }

        /* 赋值到模板 */
        $this->assign('user_num', $user_num);                    // 会员总数
        $this->assign('have_order_usernum', $have_order_usernum);          // 有过订单的会员数
        $this->assign('user_order_turnover', $user_all_order['order_num']); // 会员总订单数
        $this->assign('user_all_turnover', price_format($user_all_order['turnover']));  //会员购物总额
        $this->assign('guest_all_turnover', price_format($guest_all_order['turnover'])); //匿名会员购物总额
        $this->assign('guest_order_num', $guest_all_order['order_num']);              //匿名会员订单总数

        /* 每会员订单数 */
        $this->assign('ave_user_ordernum', $user_num > 0 ? sprintf("%0.2f", $user_all_order['order_num'] / $user_num) : 0);

        /* 每会员购物额 */
        $this->assign('ave_user_turnover', $user_num > 0 ? price_format($user_all_order['turnover'] / $user_num) : 0);

        /* 注册会员购买率 */
        $this->assign('user_ratio', sprintf("%0.2f", ($user_num > 0 ? $have_order_usernum / $user_num : 0) * 100));

        /* 匿名会员平均订单额 */
        $this->assign('guest_order_amount', $guest_all_order['order_num'] > 0 ? price_format($guest_all_order['turnover'] / $guest_all_order['order_num']) : 0);

        $this->assign('all_order', $user_all_order);    //所有订单总数以及所有购物总额
        $this->assign('ur_here', $_LANG['report_guest']);
        $this->assign('lang', $_LANG);

        $this->assign('action_link', array('text' => $_LANG['down_guest_stats'],
            'href' => 'guest_stats.php?flag=download'));

        assign_query_info();
        return $this->display('guest_stats.htm');
    }
}
