<?php

namespace App\Service;

/**
 * 购物流程函数库
 */
class OrderService
{


    /**
     * 处理序列化的支付、配送的配置参数
     * 返回一个以name为索引的数组
     *
     * @access  public
     * @param string $cfg
     * @return  void
     */
    public function unserialize_config($cfg)
    {
        if (is_string($cfg) && ($arr = unserialize($cfg)) !== false) {
            $config = array();

            foreach ($arr as $key => $val) {
                $config[$val['name']] = $val['value'];
            }

            return $config;
        } else {
            return false;
        }
    }

    /**
     * 计算积分的价值（能抵多少钱）
     * @param int $integral 积分
     * @return  float   积分价值
     */
    public function value_of_integral($integral)
    {
        $scale = floatval(config('shop.integral_scale'));

        return $scale > 0 ? round(($integral / 100) * $scale, 2) : 0;
    }

    /**
     * 计算指定的金额需要多少积分
     *
     * @access  public
     * @param integer $value 金额
     * @return  void
     */
    public function integral_of_value($value)
    {
        $scale = floatval(config('shop.integral_scale'));

        return $scale > 0 ? round($value / $scale * 100) : 0;
    }

    /**
     * 订单退款
     * @param array $order 订单
     * @param int $refund_type 退款方式 1 到帐户余额 2 到退款申请（先到余额，再申请提款） 3 不处理
     * @param string $refund_note 退款说明
     * @param float $refund_amount 退款金额（如果为0，取订单已付款金额）
     * @return  bool
     */
    public function order_refund($order, $refund_type, $refund_note, $refund_amount = 0)
    {
        /* 检查参数 */
        $user_id = $order['user_id'];
        if ($user_id == 0 && $refund_type == 1) {
            die('anonymous, cannot return to account balance');
        }

        $amount = $refund_amount > 0 ? $refund_amount : $order['money_paid'];
        if ($amount <= 0) {
            return true;
        }

        if (!in_array($refund_type, array(1, 2, 3))) {
            die('invalid params');
        }

        /* 备注信息 */
        if ($refund_note) {
            $change_desc = $refund_note;
        } else {
            include_once(ROOT_PATH . 'languages/' . config('shop.lang') . '/admin/order.php');
            $change_desc = sprintf($GLOBALS['_LANG']['order_refund'], $order['order_sn']);
        }

        /* 处理退款 */
        if (1 == $refund_type) {
            log_account_change($user_id, $amount, 0, 0, 0, $change_desc);

            return true;
        } elseif (2 == $refund_type) {
            /* 如果非匿名，退回余额 */
            if ($user_id > 0) {
                log_account_change($user_id, $amount, 0, 0, 0, $change_desc);
            }

            /* user_account 表增加提款申请记录 */
            $account = array(
                'user_id' => $user_id,
                'amount' => (-1) * $amount,
                'add_time' => gmtime(),
                'user_note' => $refund_note,
                'process_type' => SURPLUS_RETURN,
                'admin_user' => $_SESSION['admin_name'],
                'admin_note' => sprintf($GLOBALS['_LANG']['order_refund'], $order['order_sn']),
                'is_paid' => 0
            );
            $GLOBALS['db']->autoExecute(table('user_account'), $account, 'INSERT');

            return true;
        } else {
            return true;
        }
    }

    /**
     * 查询购物车（订单id为0）或订单中是否有实体商品
     * @param int $order_id 订单id
     * @param int $flow_type 购物流程类型
     * @return  bool
     */
    public function exist_real_goods($order_id = 0, $flow_type = CART_GENERAL_GOODS)
    {
        if ($order_id <= 0) {
            $sql = "SELECT COUNT(*) FROM " . table('cart') .
                " WHERE session_id = '" . SESS_ID . "' AND is_real = 1 " .
                "AND rec_type = '$flow_type'";
        } else {
            $sql = "SELECT COUNT(*) FROM " . table('order_goods') .
                " WHERE order_id = '$order_id' AND is_real = 1";
        }

        return $GLOBALS['db']->getOne($sql) > 0;
    }

    /**
     * 检查收货人信息是否完整
     * @param array $consignee 收货人信息
     * @param int $flow_type 购物流程类型
     * @return  bool    true 完整 false 不完整
     */
    public function check_consignee_info($consignee, $flow_type)
    {
        if (exist_real_goods(0, $flow_type)) {
            /* 如果存在实体商品 */
            $res = !empty($consignee['consignee']) &&
                !empty($consignee['country']) &&
                !empty($consignee['email']) &&
                !empty($consignee['tel']);

            if ($res) {
                if (empty($consignee['province'])) {
                    /* 没有设置省份，检查当前国家下面有没有设置省份 */
                    $pro = get_regions(1, $consignee['country']);
                    $res = empty($pro);
                } elseif (empty($consignee['city'])) {
                    /* 没有设置城市，检查当前省下面有没有城市 */
                    $city = get_regions(2, $consignee['province']);
                    $res = empty($city);
                } elseif (empty($consignee['district'])) {
                    $dist = get_regions(3, $consignee['city']);
                    $res = empty($dist);
                }
            }

            return $res;
        } else {
            /* 如果不存在实体商品 */
            return !empty($consignee['consignee']) &&
                !empty($consignee['email']) &&
                !empty($consignee['tel']);
        }
    }

    /**
     * 获得上一次用户采用的支付和配送方式
     *
     * @access  public
     * @return  void
     */
    public function last_shipping_and_payment()
    {
        $sql = "SELECT shipping_id, pay_id " .
            " FROM " . table('order_info') .
            " WHERE user_id = '$_SESSION[user_id]' " .
            " ORDER BY order_id DESC LIMIT 1";
        $row = $GLOBALS['db']->getRow($sql);

        if (empty($row)) {
            /* 如果获得是一个空数组，则返回默认值 */
            $row = array('shipping_id' => 0, 'pay_id' => 0);
        }

        return $row;
    }

