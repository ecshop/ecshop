<?php

namespace App\Service\Comment;

/**
 * 订单
 * Class OrderService
 * @package App\Service\Comment
 */
class OrderService
{

    /**
     * 取得订单信息
     * @param int $order_id 订单id（如果order_id > 0 就按id查，否则按sn查）
     * @param string $order_sn 订单号
     * @return  array   订单信息（金额都有相应格式化的字段，前缀是formated_）
     */
    public function order_info($order_id, $order_sn = '')
    {
        /* 计算订单各种费用之和的语句 */
        $total_fee = " (goods_amount - discount + tax + shipping_fee + insure_fee + pay_fee + pack_fee + card_fee) AS total_fee ";
        $order_id = intval($order_id);
        if ($order_id > 0) {
            $sql = "SELECT *, " . $total_fee . " FROM " . table('order_info') .
                " WHERE order_id = '$order_id'";
        } else {
            $sql = "SELECT *, " . $total_fee . "  FROM " . table('order_info') .
                " WHERE order_sn = '$order_sn'";
        }
        $order = $GLOBALS['db']->getRow($sql);

        /* 格式化金额字段 */
        if ($order) {
            $order['formated_goods_amount'] = price_format($order['goods_amount'], false);
            $order['formated_discount'] = price_format($order['discount'], false);
            $order['formated_tax'] = price_format($order['tax'], false);
            $order['formated_shipping_fee'] = price_format($order['shipping_fee'], false);
            $order['formated_insure_fee'] = price_format($order['insure_fee'], false);
            $order['formated_pay_fee'] = price_format($order['pay_fee'], false);
            $order['formated_pack_fee'] = price_format($order['pack_fee'], false);
            $order['formated_card_fee'] = price_format($order['card_fee'], false);
            $order['formated_total_fee'] = price_format($order['total_fee'], false);
            $order['formated_money_paid'] = price_format($order['money_paid'], false);
            $order['formated_bonus'] = price_format($order['bonus'], false);
            $order['formated_integral_money'] = price_format($order['integral_money'], false);
            $order['formated_surplus'] = price_format($order['surplus'], false);
            $order['formated_order_amount'] = price_format(abs($order['order_amount']), false);
            $order['formated_add_time'] = local_date(config('shop.time_format'), $order['add_time']);
        }

        return $order;
    }

    /**
     * 判断订单是否已完成
     * @param array $order 订单信息
     * @return  bool
     */
    public function order_finished($order)
    {
        return $order['order_status'] == OS_CONFIRMED &&
            ($order['shipping_status'] == SS_SHIPPED || $order['shipping_status'] == SS_RECEIVED) &&
            ($order['pay_status'] == PS_PAYED || $order['pay_status'] == PS_PAYING);
    }

    /**
     * 取得订单商品
     * @param int $order_id 订单id
     * @return  array   订单商品数组
     */
    public function order_goods($order_id)
    {
        $sql = "SELECT rec_id, goods_id, goods_name, goods_sn, market_price, goods_number, " .
            "goods_price, goods_attr, is_real, parent_id, is_gift, " .
            "goods_price * goods_number AS subtotal, extension_code " .
            "FROM " . table('order_goods') .
            " WHERE order_id = '$order_id'";

        $res = $GLOBALS['db']->query($sql);

        while ($row = $GLOBALS['db']->fetchRow($res)) {
            if ($row['extension_code'] == 'package_buy') {
                $row['package_goods_list'] = get_package_goods($row['goods_id']);
            }
            $goods_list[] = $row;
        }

        //return $GLOBALS['db']->getAll($sql);
        return $goods_list;
    }

    /**
     * 取得订单总金额
     * @param int $order_id 订单id
     * @param bool $include_gift 是否包括赠品
     * @return  float   订单总金额
     */
    public function order_amount($order_id, $include_gift = true)
    {
        $sql = "SELECT SUM(goods_price * goods_number) " .
            "FROM " . table('order_goods') .
            " WHERE order_id = '$order_id'";
        if (!$include_gift) {
            $sql .= " AND is_gift = 0";
        }

        return floatval($GLOBALS['db']->getOne($sql));
    }

    /**
     * 取得某订单商品总重量和总金额（对应 cart_weight_price）
     * @param int $order_id 订单id
     * @return  array   ('weight' => **, 'amount' => **, 'formated_weight' => **)
     */
    public function order_weight_price($order_id)
    {
        $sql = "SELECT SUM(g.goods_weight * o.goods_number) AS weight, " .
            "SUM(o.goods_price * o.goods_number) AS amount ," .
            "SUM(o.goods_number) AS number " .
            "FROM " . table('order_goods') . " AS o, " .
            table('goods') . " AS g " .
            "WHERE o.order_id = '$order_id' " .
            "AND o.goods_id = g.goods_id";

        $row = $GLOBALS['db']->getRow($sql);
        $row['weight'] = floatval($row['weight']);
        $row['amount'] = floatval($row['amount']);
        $row['number'] = intval($row['number']);

        /* 格式化重量 */
        $row['formated_weight'] = formated_weight($row['weight']);

        return $row;
    }

