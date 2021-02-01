<?php

namespace app\controller;

/**
 * 处理收回确认的页面
 */
class ReceiveController extends InitController
{
    public function indexAction()
    {


        /* 取得参数 */
        $order_id = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;  // 订单号
        $consignee = !empty($_REQUEST['con']) ? rawurldecode(trim($_REQUEST['con'])) : ''; // 收货人

        /* 查询订单信息 */
        $sql = 'SELECT * FROM ' . $ecs->table('order_info') . " WHERE order_id = '$order_id'";
        $order = $db->getRow($sql);

        if (empty($order)) {
            $msg = $_LANG['order_not_exists'];
        } /* 检查订单 */
        elseif ($order['shipping_status'] == SS_RECEIVED) {
            $msg = $_LANG['order_already_received'];
        } elseif ($order['shipping_status'] != SS_SHIPPED) {
            $msg = $_LANG['order_invalid'];
        } elseif ($order['consignee'] != $consignee) {
            $msg = $_LANG['order_invalid'];
        } else {
            /* 修改订单发货状态为“确认收货” */
            $sql = "UPDATE " . $ecs->table('order_info') . " SET shipping_status = '" . SS_RECEIVED . "' WHERE order_id = '$order_id'";
            $db->query($sql);

            /* 记录日志 */
            order_action($order['order_sn'], $order['order_status'], SS_RECEIVED, $order['pay_status'], '', $_LANG['buyer']);

            $msg = $_LANG['act_ok'];
        }

        /* 显示模板 */
        $this->assign_template();
        $position = $this->assign_ur_here();
        $this->assign('page_title', $position['title']);    // 页面标题
        $this->assign('ur_here', $position['ur_here']);  // 当前位置

        $this->assign('categories', get_categories_tree()); // 分类树
        $this->assign('helps', get_shop_help());       // 网店帮助

        $this->assign_dynamic('receive');

        $this->assign('msg', $msg);
        return $this->display('receive.dwt');
    }
}