    /**
     * 取得当前用户应该得到的红包总额
     */
    public function get_total_bonus()
    {
        $day = getdate();
        $today = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);

        /* 按商品发的红包 */
        $sql = "SELECT SUM(c.goods_number * t.type_money)" .
            "FROM " . table('cart') . " AS c, "
            . table('bonus_type') . " AS t, "
            . table('goods') . " AS g " .
            "WHERE c.session_id = '" . SESS_ID . "' " .
            "AND c.is_gift = 0 " .
            "AND c.goods_id = g.goods_id " .
            "AND g.bonus_type_id = t.type_id " .
            "AND t.send_type = '" . SEND_BY_GOODS . "' " .
            "AND t.send_start_date <= '$today' " .
            "AND t.send_end_date >= '$today' " .
            "AND c.rec_type = '" . CART_GENERAL_GOODS . "'";
        $goods_total = floatval($GLOBALS['db']->getOne($sql));

        /* 取得购物车中非赠品总金额 */
        $sql = "SELECT SUM(goods_price * goods_number) " .
            "FROM " . table('cart') .
            " WHERE session_id = '" . SESS_ID . "' " .
            " AND is_gift = 0 " .
            " AND rec_type = '" . CART_GENERAL_GOODS . "'";
        $amount = floatval($GLOBALS['db']->getOne($sql));

        /* 按订单发的红包 */
        $sql = "SELECT FLOOR('$amount' / min_amount) * type_money " .
            "FROM " . table('bonus_type') .
            " WHERE send_type = '" . SEND_BY_ORDER . "' " .
            " AND send_start_date <= '$today' " .
            "AND send_end_date >= '$today' " .
            "AND min_amount > 0 ";
        $order_total = floatval($GLOBALS['db']->getOne($sql));