    /**
     * 获得订单中的费用信息
     *
     * @access  public
     * @param array $order
     * @param array $goods
     * @param array $consignee
     * @param bool $is_gb_deposit 是否团购保证金（如果是，应付款金额只计算商品总额和支付费用，可以获得的积分取 $gift_integral）
     * @return  array
     */
    public function order_fee($order, $goods, $consignee)
    {
        /* 初始化订单的扩展code */
        if (!isset($order['extension_code'])) {
            $order['extension_code'] = '';
        }

        if ($order['extension_code'] == 'group_buy') {
            $group_buy = group_buy_info($order['extension_id']);
        }

        $total = array('real_goods_count' => 0,
            'gift_amount' => 0,
            'goods_price' => 0,
            'market_price' => 0,
            'discount' => 0,
            'pack_fee' => 0,
            'card_fee' => 0,
            'shipping_fee' => 0,
            'shipping_insure' => 0,
            'integral_money' => 0,
            'bonus' => 0,
            'surplus' => 0,
            'cod_fee' => 0,
            'pay_fee' => 0,
            'tax' => 0);
        $weight = 0;

        /* 商品总价 */
        foreach ($goods as $val) {
            /* 统计实体商品的个数 */
            if ($val['is_real']) {
                $total['real_goods_count']++;
            }

            $total['goods_price'] += $val['goods_price'] * $val['goods_number'];
            $total['market_price'] += $val['market_price'] * $val['goods_number'];
        }

        $total['saving'] = $total['market_price'] - $total['goods_price'];
        $total['save_rate'] = $total['market_price'] ? round($total['saving'] * 100 / $total['market_price']) . '%' : 0;

        $total['goods_price_formated'] = price_format($total['goods_price'], false);
        $total['market_price_formated'] = price_format($total['market_price'], false);
        $total['saving_formated'] = price_format($total['saving'], false);

        /* 折扣 */
        if ($order['extension_code'] != 'group_buy') {
            $discount = compute_discount();
            $total['discount'] = $discount['discount'];
            if ($total['discount'] > $total['goods_price']) {
                $total['discount'] = $total['goods_price'];
            }
        }
        $total['discount_formated'] = price_format($total['discount'], false);

        /* 税额 */
        if (!empty($order['need_inv']) && $order['inv_type'] != '') {
            /* 查税率 */
            $rate = 0;
            foreach (config('shop.invoice_type')['type'] as $key => $type) {
                if ($type == $order['inv_type']) {
                    $rate = floatval(config('shop.invoice_type')['rate'][$key]) / 100;
                    break;
                }
            }
            if ($rate > 0) {
                $total['tax'] = $rate * $total['goods_price'];
            }
        }
        $total['tax_formated'] = price_format($total['tax'], false);

        /* 包装费用 */
        if (!empty($order['pack_id'])) {
            $total['pack_fee'] = pack_fee($order['pack_id'], $total['goods_price']);
        }
        $total['pack_fee_formated'] = price_format($total['pack_fee'], false);

        /* 贺卡费用 */
        if (!empty($order['card_id'])) {
            $total['card_fee'] = card_fee($order['card_id'], $total['goods_price']);
        }
        $total['card_fee_formated'] = price_format($total['card_fee'], false);

        /* 红包 */

        if (!empty($order['bonus_id'])) {
            $bonus = bonus_info($order['bonus_id']);
            $total['bonus'] = $bonus['type_money'];
        }
        $total['bonus_formated'] = price_format($total['bonus'], false);

        /* 线下红包 */
        if (!empty($order['bonus_kill'])) {
            $bonus = bonus_info(0, $order['bonus_kill']);
            $total['bonus_kill'] = $order['bonus_kill'];
            $total['bonus_kill_formated'] = price_format($total['bonus_kill'], false);
        }


        /* 配送费用 */
        $shipping_cod_fee = null;

        if ($order['shipping_id'] > 0 && $total['real_goods_count'] > 0) {
            $region['country'] = $consignee['country'];
            $region['province'] = $consignee['province'];
            $region['city'] = $consignee['city'];
            $region['district'] = $consignee['district'];
            $shipping_info = shipping_area_info($order['shipping_id'], $region);

            if (!empty($shipping_info)) {
                if ($order['extension_code'] == 'group_buy') {
                    $weight_price = cart_weight_price(CART_GROUP_BUY_GOODS);
                } else {
                    $weight_price = cart_weight_price();
                }

                // 查看购物车中是否全为免运费商品，若是则把运费赋为零
                $sql = 'SELECT count(*) FROM ' . table('cart') . " WHERE  `session_id` = '" . SESS_ID . "' AND `extension_code` != 'package_buy' AND `is_shipping` = 0";
                $shipping_count = $GLOBALS['db']->getOne($sql);

                $total['shipping_fee'] = ($shipping_count == 0 and $weight_price['free_shipping'] == 1) ? 0 : shipping_fee($shipping_info['shipping_code'], $shipping_info['configure'], $weight_price['weight'], $total['goods_price'], $weight_price['number']);

                if (!empty($order['need_insure']) && $shipping_info['insure'] > 0) {
                    $total['shipping_insure'] = shipping_insure_fee(
                        $shipping_info['shipping_code'],
                        $total['goods_price'],
                        $shipping_info['insure']
                    );
                } else {
                    $total['shipping_insure'] = 0;
                }

                if ($shipping_info['support_cod']) {
                    $shipping_cod_fee = $shipping_info['pay_fee'];
                }
            }
        }

        $total['shipping_fee_formated'] = price_format($total['shipping_fee'], false);
        $total['shipping_insure_formated'] = price_format($total['shipping_insure'], false);

        // 购物车中的商品能享受红包支付的总额
        $bonus_amount = compute_discount_amount();
        // 红包和积分最多能支付的金额为商品总额
        $max_amount = $total['goods_price'] == 0 ? $total['goods_price'] : $total['goods_price'] - $bonus_amount;

        /* 计算订单总额 */
        if ($order['extension_code'] == 'group_buy' && $group_buy['deposit'] > 0) {
            $total['amount'] = $total['goods_price'];
        } else {
            $total['amount'] = $total['goods_price'] - $total['discount'] + $total['tax'] + $total['pack_fee'] + $total['card_fee'] +
                $total['shipping_fee'] + $total['shipping_insure'] + $total['cod_fee'];

            // 减去红包金额
            $use_bonus = min($total['bonus'], $max_amount); // 实际减去的红包金额
            if (isset($total['bonus_kill'])) {
                $use_bonus_kill = min($total['bonus_kill'], $max_amount);
                $total['amount'] -= $price = number_format($total['bonus_kill'], 2, '.', ''); // 还需要支付的订单金额
            }

            $total['bonus'] = $use_bonus;
            $total['bonus_formated'] = price_format($total['bonus'], false);

            $total['amount'] -= $use_bonus; // 还需要支付的订单金额
            $max_amount -= $use_bonus; // 积分最多还能支付的金额
        }

        /* 余额 */
        $order['surplus'] = $order['surplus'] > 0 ? $order['surplus'] : 0;
        if ($total['amount'] > 0) {
            if (isset($order['surplus']) && $order['surplus'] > $total['amount']) {
                $order['surplus'] = $total['amount'];
                $total['amount'] = 0;
            } else {
                $total['amount'] -= floatval($order['surplus']);
            }
        } else {
            $order['surplus'] = 0;
            $total['amount'] = 0;
        }
        $total['surplus'] = $order['surplus'];
        $total['surplus_formated'] = price_format($order['surplus'], false);

        /* 积分 */
        $order['integral'] = $order['integral'] > 0 ? $order['integral'] : 0;
        if ($total['amount'] > 0 && $max_amount > 0 && $order['integral'] > 0) {
            $integral_money = value_of_integral($order['integral']);

            // 使用积分支付
            $use_integral = min($total['amount'], $max_amount, $integral_money); // 实际使用积分支付的金额
            $total['amount'] -= $use_integral;
            $total['integral_money'] = $use_integral;
            $order['integral'] = integral_of_value($use_integral);
        } else {
            $total['integral_money'] = 0;
            $order['integral'] = 0;
        }
        $total['integral'] = $order['integral'];
        $total['integral_formated'] = price_format($total['integral_money'], false);

        /* 保存订单信息 */
        $_SESSION['flow_order'] = $order;

        $se_flow_type = isset($_SESSION['flow_type']) ? $_SESSION['flow_type'] : '';

        /* 支付费用 */
        if (!empty($order['pay_id']) && ($total['real_goods_count'] > 0 || $se_flow_type != CART_EXCHANGE_GOODS)) {
            $total['pay_fee'] = pay_fee($order['pay_id'], $total['amount'], $shipping_cod_fee);
        }

        $total['pay_fee_formated'] = price_format($total['pay_fee'], false);

        $total['amount'] += $total['pay_fee']; // 订单总额累加上支付费用
        $total['amount_formated'] = price_format($total['amount'], false);

        /* 取得可以得到的积分和红包 */
        if ($order['extension_code'] == 'group_buy') {
            $total['will_get_integral'] = $group_buy['gift_integral'];
        } elseif ($order['extension_code'] == 'exchange_goods') {
            $total['will_get_integral'] = 0;
        } else {
            $total['will_get_integral'] = get_give_integral($goods);
        }
        $total['will_get_bonus'] = $order['extension_code'] == 'exchange_goods' ? 0 : price_format(get_total_bonus(), false);
        $total['formated_goods_price'] = price_format($total['goods_price'], false);
        $total['formated_market_price'] = price_format($total['market_price'], false);
        $total['formated_saving'] = price_format($total['saving'], false);

        if ($order['extension_code'] == 'exchange_goods') {
            $sql = 'SELECT SUM(eg.exchange_integral) ' .
                'FROM ' . table('cart') . ' AS c,' . table('exchange_goods') . 'AS eg ' .
                "WHERE c.goods_id = eg.goods_id AND c.session_id= '" . SESS_ID . "' " .
                "  AND c.rec_type = '" . CART_EXCHANGE_GOODS . "' " .
                '  AND c.is_gift = 0 AND c.goods_id > 0 ' .
                'GROUP BY eg.goods_id';
            $exchange_integral = $GLOBALS['db']->getOne($sql);
            $total['exchange_integral'] = $exchange_integral;
        }

        return $total;
    }