        return $goods_total + $order_total;
    }

    /**
     * 处理红包（下订单时设为使用，取消（无效，退货）订单时设为未使用
     * @param int $bonus_id 红包编号
     * @param int $order_id 订单号
     * @param int $is_used 是否使用了
     */
    public function change_user_bonus($bonus_id, $order_id, $is_used = true)
    {
        if ($is_used) {
            $sql = 'UPDATE ' . table('user_bonus') . ' SET ' .
                'used_time = ' . gmtime() . ', ' .
                "order_id = '$order_id' " .
                "WHERE bonus_id = '$bonus_id'";
        } else {
            $sql = 'UPDATE ' . table('user_bonus') . ' SET ' .
                'used_time = 0, ' .
                'order_id = 0 ' .
                "WHERE bonus_id = '$bonus_id'";
        }
        $GLOBALS['db']->query($sql);
    }

    /**
     * 获得订单信息
     *
     * @access  private
     * @return  array
     */
    public function flow_order_info()
    {
        $order = isset($_SESSION['flow_order']) ? $_SESSION['flow_order'] : array();

        /* 初始化配送和支付方式 */
        if (!isset($order['shipping_id']) || !isset($order['pay_id'])) {
            /* 如果还没有设置配送和支付 */
            if ($_SESSION['user_id'] > 0) {
                /* 用户已经登录了，则获得上次使用的配送和支付 */
                $arr = last_shipping_and_payment();

                if (!isset($order['shipping_id'])) {
                    $order['shipping_id'] = $arr['shipping_id'];
                }
                if (!isset($order['pay_id'])) {
                    $order['pay_id'] = $arr['pay_id'];
                }
            } else {
                if (!isset($order['shipping_id'])) {
                    $order['shipping_id'] = 0;
                }
                if (!isset($order['pay_id'])) {
                    $order['pay_id'] = 0;
                }
            }
        }

        if (!isset($order['pack_id'])) {
            $order['pack_id'] = 0;  // 初始化包装
        }
        if (!isset($order['card_id'])) {
            $order['card_id'] = 0;  // 初始化贺卡
        }
        if (!isset($order['bonus'])) {
            $order['bonus'] = 0;    // 初始化红包
        }
        if (!isset($order['integral'])) {
            $order['integral'] = 0; // 初始化积分
        }
        if (!isset($order['surplus'])) {
            $order['surplus'] = 0;  // 初始化余额
        }

        /* 扩展信息 */
        if (isset($_SESSION['flow_type']) && intval($_SESSION['flow_type']) != CART_GENERAL_GOODS) {
            $order['extension_code'] = $_SESSION['extension_code'];
            $order['extension_id'] = $_SESSION['extension_id'];
        }

        return $order;
    }

    /**
     * 合并订单
     * @param string $from_order_sn 从订单号
     * @param string $to_order_sn 主订单号
     * @return  成功返回true，失败返回错误信息
     */
    public function merge_order($from_order_sn, $to_order_sn)
    {
        /* 订单号不能为空 */
        if (trim($from_order_sn) == '' || trim($to_order_sn) == '') {
            return $GLOBALS['_LANG']['order_sn_not_null'];
        }

        /* 订单号不能相同 */
        if ($from_order_sn == $to_order_sn) {
            return $GLOBALS['_LANG']['two_order_sn_same'];
        }

        /* 取得订单信息 */
        $from_order = order_info(0, $from_order_sn);
        $to_order = order_info(0, $to_order_sn);

        /* 检查订单是否存在 */
        if (!$from_order) {
            return sprintf($GLOBALS['_LANG']['order_not_exist'], $from_order_sn);
        } elseif (!$to_order) {
            return sprintf($GLOBALS['_LANG']['order_not_exist'], $to_order_sn);
        }

        /* 检查合并的订单是否为普通订单，非普通订单不允许合并 */
        if ($from_order['extension_code'] != '' || $to_order['extension_code'] != 0) {
            return $GLOBALS['_LANG']['merge_invalid_order'];
        }

        /* 检查订单状态是否是已确认或未确认、未付款、未发货 */
        if ($from_order['order_status'] != OS_UNCONFIRMED && $from_order['order_status'] != OS_CONFIRMED) {
            return sprintf($GLOBALS['_LANG']['os_not_unconfirmed_or_confirmed'], $from_order_sn);
        } elseif ($from_order['pay_status'] != PS_UNPAYED) {
            return sprintf($GLOBALS['_LANG']['ps_not_unpayed'], $from_order_sn);
        } elseif ($from_order['shipping_status'] != SS_UNSHIPPED) {
            return sprintf($GLOBALS['_LANG']['ss_not_unshipped'], $from_order_sn);
        }

        if ($to_order['order_status'] != OS_UNCONFIRMED && $to_order['order_status'] != OS_CONFIRMED) {
            return sprintf($GLOBALS['_LANG']['os_not_unconfirmed_or_confirmed'], $to_order_sn);
        } elseif ($to_order['pay_status'] != PS_UNPAYED) {
            return sprintf($GLOBALS['_LANG']['ps_not_unpayed'], $to_order_sn);
        } elseif ($to_order['shipping_status'] != SS_UNSHIPPED) {
            return sprintf($GLOBALS['_LANG']['ss_not_unshipped'], $to_order_sn);
        }

        /* 检查订单用户是否相同 */
        if ($from_order['user_id'] != $to_order['user_id']) {
            return $GLOBALS['_LANG']['order_user_not_same'];
        }

        /* 合并订单 */
        $order = $to_order;
        $order['order_id'] = '';
        $order['add_time'] = gmtime();

        // 合并商品总额
        $order['goods_amount'] += $from_order['goods_amount'];

        // 合并折扣
        $order['discount'] += $from_order['discount'];

        if ($order['shipping_id'] > 0) {
            // 重新计算配送费用
            $weight_price = order_weight_price($to_order['order_id']);
            $from_weight_price = order_weight_price($from_order['order_id']);
            $weight_price['weight'] += $from_weight_price['weight'];
            $weight_price['amount'] += $from_weight_price['amount'];
            $weight_price['number'] += $from_weight_price['number'];

            $region_id_list = array($order['country'], $order['province'], $order['city'], $order['district']);
            $shipping_area = shipping_area_info($order['shipping_id'], $region_id_list);

            $order['shipping_fee'] = shipping_fee(
                $shipping_area['shipping_code'],
                unserialize($shipping_area['configure']),
                $weight_price['weight'],
                $weight_price['amount'],
                $weight_price['number']
            );

            // 如果保价了，重新计算保价费
            if ($order['insure_fee'] > 0) {
                $order['insure_fee'] = shipping_insure_fee($shipping_area['shipping_code'], $order['goods_amount'], $shipping_area['insure']);
            }
        }

        // 重新计算包装费、贺卡费
        if ($order['pack_id'] > 0) {
            $pack = pack_info($order['pack_id']);
            $order['pack_fee'] = $pack['free_money'] > $order['goods_amount'] ? $pack['pack_fee'] : 0;
        }
        if ($order['card_id'] > 0) {
            $card = card_info($order['card_id']);
            $order['card_fee'] = $card['free_money'] > $order['goods_amount'] ? $card['card_fee'] : 0;
        }

        // 红包不变，合并积分、余额、已付款金额
        $order['integral'] += $from_order['integral'];
        $order['integral_money'] = value_of_integral($order['integral']);
        $order['surplus'] += $from_order['surplus'];
        $order['money_paid'] += $from_order['money_paid'];

        // 计算应付款金额（不包括支付费用）
        $order['order_amount'] = $order['goods_amount'] - $order['discount']
            + $order['shipping_fee']
            + $order['insure_fee']
            + $order['pack_fee']
            + $order['card_fee']
            - $order['bonus']
            - $order['integral_money']
            - $order['surplus']
            - $order['money_paid'];

        // 重新计算支付费
        if ($order['pay_id'] > 0) {
            // 货到付款手续费
            $cod_fee = $shipping_area ? $shipping_area['pay_fee'] : 0;
            $order['pay_fee'] = pay_fee($order['pay_id'], $order['order_amount'], $cod_fee);

            // 应付款金额加上支付费
            $order['order_amount'] += $order['pay_fee'];
        }

        /* 插入订单表 */
        do {
            $order['order_sn'] = get_order_sn();
            if ($GLOBALS['db']->autoExecute(table('order_info'), addslashes_deep($order), 'INSERT')) {
                break;
            } else {
                if ($GLOBALS['db']->errno() != 1062) {
                    die($GLOBALS['db']->errorMsg());
                }
            }
        } while (true); // 防止订单号重复

        /* 订单号 */
        $order_id = $GLOBALS['db']->insert_id();

        /* 更新订单商品 */
        $sql = 'UPDATE ' . table('order_goods') .
            " SET order_id = '$order_id' " .
            "WHERE order_id " . db_create_in(array($from_order['order_id'], $to_order['order_id']));
        $GLOBALS['db']->query($sql);

        /* 插入支付日志 */
        insert_pay_log($order_id, $order['order_amount'], PAY_ORDER);

        /* 删除原订单 */
        $sql = 'DELETE FROM ' . table('order_info') .
            " WHERE order_id " . db_create_in(array($from_order['order_id'], $to_order['order_id']));
        $GLOBALS['db']->query($sql);

        /* 删除原订单支付日志 */
        $sql = 'DELETE FROM ' . table('pay_log') .
            " WHERE order_id " . db_create_in(array($from_order['order_id'], $to_order['order_id']));
        $GLOBALS['db']->query($sql);

        /* 返还 from_order 的红包，因为只使用 to_order 的红包 */
        if ($from_order['bonus_id'] > 0) {
            unuse_bonus($from_order['bonus_id']);
        }

        /* 返回成功 */
        return true;
    }

    /**
     * 查询配送区域属于哪个办事处管辖
     * @param array $regions 配送区域（1、2、3、4级按顺序）
     * @return  int     办事处id，可能为0
     */
    public function get_agency_by_regions($regions)
    {
        if (!is_array($regions) || empty($regions)) {
            return 0;
        }

        $arr = array();
        $sql = "SELECT region_id, agency_id " .
            "FROM " . table('region') .
            " WHERE region_id " . db_create_in($regions) .
            " AND region_id > 0 AND agency_id > 0";
        $res = $GLOBALS['db']->query($sql);
        while ($row = $GLOBALS['db']->fetchRow($res)) {
            $arr[$row['region_id']] = $row['agency_id'];
        }
        if (empty($arr)) {
            return 0;
        }

        $agency_id = 0;
        for ($i = count($regions) - 1; $i >= 0; $i--) {
            if (isset($arr[$regions[$i]])) {
                return $arr[$regions[$i]];
            }
        }
    }

    /**
     * 获取配送插件的实例
     * @param int $shipping_id 配送插件ID
     * @return  object     配送插件对象实例
     */
    public function &get_shipping_object($shipping_id)
    {
        $shipping = shipping_info($shipping_id);
        if (!$shipping) {
            $object = new stdClass();
            return $object;
        }

        $file_path = ROOT_PATH . 'includes/modules/shipping/' . $shipping['shipping_code'] . '.php';

        include_once($file_path);

        $object = new $shipping['shipping_code'];
        return $object;
    }

    /**
     * 改变订单中商品库存
     * @param int $order_id 订单号
     * @param bool $is_dec 是否减少库存
     * @param bool $storage 减库存的时机，1，下订单时；0，发货时；
     */
    public function change_order_goods_storage($order_id, $is_dec = true, $storage = 0)
    {
        /* 查询订单商品信息 */
        switch ($storage) {
            case 0:
                $sql = "SELECT goods_id, SUM(send_number) AS num, MAX(extension_code) AS extension_code, product_id FROM " . table('order_goods') .
                    " WHERE order_id = '$order_id' AND is_real = 1 GROUP BY goods_id, product_id";
                break;

            case 1:
                $sql = "SELECT goods_id, SUM(goods_number) AS num, MAX(extension_code) AS extension_code, product_id FROM " . table('order_goods') .
                    " WHERE order_id = '$order_id' AND is_real = 1 GROUP BY goods_id, product_id";
                break;
        }

        $res = $GLOBALS['db']->query($sql);
        while ($row = $GLOBALS['db']->fetchRow($res)) {
            if ($row['extension_code'] != "package_buy") {
                if ($is_dec) {
                    change_goods_storage($row['goods_id'], $row['product_id'], -$row['num']);
                } else {
                    change_goods_storage($row['goods_id'], $row['product_id'], $row['num']);
                }
                $GLOBALS['db']->query($sql);
            } else {
                $sql = "SELECT goods_id, goods_number" .
                    " FROM " . table('package_goods') .
                    " WHERE package_id = '" . $row['goods_id'] . "'";
                $res_goods = $GLOBALS['db']->query($sql);
                while ($row_goods = $GLOBALS['db']->fetchRow($res_goods)) {
                    $sql = "SELECT is_real" .
                        " FROM " . table('goods') .
                        " WHERE goods_id = '" . $row_goods['goods_id'] . "'";
                    $real_goods = $GLOBALS['db']->query($sql);
                    $is_goods = $GLOBALS['db']->fetchRow($real_goods);

                    if ($is_dec) {
                        change_goods_storage($row_goods['goods_id'], $row['product_id'], -($row['num'] * $row_goods['goods_number']));
                    } elseif ($is_goods['is_real']) {
                        change_goods_storage($row_goods['goods_id'], $row['product_id'], ($row['num'] * $row_goods['goods_number']));
                    }
                }
            }
        }
    }

    /**
     * 商品库存增与减 货品库存增与减
     *
     * @param int $good_id 商品ID
     * @param int $product_id 货品ID
     * @param int $number 增减数量，默认0；
     *
     * @return  bool               true，成功；false，失败；
     */
    public function change_goods_storage($good_id, $product_id, $number = 0)
    {
        if ($number == 0) {
            return true; // 值为0即不做、增减操作，返回true
        }

        if (empty($good_id) || empty($number)) {
            return false;
        }

        $number = ($number > 0) ? '+ ' . $number : $number;

        /* 处理货品库存 */
        $products_query = true;
        if (!empty($product_id)) {
            $sql = "UPDATE " . table('products') . "
                SET product_number = product_number $number
                WHERE goods_id = '$good_id'
                AND product_id = '$product_id'
                LIMIT 1";
            $products_query = $GLOBALS['db']->query($sql);
        }

        /* 处理商品库存 */
        $sql = "UPDATE " . table('goods') . "
            SET goods_number = goods_number $number
            WHERE goods_id = '$good_id'
            LIMIT 1";
        $query = $GLOBALS['db']->query($sql);

        if ($query && $products_query) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 取得支付方式id列表
     * @param bool $is_cod 是否货到付款
     * @return  array
     */
    public function payment_id_list($is_cod)
    {
        $sql = "SELECT pay_id FROM " . table('payment');
        if ($is_cod) {
            $sql .= " WHERE is_cod = 1";
        } else {
            $sql .= " WHERE is_cod = 0";
        }

        return $GLOBALS['db']->getCol($sql);
    }

    /**
     * 生成查询订单的sql
     * @param string $type 类型
     * @param string $alias order表的别名（包括.例如 o.）
     * @return  string
     */
    public function order_query_sql($type = 'finished', $alias = '')
    {
        /* 已完成订单 */
        if ($type == 'finished') {
            return " AND {$alias}order_status " . db_create_in(array(OS_CONFIRMED, OS_SPLITED)) .
                " AND {$alias}shipping_status " . db_create_in(array(SS_SHIPPED, SS_RECEIVED)) .
                " AND {$alias}pay_status " . db_create_in(array(PS_PAYED, PS_PAYING)) . " ";
        } /* 待发货订单 */
        elseif ($type == 'await_ship') {
            return " AND   {$alias}order_status " .
                db_create_in(array(OS_CONFIRMED, OS_SPLITED, OS_SPLITING_PART)) .
                " AND   {$alias}shipping_status " .
                db_create_in(array(SS_UNSHIPPED, SS_PREPARING, SS_SHIPPED_ING)) .
                " AND ( {$alias}pay_status " . db_create_in(array(PS_PAYED, PS_PAYING)) . " OR {$alias}pay_id " . db_create_in(payment_id_list(true)) . ") ";
        } /* 待付款订单 */
        elseif ($type == 'await_pay') {
            return " AND   {$alias}order_status " . db_create_in(array(OS_CONFIRMED, OS_SPLITED)) .
                " AND   {$alias}pay_status = '" . PS_UNPAYED . "'" .
                " AND ( {$alias}shipping_status " . db_create_in(array(SS_SHIPPED, SS_RECEIVED)) . " OR {$alias}pay_id " . db_create_in(payment_id_list(false)) . ") ";
        } /* 未确认订单 */
        elseif ($type == 'unconfirmed') {
            return " AND {$alias}order_status = '" . OS_UNCONFIRMED . "' ";
        } /* 未处理订单：用户可操作 */
        elseif ($type == 'unprocessed') {
            return " AND {$alias}order_status " . db_create_in(array(OS_UNCONFIRMED, OS_CONFIRMED)) .
                " AND {$alias}shipping_status = '" . SS_UNSHIPPED . "'" .
                " AND {$alias}pay_status = '" . PS_UNPAYED . "' ";
        } /* 未付款未发货订单：管理员可操作 */
        elseif ($type == 'unpay_unship') {
            return " AND {$alias}order_status " . db_create_in(array(OS_UNCONFIRMED, OS_CONFIRMED)) .
                " AND {$alias}shipping_status " . db_create_in(array(SS_UNSHIPPED, SS_PREPARING)) .
                " AND {$alias}pay_status = '" . PS_UNPAYED . "' ";
        } /* 已发货订单：不论是否付款 */
        elseif ($type == 'shipped') {
            return " AND {$alias}order_status = '" . OS_CONFIRMED . "'" .
                " AND {$alias}shipping_status " . db_create_in(array(SS_SHIPPED, SS_RECEIVED)) . " ";
        } else {
            die('函数 order_query_sql 参数错误');
        }
    }

    /**
     * 生成查询订单总金额的字段
     * @param string $alias order表的别名（包括.例如 o.）
     * @return  string
     */
    public function order_amount_field($alias = '')
    {
        return "   {$alias}goods_amount + {$alias}tax + {$alias}shipping_fee" .
            " + {$alias}insure_fee + {$alias}pay_fee + {$alias}pack_fee" .
            " + {$alias}card_fee ";
    }

    /**
     * 生成计算应付款金额的字段
     * @param string $alias order表的别名（包括.例如 o.）
     * @return  string
     */
    public function order_due_field($alias = '')
    {
        return order_amount_field($alias) .
            " - {$alias}money_paid - {$alias}surplus - {$alias}integral_money" .
            " - {$alias}bonus - {$alias}discount ";
    }

    /**
     * 计算折扣：根据购物车和优惠活动
     * @return  float   折扣
     */
    public function compute_discount()
    {
        /* 查询优惠活动 */
        $now = gmtime();
        $user_rank = ',' . $_SESSION['user_rank'] . ',';
        $sql = "SELECT *" .
            "FROM " . table('favourable_activity') .
            " WHERE start_time <= '$now'" .
            " AND end_time >= '$now'" .
            " AND CONCAT(',', user_rank, ',') LIKE '%" . $user_rank . "%'" .
            " AND act_type " . db_create_in(array(FAT_DISCOUNT, FAT_PRICE));
        $favourable_list = $GLOBALS['db']->getAll($sql);
        if (!$favourable_list) {
            return 0;
        }

        /* 查询购物车商品 */
        $sql = "SELECT c.goods_id, c.goods_price * c.goods_number AS subtotal, g.cat_id, g.brand_id " .
            "FROM " . table('cart') . " AS c, " . table('goods') . " AS g " .
            "WHERE c.goods_id = g.goods_id " .
            "AND c.session_id = '" . SESS_ID . "' " .
            "AND c.parent_id = 0 " .
            "AND c.is_gift = 0 " .
            "AND rec_type = '" . CART_GENERAL_GOODS . "'";
        $goods_list = $GLOBALS['db']->getAll($sql);
        if (!$goods_list) {
            return 0;
        }

        /* 初始化折扣 */
        $discount = 0;
        $favourable_name = array();

        /* 循环计算每个优惠活动的折扣 */
        foreach ($favourable_list as $favourable) {
            $total_amount = 0;
            if ($favourable['act_range'] == FAR_ALL) {
                foreach ($goods_list as $goods) {
                    $total_amount += $goods['subtotal'];
                }
            } elseif ($favourable['act_range'] == FAR_CATEGORY) {
                /* 找出分类id的子分类id */
                $id_list = array();
                $raw_id_list = explode(',', $favourable['act_range_ext']);
                foreach ($raw_id_list as $id) {
                    $id_list = array_merge($id_list, array_keys(cat_list($id, 0, false)));
                }
                $ids = join(',', array_unique($id_list));

                foreach ($goods_list as $goods) {
                    if (strpos(',' . $ids . ',', ',' . $goods['cat_id'] . ',') !== false) {
                        $total_amount += $goods['subtotal'];
                    }
                }
            } elseif ($favourable['act_range'] == FAR_BRAND) {
                foreach ($goods_list as $goods) {
                    if (strpos(',' . $favourable['act_range_ext'] . ',', ',' . $goods['brand_id'] . ',') !== false) {
                        $total_amount += $goods['subtotal'];
                    }
                }
            } elseif ($favourable['act_range'] == FAR_GOODS) {
                foreach ($goods_list as $goods) {
                    if (strpos(',' . $favourable['act_range_ext'] . ',', ',' . $goods['goods_id'] . ',') !== false) {
                        $total_amount += $goods['subtotal'];
                    }
                }
            } else {
                continue;
            }

            /* 如果金额满足条件，累计折扣 */
            if ($total_amount > 0 && $total_amount >= $favourable['min_amount'] && ($total_amount <= $favourable['max_amount'] || $favourable['max_amount'] == 0)) {
                if ($favourable['act_type'] == FAT_DISCOUNT) {
                    $discount += $total_amount * (1 - $favourable['act_type_ext'] / 100);

                    $favourable_name[] = $favourable['act_name'];
                } elseif ($favourable['act_type'] == FAT_PRICE) {
                    $discount += $favourable['act_type_ext'];

                    $favourable_name[] = $favourable['act_name'];
                }
            }
        }

        return array('discount' => $discount, 'name' => $favourable_name);
    }

    /**
     * 取得购物车该赠送的积分数
     * @return  int     积分数
     */
    public function get_give_integral()
    {
        $sql = "SELECT SUM(c.goods_number * IF(g.give_integral > -1, g.give_integral, c.goods_price))" .
            "FROM " . table('cart') . " AS c, " .
            table('goods') . " AS g " .
            "WHERE c.goods_id = g.goods_id " .
            "AND c.session_id = '" . SESS_ID . "' " .
            "AND c.goods_id > 0 " .
            "AND c.parent_id = 0 " .
            "AND c.rec_type = 0 " .
            "AND c.is_gift = 0";

        return intval($GLOBALS['db']->getOne($sql));
    }

    /**
     * 取得某订单应该赠送的积分数
     * @param array $order 订单
     * @return  int     积分数
     */
    public function integral_to_give($order)
    {
        /* 判断是否团购 */
        if ($order['extension_code'] == 'group_buy') {
            $group_buy = group_buy_info(intval($order['extension_id']));

            return array('custom_points' => $group_buy['gift_integral'], 'rank_points' => $order['goods_amount']);
        } else {
            $sql = "SELECT SUM(og.goods_number * IF(g.give_integral > -1, g.give_integral, og.goods_price)) AS custom_points, SUM(og.goods_number * IF(g.rank_integral > -1, g.rank_integral, og.goods_price)) AS rank_points " .
                "FROM " . table('order_goods') . " AS og, " .
                table('goods') . " AS g " .
                "WHERE og.goods_id = g.goods_id " .
                "AND og.order_id = '$order[order_id]' " .
                "AND og.goods_id > 0 " .
                "AND og.parent_id = 0 " .
                "AND og.is_gift = 0 AND og.extension_code != 'package_buy'";

            return $GLOBALS['db']->getRow($sql);
        }
    }

    /**
     * 发红包：发货时发红包
     * @param int $order_id 订单号
     * @return  bool
     */
    public function send_order_bonus($order_id)
    {
        /* 取得订单应该发放的红包 */
        $bonus_list = order_bonus($order_id);

        /* 如果有红包，统计并发送 */
        if ($bonus_list) {
            /* 用户信息 */
            $sql = "SELECT u.user_id, u.user_name, u.email " .
                "FROM " . table('order_info') . " AS o, " .
                table('users') . " AS u " .
                "WHERE o.order_id = '$order_id' " .
                "AND o.user_id = u.user_id ";
            $user = $GLOBALS['db']->getRow($sql);

            /* 统计 */
            $count = 0;
            $money = '';
            foreach ($bonus_list as $bonus) {
                $count += $bonus['number'];
                $money .= price_format($bonus['type_money']) . ' [' . $bonus['number'] . '], ';

                /* 修改用户红包 */
                $sql = "INSERT INTO " . table('user_bonus') . " (bonus_type_id, user_id) " .
                    "VALUES('$bonus[type_id]', '$user[user_id]')";
                for ($i = 0; $i < $bonus['number']; $i++) {
                    if (!$GLOBALS['db']->query($sql)) {
                        return $GLOBALS['db']->errorMsg();
                    }
                }
            }

            /* 如果有红包，发送邮件 */
            if ($count > 0) {
                $tpl = get_mail_template('send_bonus');
                View::assign('user_name', $user['user_name']);
                View::assign('count', $count);
                View::assign('money', $money);
                View::assign('shop_name', config('shop.shop_name'));
                View::assign('send_date', local_date(config('shop.date_format')));
                View::assign('sent_date', local_date(config('shop.date_format')));
                $content = $GLOBALS['smarty']->fetch('str:' . $tpl['template_content']);
                send_mail($user['user_name'], $user['email'], $tpl['template_subject'], $content, $tpl['is_html']);
            }
        }

        return true;
    }

    /**
     * 返回订单发放的红包
     * @param int $order_id 订单id
     */
    public function return_order_bonus($order_id)
    {
        /* 取得订单应该发放的红包 */
        $bonus_list = order_bonus($order_id);

        /* 删除 */
        if ($bonus_list) {
            /* 取得订单信息 */
            $order = order_info($order_id);
            $user_id = $order['user_id'];

            foreach ($bonus_list as $bonus) {
                $sql = "DELETE FROM " . table('user_bonus') .
                    " WHERE bonus_type_id = '$bonus[type_id]' " .
                    "AND user_id = '$user_id' " .
                    "AND order_id = '0' LIMIT " . $bonus['number'];
                $GLOBALS['db']->query($sql);
            }
        }
    }

    /**
     * 取得订单应该发放的红包
     * @param int $order_id 订单id
     * @return  array
     */
    public function order_bonus($order_id)
    {
        /* 查询按商品发的红包 */
        $day = getdate();
        $today = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);

        $sql = "SELECT b.type_id, b.type_money, SUM(o.goods_number) AS number " .
            "FROM " . table('order_goods') . " AS o, " .
            table('goods') . " AS g, " .
            table('bonus_type') . " AS b " .
            " WHERE o.order_id = '$order_id' " .
            " AND o.is_gift = 0 " .
            " AND o.goods_id = g.goods_id " .
            " AND g.bonus_type_id = b.type_id " .
            " AND b.send_type = '" . SEND_BY_GOODS . "' " .
            " AND b.send_start_date <= '$today' " .
            " AND b.send_end_date >= '$today' " .
            " GROUP BY b.type_id ";
        $list = $GLOBALS['db']->getAll($sql);

        /* 查询定单中非赠品总金额 */
        $amount = order_amount($order_id, false);

        /* 查询订单日期 */
        $sql = "SELECT add_time " .
            " FROM " . table('order_info') .
            " WHERE order_id = '$order_id' LIMIT 1";
        $order_time = $GLOBALS['db']->getOne($sql);

        /* 查询按订单发的红包 */
        $sql = "SELECT type_id, type_money, IFNULL(FLOOR('$amount' / min_amount), 1) AS number " .
            "FROM " . table('bonus_type') .
            "WHERE send_type = '" . SEND_BY_ORDER . "' " .
            "AND send_start_date <= '$order_time' " .
            "AND send_end_date >= '$order_time' ";
        $list = array_merge($list, $GLOBALS['db']->getAll($sql));

        return $list;
    }

    /**
     * 计算购物车中的商品能享受红包支付的总额
     * @return  float   享受红包支付的总额
     */
    public function compute_discount_amount()
    {
        /* 查询优惠活动 */
        $now = gmtime();
        $user_rank = ',' . $_SESSION['user_rank'] . ',';
        $sql = "SELECT *" .
            "FROM " . table('favourable_activity') .
            " WHERE start_time <= '$now'" .
            " AND end_time >= '$now'" .
            " AND CONCAT(',', user_rank, ',') LIKE '%" . $user_rank . "%'" .
            " AND act_type " . db_create_in(array(FAT_DISCOUNT, FAT_PRICE));
        $favourable_list = $GLOBALS['db']->getAll($sql);
        if (!$favourable_list) {
            return 0;
        }

        /* 查询购物车商品 */
        $sql = "SELECT c.goods_id, c.goods_price * c.goods_number AS subtotal, g.cat_id, g.brand_id " .
            "FROM " . table('cart') . " AS c, " . table('goods') . " AS g " .
            "WHERE c.goods_id = g.goods_id " .
            "AND c.session_id = '" . SESS_ID . "' " .
            "AND c.parent_id = 0 " .
            "AND c.is_gift = 0 " .
            "AND rec_type = '" . CART_GENERAL_GOODS . "'";
        $goods_list = $GLOBALS['db']->getAll($sql);
        if (!$goods_list) {
            return 0;
        }

        /* 初始化折扣 */
        $discount = 0;
        $favourable_name = array();

        /* 循环计算每个优惠活动的折扣 */
        foreach ($favourable_list as $favourable) {
            $total_amount = 0;
            if ($favourable['act_range'] == FAR_ALL) {
                foreach ($goods_list as $goods) {
                    $total_amount += $goods['subtotal'];
                }
            } elseif ($favourable['act_range'] == FAR_CATEGORY) {
                /* 找出分类id的子分类id */
                $id_list = array();
                $raw_id_list = explode(',', $favourable['act_range_ext']);
                foreach ($raw_id_list as $id) {
                    $id_list = array_merge($id_list, array_keys(cat_list($id, 0, false)));
                }
                $ids = join(',', array_unique($id_list));

                foreach ($goods_list as $goods) {
                    if (strpos(',' . $ids . ',', ',' . $goods['cat_id'] . ',') !== false) {
                        $total_amount += $goods['subtotal'];
                    }
                }
            } elseif ($favourable['act_range'] == FAR_BRAND) {
                foreach ($goods_list as $goods) {
                    if (strpos(',' . $favourable['act_range_ext'] . ',', ',' . $goods['brand_id'] . ',') !== false) {
                        $total_amount += $goods['subtotal'];
                    }
                }
            } elseif ($favourable['act_range'] == FAR_GOODS) {
                foreach ($goods_list as $goods) {
                    if (strpos(',' . $favourable['act_range_ext'] . ',', ',' . $goods['goods_id'] . ',') !== false) {
                        $total_amount += $goods['subtotal'];
                    }
                }
            } else {
                continue;
            }
            if ($total_amount > 0 && $total_amount >= $favourable['min_amount'] && ($total_amount <= $favourable['max_amount'] || $favourable['max_amount'] == 0)) {
                if ($favourable['act_type'] == FAT_DISCOUNT) {
                    $discount += $total_amount * (1 - $favourable['act_type_ext'] / 100);
                } elseif ($favourable['act_type'] == FAT_PRICE) {
                    $discount += $favourable['act_type_ext'];
                }
            }
        }


        return $discount;
    }

    /**
     * 添加礼包到购物车
     *
     * @access  public
     * @param integer $package_id 礼包编号
     * @param integer $num 礼包数量
     * @return  boolean
     */
    public function add_package_to_cart($package_id, $num = 1)
    {
        $GLOBALS['err']->clean();

        /* 取得礼包信息 */
        $package = get_package_info($package_id);

        if (empty($package)) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['goods_not_exists'], ERR_NOT_EXISTS);

            return false;
        }

        /* 是否正在销售 */
        if ($package['is_on_sale'] == 0) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['not_on_sale'], ERR_NOT_ON_SALE);

            return false;
        }

        /* 现有库存是否还能凑齐一个礼包 */
        if (config('shop.use_storage') == '1' && judge_package_stock($package_id)) {
            $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['shortage'], 1), ERR_OUT_OF_STOCK);

            return false;
        }

        /* 检查库存 */
//    if (config('shop.use_storage') == 1 && $num > $package['goods_number'])
//    {
//        $num = $goods['goods_number'];
//        $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['shortage'], $num), ERR_OUT_OF_STOCK);
//
//        return false;
//    }

        /* 初始化要插入购物车的基本件数据 */
        $parent = array(
            'user_id' => $_SESSION['user_id'],
            'session_id' => SESS_ID,
            'goods_id' => $package_id,
            'goods_sn' => '',
            'goods_name' => addslashes($package['package_name']),
            'market_price' => $package['market_package'],
            'goods_price' => $package['package_price'],
            'goods_number' => $num,
            'goods_attr' => '',
            'goods_attr_id' => '',
            'is_real' => $package['is_real'],
            'extension_code' => 'package_buy',
            'is_gift' => 0,
            'rec_type' => CART_GENERAL_GOODS
        );

        /* 如果数量不为0，作为基本件插入 */
        if ($num > 0) {
            /* 检查该商品是否已经存在在购物车中 */
            $sql = "SELECT goods_number FROM " . table('cart') .
                " WHERE session_id = '" . SESS_ID . "' AND goods_id = '" . $package_id . "' " .
                " AND parent_id = 0 AND extension_code = 'package_buy' " .
                " AND rec_type = '" . CART_GENERAL_GOODS . "'";

            $row = $GLOBALS['db']->getRow($sql);

            if ($row) { //如果购物车已经有此物品，则更新
                $num += $row['goods_number'];
                if (config('shop.use_storage') == 0 || $num > 0) {
                    $sql = "UPDATE " . table('cart') . " SET goods_number = '" . $num . "'" .
                        " WHERE session_id = '" . SESS_ID . "' AND goods_id = '$package_id' " .
                        " AND parent_id = 0 AND extension_code = 'package_buy' " .
                        " AND rec_type = '" . CART_GENERAL_GOODS . "'";
                    $GLOBALS['db']->query($sql);
                } else {
                    $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['shortage'], $num), ERR_OUT_OF_STOCK);
                    return false;
                }
            } else { //购物车没有此物品，则插入
                $GLOBALS['db']->autoExecute(table('cart'), $parent, 'INSERT');
            }
        }

        /* 把赠品删除 */
        $sql = "DELETE FROM " . table('cart') . " WHERE session_id = '" . SESS_ID . "' AND is_gift <> 0";
        $GLOBALS['db']->query($sql);

        return true;
    }

    /**
     * 得到新发货单号
     * @return  string
     */
    public function get_delivery_sn()
    {
        /* 选择一个随机的方案 */
        mt_srand((double)microtime() * 1000000);

        return date('YmdHi') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    }

    /**
     * 检查礼包内商品的库存
     * @return  boolen
     */
    public function judge_package_stock($package_id, $package_num = 1)
    {
        $sql = "SELECT goods_id, product_id, goods_number
            FROM " . table('package_goods') . "
            WHERE package_id = '" . $package_id . "'";
        $row = $GLOBALS['db']->getAll($sql);
        if (empty($row)) {
            return true;
        }

        /* 分离货品与商品 */
        $goods = array('product_ids' => '', 'goods_ids' => '');
        foreach ($row as $value) {
            if ($value['product_id'] > 0) {
                $goods['product_ids'] .= ',' . $value['product_id'];
                continue;
            }

            $goods['goods_ids'] .= ',' . $value['goods_id'];
        }

        /* 检查货品库存 */
        if ($goods['product_ids'] != '') {
            $sql = "SELECT p.product_id
                FROM " . table('products') . " AS p, " . table('package_goods') . " AS pg
                WHERE pg.product_id = p.product_id
                AND pg.package_id = '$package_id'
                AND pg.goods_number * $package_num > p.product_number
                AND p.product_id IN (" . trim($goods['product_ids'], ',') . ")";
            $row = $GLOBALS['db']->getAll($sql);

            if (!empty($row)) {
                return true;
            }
        }

        /* 检查商品库存 */
        if ($goods['goods_ids'] != '') {
            $sql = "SELECT g.goods_id
                FROM " . table('goods') . "AS g, " . table('package_goods') . " AS pg
                WHERE pg.goods_id = g.goods_id
                AND pg.goods_number * $package_num > g.goods_number
                AND pg.package_id = '" . $package_id . "'
                AND pg.goods_id IN (" . trim($goods['goods_ids'], ',') . ")";
            $row = $GLOBALS['db']->getAll($sql);

            if (!empty($row)) {
                return true;
            }
        }

        return false;
    }
}