    /**
     * 修改订单
     * @param int $order_id 订单id
     * @param array $order key => value
     * @return  bool
     */
    public function update_order($order_id, $order)
    {
        return $GLOBALS['db']->autoExecute(
            table('order_info'),
            $order,
            'UPDATE',
            "order_id = '$order_id'"
        );
    }

    /**
     * 得到新订单号
     * @return  string
     */
    public function get_order_sn()
    {
        /* 选择一个随机的方案 */
        mt_srand((double)microtime() * 1000000);

        return date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    }

    /**
     *  获取用户指定范围的订单列表
     *
     * @access  public
     * @param int $user_id 用户ID号
     * @param int $num 列表最大数量
     * @param int $start 列表起始位置
     * @return  array       $order_list     订单列表
     */
    public function get_user_orders($user_id, $num = 10, $start = 0)
    {
        /* 取得订单列表 */
        $arr = array();

        $sql = "SELECT order_id, order_sn, order_status, shipping_status, pay_status, add_time, " .
            "(goods_amount + shipping_fee + insure_fee + pay_fee + pack_fee + card_fee + tax - discount) AS total_fee " .
            " FROM " . table('order_info') .
            " WHERE user_id = '$user_id' ORDER BY add_time DESC";
        $res = $GLOBALS['db']->selectLimit($sql, $num, $start);

        while ($row = $GLOBALS['db']->fetchRow($res)) {
            if ($row['order_status'] == OS_UNCONFIRMED) {
                $row['handler'] = "<a href=\"user.php?act=cancel_order&order_id=" . $row['order_id'] . "\" onclick=\"if (!confirm('" . $GLOBALS['_LANG']['confirm_cancel'] . "')) return false;\">" . $GLOBALS['_LANG']['cancel'] . "</a>";
            } elseif ($row['order_status'] == OS_SPLITED) {
                /* 对配送状态的处理 */
                if ($row['shipping_status'] == SS_SHIPPED) {
                    @$row['handler'] = "<a href=\"user.php?act=affirm_received&order_id=" . $row['order_id'] . "\" onclick=\"if (!confirm('" . $GLOBALS['_LANG']['confirm_received'] . "')) return false;\">" . $GLOBALS['_LANG']['received'] . "</a>";
                } elseif ($row['shipping_status'] == SS_RECEIVED) {
                    @$row['handler'] = '<span style="color:red">' . $GLOBALS['_LANG']['ss_received'] . '</span>';
                } else {
                    if ($row['pay_status'] == PS_UNPAYED) {
                        @$row['handler'] = "<a href=\"user.php?act=order_detail&order_id=" . $row['order_id'] . '">' . $GLOBALS['_LANG']['pay_money'] . '</a>';
                    } else {
                        @$row['handler'] = "<a href=\"user.php?act=order_detail&order_id=" . $row['order_id'] . '">' . $GLOBALS['_LANG']['view_order'] . '</a>';
                    }
                }
            } else {
                $row['handler'] = '<span style="color:red">' . $GLOBALS['_LANG']['os'][$row['order_status']] . '</span>';
            }

            $row['shipping_status'] = ($row['shipping_status'] == SS_SHIPPED_ING) ? SS_PREPARING : $row['shipping_status'];
            $row['order_status'] = $GLOBALS['_LANG']['os'][$row['order_status']] . ',' . $GLOBALS['_LANG']['ps'][$row['pay_status']] . ',' . $GLOBALS['_LANG']['ss'][$row['shipping_status']];

            $arr[] = array('order_id' => $row['order_id'],
                'order_sn' => $row['order_sn'],
                'order_time' => local_date(config('shop.time_format'), $row['add_time']),
                'order_status' => $row['order_status'],
                'total_fee' => price_format($row['total_fee'], false),
                'handler' => $row['handler']);
        }

        return $arr;
    }

    /**
     * 取消一个用户订单
     *
     * @access  public
     * @param int $order_id 订单ID
     * @param int $user_id 用户ID
     *
     * @return void
     */
    public function cancel_order($order_id, $user_id = 0)
    {
        /* 查询订单信息，检查状态 */
        $sql = "SELECT user_id, order_id, order_sn , surplus , integral , bonus_id, order_status, shipping_status, pay_status FROM " . table('order_info') . " WHERE order_id = '$order_id'";
        $order = $GLOBALS['db']->getRow($sql);

        if (empty($order)) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['order_exist']);
            return false;
        }

        // 如果用户ID大于0，检查订单是否属于该用户
        if ($user_id > 0 && $order['user_id'] != $user_id) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['no_priv']);

            return false;
        }

        // 订单状态只能是“未确认”或“已确认”
        if ($order['order_status'] != OS_UNCONFIRMED && $order['order_status'] != OS_CONFIRMED) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['current_os_not_unconfirmed']);

            return false;
        }

        //订单一旦确认，不允许用户取消
        if ($order['order_status'] == OS_CONFIRMED) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['current_os_already_confirmed']);

            return false;
        }

        // 发货状态只能是“未发货”
        if ($order['shipping_status'] != SS_UNSHIPPED) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['current_ss_not_cancel']);

            return false;
        }

        // 如果付款状态是“已付款”、“付款中”，不允许取消，要取消和商家联系
        if ($order['pay_status'] != PS_UNPAYED) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['current_ps_not_cancel']);

            return false;
        }

        //将用户订单设置为取消
        $sql = "UPDATE " . table('order_info') . " SET order_status = '" . OS_CANCELED . "' WHERE order_id = '$order_id'";
        if ($GLOBALS['db']->query($sql)) {
            /* 记录log */
            order_action($order['order_sn'], OS_CANCELED, $order['shipping_status'], PS_UNPAYED, $GLOBALS['_LANG']['buyer_cancel'], 'buyer');
            /* 退货用户余额、积分、红包 */
            if ($order['user_id'] > 0 && $order['surplus'] > 0) {
                $change_desc = sprintf($GLOBALS['_LANG']['return_surplus_on_cancel'], $order['order_sn']);
                log_account_change($order['user_id'], $order['surplus'], 0, 0, 0, $change_desc);
            }
            if ($order['user_id'] > 0 && $order['integral'] > 0) {
                $change_desc = sprintf($GLOBALS['_LANG']['return_integral_on_cancel'], $order['order_sn']);
                log_account_change($order['user_id'], 0, 0, 0, $order['integral'], $change_desc);
            }
            if ($order['user_id'] > 0 && $order['bonus_id'] > 0) {
                change_user_bonus($order['bonus_id'], $order['order_id'], false);
            }

            /* 如果使用库存，且下订单时减库存，则增加库存 */
            if (config('shop.use_storage') == '1' && config('shop.stock_dec_time') == SDT_PLACE) {
                change_order_goods_storage($order['order_id'], false, 1);
            }

            /* 修改订单 */
            $arr = array(
                'bonus_id' => 0,
                'bonus' => 0,
                'integral' => 0,
                'integral_money' => 0,
                'surplus' => 0
            );
            update_order($order['order_id'], $arr);

            return true;
        } else {
            die($GLOBALS['db']->errorMsg());
        }
    }

    /**
     * 确认一个用户订单
     *
     * @access  public
     * @param int $order_id 订单ID
     * @param int $user_id 用户ID
     *
     * @return  bool        $bool
     */
    public function affirm_received($order_id, $user_id = 0)
    {
        /* 查询订单信息，检查状态 */
        $sql = "SELECT user_id, order_sn , order_status, shipping_status, pay_status FROM " . table('order_info') . " WHERE order_id = '$order_id'";

        $order = $GLOBALS['db']->getRow($sql);

        // 如果用户ID大于 0 。检查订单是否属于该用户
        if ($user_id > 0 && $order['user_id'] != $user_id) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['no_priv']);

            return false;
        } /* 检查订单 */
        elseif ($order['shipping_status'] == SS_RECEIVED) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['order_already_received']);

            return false;
        } elseif ($order['shipping_status'] != SS_SHIPPED) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['order_invalid']);

            return false;
        } /* 修改订单发货状态为“确认收货” */
        else {
            $sql = "UPDATE " . table('order_info') . " SET shipping_status = '" . SS_RECEIVED . "' WHERE order_id = '$order_id'";
            if ($GLOBALS['db']->query($sql)) {
                /* 记录日志 */
                order_action($order['order_sn'], $order['order_status'], SS_RECEIVED, $order['pay_status'], '', $GLOBALS['_LANG']['buyer']);

                return true;
            } else {
                die($GLOBALS['db']->errorMsg());
            }
        }
    }


    /**
     *  获取指订单的详情
     *
     * @access  public
     * @param int $order_id 订单ID
     * @param int $user_id 用户ID
     *
     * @return   arr        $order          订单所有信息的数组
     */
    public function get_order_detail($order_id, $user_id = 0)
    {

        $order_id = intval($order_id);
        if ($order_id <= 0) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['invalid_order_id']);

            return false;
        }
        $order = order_info($order_id);

        //检查订单是否属于该用户
        if ($user_id > 0 && $user_id != $order['user_id']) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['no_priv']);

            return false;
        }

        /* 对发货号处理 */
        if (!empty($order['invoice_no'])) {
            $shipping_code = $GLOBALS['db']->getOne("SELECT shipping_code FROM " . table('shipping') . " WHERE shipping_id = '$order[shipping_id]'");
            $plugin = ROOT_PATH . 'includes/modules/shipping/' . $shipping_code . '.php';
            if (file_exists($plugin)) {
                include_once($plugin);
                $shipping = new $shipping_code;
                $order['invoice_no'] = $shipping->query($order['invoice_no']);
            }
        }

        /* 只有未确认才允许用户修改订单地址 */
        if ($order['order_status'] == OS_UNCONFIRMED) {
            $order['allow_update_address'] = 1; //允许修改收货地址
        } else {
            $order['allow_update_address'] = 0;
        }

        /* 获取订单中实体商品数量 */
        $order['exist_real_goods'] = exist_real_goods($order_id);

        /* 如果是未付款状态，生成支付按钮 */
        if ($order['pay_status'] == PS_UNPAYED &&
            ($order['order_status'] == OS_UNCONFIRMED ||
                $order['order_status'] == OS_CONFIRMED)) {
            /*
             * 在线支付按钮
             */
            //支付方式信息
            $payment_info = array();
            $payment_info = payment_info($order['pay_id']);

            //无效支付方式
            if ($payment_info === false) {
                $order['pay_online'] = '';
            } else {
                //取得支付信息，生成支付代码
                $payment = unserialize_config($payment_info['pay_config']);

                //获取需要支付的log_id
                $order['log_id'] = get_paylog_id($order['order_id'], $pay_type = PAY_ORDER);
                $order['user_name'] = $_SESSION['user_name'];
                $order['pay_desc'] = $payment_info['pay_desc'];

                /* 调用相应的支付方式文件 */
                include_once(ROOT_PATH . 'includes/modules/payment/' . $payment_info['pay_code'] . '.php');

                /* 取得在线支付方式的支付按钮 */
                $pay_obj = new $payment_info['pay_code'];
                $order['pay_online'] = $pay_obj->get_code($order, $payment);
            }
        } else {
            $order['pay_online'] = '';
        }

        /* 无配送时的处理 */
        $order['shipping_id'] == -1 and $order['shipping_name'] = $GLOBALS['_LANG']['shipping_not_need'];

        /* 其他信息初始化 */
        $order['how_oos_name'] = $order['how_oos'];
        $order['how_surplus_name'] = $order['how_surplus'];

        /* 虚拟商品付款后处理 */
        if ($order['pay_status'] != PS_UNPAYED) {
            /* 取得已发货的虚拟商品信息 */
            $virtual_goods = get_virtual_goods($order_id, true);
            $virtual_card = array();
            foreach ($virtual_goods as $code => $goods_list) {
                /* 只处理虚拟卡 */
                if ($code == 'virtual_card') {
                    foreach ($goods_list as $goods) {
                        if ($info = virtual_card_result($order['order_sn'], $goods)) {
                            $virtual_card[] = array('goods_id' => $goods['goods_id'], 'goods_name' => $goods['goods_name'], 'info' => $info);
                        }
                    }
                }
                /* 处理超值礼包里面的虚拟卡 */
                if ($code == 'package_buy') {
                    foreach ($goods_list as $goods) {
                        $sql = 'SELECT g.goods_id FROM ' . table('package_goods') . ' AS pg, ' . table('goods') . ' AS g ' .
                            "WHERE pg.goods_id = g.goods_id AND pg.package_id = '" . $goods['goods_id'] . "' AND extension_code = 'virtual_card'";
                        $vcard_arr = $GLOBALS['db']->getAll($sql);

                        foreach ($vcard_arr as $val) {
                            if ($info = virtual_card_result($order['order_sn'], $val)) {
                                $virtual_card[] = array('goods_id' => $goods['goods_id'], 'goods_name' => $goods['goods_name'], 'info' => $info);
                            }
                        }
                    }
                }
            }
            $var_card = deleteRepeat($virtual_card);
            View::assign('virtual_card', $var_card);
        }

        /* 确认时间 支付时间 发货时间 */
        if ($order['confirm_time'] > 0 && ($order['order_status'] == OS_CONFIRMED || $order['order_status'] == OS_SPLITED || $order['order_status'] == OS_SPLITING_PART)) {
            $order['confirm_time'] = sprintf($GLOBALS['_LANG']['confirm_time'], local_date(config('shop.time_format'), $order['confirm_time']));
        } else {
            $order['confirm_time'] = '';
        }
        if ($order['pay_time'] > 0 && $order['pay_status'] != PS_UNPAYED) {
            $order['pay_time'] = sprintf($GLOBALS['_LANG']['pay_time'], local_date(config('shop.time_format'), $order['pay_time']));
        } else {
            $order['pay_time'] = '';
        }
        if ($order['shipping_time'] > 0 && in_array($order['shipping_status'], array(SS_SHIPPED, SS_RECEIVED))) {
            $order['shipping_time'] = sprintf($GLOBALS['_LANG']['shipping_time'], local_date(config('shop.time_format'), $order['shipping_time']));
        } else {
            $order['shipping_time'] = '';
        }

        return $order;
    }

    /**
     *  获取用户可以和并的订单数组
     *
     * @access  public
     * @param int $user_id 用户ID
     *
     * @return  array       $merge          可合并订单数组
     */
    public function get_user_merge($user_id)
    {
        $sql = "SELECT order_sn FROM " . table('order_info') .
            " WHERE user_id  = '$user_id' " . order_query_sql('unprocessed') .
            "AND extension_code = '' " .
            " ORDER BY add_time DESC";
        $list = $GLOBALS['db']->getCol($sql);

        $merge = array();
        foreach ($list as $val) {
            $merge[$val] = $val;
        }

        return $merge;
    }

    /**
     *  合并指定用户订单
     *
     * @access  public
     * @param string $from_order 合并的从订单号
     * @param string $to_order 合并的主订单号
     *
     * @return  boolen      $bool
     */
    public function merge_user_order($from_order, $to_order, $user_id = 0)
    {
        if ($user_id > 0) {
            /* 检查订单是否属于指定用户 */
            if (strlen($to_order) > 0) {
                $sql = "SELECT user_id FROM " . table('order_info') .
                    " WHERE order_sn = '$to_order'";
                $order_user = $GLOBALS['db']->getOne($sql);
                if ($order_user != $user_id) {
                    $GLOBALS['err']->add($GLOBALS['_LANG']['no_priv']);
                }
            } else {
                $GLOBALS['err']->add($GLOBALS['_LANG']['order_sn_empty']);
                return false;
            }
        }

        $result = merge_order($from_order, $to_order);
        if ($result === true) {
            return true;
        } else {
            $GLOBALS['err']->add($result);
            return false;
        }
    }

    /**
     *  将指定订单中的商品添加到购物车
     *
     * @access  public
     * @param int $order_id
     *
     * @return  mix         $message        成功返回true, 错误返回出错信息
     */
    public function return_to_cart($order_id)
    {
        /* 初始化基本件数量 goods_id => goods_number */
        $basic_number = array();

        /* 查订单商品：不考虑赠品 */
        $sql = "SELECT goods_id, product_id,goods_number, goods_attr, parent_id, goods_attr_id" .
            " FROM " . table('order_goods') .
            " WHERE order_id = '$order_id' AND is_gift = 0 AND extension_code <> 'package_buy'" .
            " ORDER BY parent_id ASC";
        $res = $GLOBALS['db']->query($sql);

        $time = gmtime();
        while ($row = $GLOBALS['db']->fetchRow($res)) {
            // 查该商品信息：是否删除、是否上架

            $sql = "SELECT goods_sn, goods_name, goods_number, market_price, " .
                "IF(is_promote = 1 AND '$time' BETWEEN promote_start_date AND promote_end_date, promote_price, shop_price) AS goods_price," .
                "is_real, extension_code, is_alone_sale, goods_type " .
                "FROM " . table('goods') .
                " WHERE goods_id = '$row[goods_id]' " .
                " AND is_delete = 0 LIMIT 1";
            $goods = $GLOBALS['db']->getRow($sql);

            // 如果该商品不存在，处理下一个商品
            if (empty($goods)) {
                continue;
            }
            if ($row['product_id']) {
                $order_goods_product_id = $row['product_id'];
                $sql = "SELECT product_number from " . table('products') . "where product_id='$order_goods_product_id'";
                $product_number = $GLOBALS['db']->getOne($sql);
            }
            // 如果使用库存，且库存不足，修改数量
            if (config('shop.use_storage') == 1 && ($row['product_id'] ? ($product_number < $row['goods_number']) : ($goods['goods_number'] < $row['goods_number']))) {
                if ($goods['goods_number'] == 0 || $product_number === 0) {
                    // 如果库存为0，处理下一个商品
                    continue;
                } else {
                    if ($row['product_id']) {
                        $row['goods_number'] = $product_number;
                    } else {
                        // 库存不为0，修改数量
                        $row['goods_number'] = $goods['goods_number'];
                    }
                }
            }

            //检查商品价格是否有会员价格
            $sql = "SELECT goods_number FROM" . table('cart') . " " .
                "WHERE session_id = '" . SESS_ID . "' " .
                "AND goods_id = '" . $row['goods_id'] . "' " .
                "AND rec_type = '" . CART_GENERAL_GOODS . "' LIMIT 1";
            $temp_number = $GLOBALS['db']->getOne($sql);
            $row['goods_number'] += $temp_number;

            $attr_array = empty($row['goods_attr_id']) ? array() : explode(',', $row['goods_attr_id']);
            $goods['goods_price'] = get_final_price($row['goods_id'], $row['goods_number'], true, $attr_array);

            // 要返回购物车的商品
            $return_goods = array(
                'goods_id' => $row['goods_id'],
                'goods_sn' => addslashes($goods['goods_sn']),
                'goods_name' => addslashes($goods['goods_name']),
                'market_price' => $goods['market_price'],
                'goods_price' => $goods['goods_price'],
                'goods_number' => $row['goods_number'],
                'goods_attr' => empty($row['goods_attr']) ? '' : addslashes($row['goods_attr']),
                'goods_attr_id' => empty($row['goods_attr_id']) ? '' : addslashes($row['goods_attr_id']),
                'is_real' => $goods['is_real'],
                'extension_code' => addslashes($goods['extension_code']),
                'parent_id' => '0',
                'is_gift' => '0',
                'rec_type' => CART_GENERAL_GOODS
            );

            // 如果是配件
            if ($row['parent_id'] > 0) {
                // 查询基本件信息：是否删除、是否上架、能否作为普通商品销售
                $sql = "SELECT goods_id " .
                    "FROM " . table('goods') .
                    " WHERE goods_id = '$row[parent_id]' " .
                    " AND is_delete = 0 AND is_on_sale = 1 AND is_alone_sale = 1 LIMIT 1";
                $parent = $GLOBALS['db']->getRow($sql);
                if ($parent) {
                    // 如果基本件存在，查询组合关系是否存在
                    $sql = "SELECT goods_price " .
                        "FROM " . table('group_goods') .
                        " WHERE parent_id = '$row[parent_id]' " .
                        " AND goods_id = '$row[goods_id]' LIMIT 1";
                    $fitting_price = $GLOBALS['db']->getOne($sql);
                    if ($fitting_price) {
                        // 如果组合关系存在，取配件价格，取基本件数量，改parent_id
                        $return_goods['parent_id'] = $row['parent_id'];
                        $return_goods['goods_price'] = $fitting_price;
                        $return_goods['goods_number'] = $basic_number[$row['parent_id']];
                    }
                }
            } else {
                // 保存基本件数量
                $basic_number[$row['goods_id']] = $row['goods_number'];
            }

            // 返回购物车：看有没有相同商品
            $sql = "SELECT goods_id " .
                "FROM " . table('cart') .
                " WHERE session_id = '" . SESS_ID . "' " .
                " AND goods_id = '$return_goods[goods_id]' " .
                " AND goods_attr = '$return_goods[goods_attr]' " .
                " AND parent_id = '$return_goods[parent_id]' " .
                " AND is_gift = 0 " .
                " AND rec_type = '" . CART_GENERAL_GOODS . "'";
            $cart_goods = $GLOBALS['db']->getOne($sql);
            if (empty($cart_goods)) {
                // 没有相同商品，插入
                $return_goods['session_id'] = SESS_ID;
                $return_goods['user_id'] = $_SESSION['user_id'];
                $GLOBALS['db']->autoExecute(table('cart'), $return_goods, 'INSERT');
            } else {
                // 有相同商品，修改数量
                $sql = "UPDATE " . table('cart') . " SET " .
                    "goods_number = '" . $return_goods['goods_number'] . "' " .
                    ",goods_price = '" . $return_goods['goods_price'] . "' " .
                    "WHERE session_id = '" . SESS_ID . "' " .
                    "AND goods_id = '" . $return_goods['goods_id'] . "' " .
                    "AND rec_type = '" . CART_GENERAL_GOODS . "' LIMIT 1";
                $GLOBALS['db']->query($sql);
            }
        }

        // 清空购物车的赠品
        $sql = "DELETE FROM " . table('cart') .
            " WHERE session_id = '" . SESS_ID . "' AND is_gift = 1";
        $GLOBALS['db']->query($sql);

        return true;
    }

    /**
     *  通过订单sn取得订单ID
     * @param string $order_sn 订单sn
     * @param blob $voucher 是否为会员充值
     */
    public function get_order_id_by_sn($order_sn, $voucher = 'false')
    {
        if ($voucher == 'true') {
            if (is_numeric($order_sn)) {
                return $GLOBALS['db']->getOne("SELECT log_id FROM " . table('pay_log') . " WHERE order_id=" . $order_sn . ' AND order_type=1');
            } else {
                return "";
            }
        } else {
            if (is_numeric($order_sn)) {
                $sql = 'SELECT order_id FROM ' . table('order_info') . " WHERE order_sn = '$order_sn'";
                $order_id = $GLOBALS['db']->getOne($sql);
            }
            if (!empty($order_id)) {
                $pay_log_id = $GLOBALS['db']->getOne("SELECT log_id FROM " . table('pay_log') . " WHERE order_id='" . $order_id . "'");
                return $pay_log_id;
            } else {
                return "";
            }
        }
    }

}
