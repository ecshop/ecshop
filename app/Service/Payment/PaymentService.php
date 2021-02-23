<?php

namespace App\Service;

/**
 * 支付接口函数库
 */
class PaymentService
{
    /**
     * 取得返回信息地址
     * @param string $code 支付方式代码
     */
    public function return_url($code)
    {
        return $GLOBALS['ecs']->url() . 'respond.php?code=' . $code;
    }

    /**
     *  取得某支付方式信息
     * @param string $code 支付方式代码
     */
    public function get_payment($code)
    {
        $sql = 'SELECT * FROM ' . table('payment') .
            " WHERE pay_code = '$code' AND enabled = '1'";
        $payment = $GLOBALS['db']->getRow($sql);

        if ($payment) {
            $config_list = unserialize($payment['pay_config']);

            foreach ($config_list as $config) {
                $payment[$config['name']] = $config['value'];
            }
        }

        return $payment;
    }

    /**
     * 取得已安装的支付方式列表
     * @return  array   已安装的配送方式列表
     */
    public function payment_list()
    {
        $sql = 'SELECT pay_id, pay_name ' .
            'FROM ' . table('payment') .
            ' WHERE enabled = 1';

        return $GLOBALS['db']->getAll($sql);
    }

    /**
     * 取得支付方式信息
     * @param int $pay_id 支付方式id
     * @return  array   支付方式信息
     */
    public function payment_info($pay_id)
    {
        $sql = 'SELECT * FROM ' . table('payment') .
            " WHERE pay_id = '$pay_id' AND enabled = 1";

        return $GLOBALS['db']->getRow($sql);
    }

    /**
     * 获得订单需要支付的支付费用
     *
     * @access  public
     * @param integer $payment_id
     * @param float $order_amount
     * @param mix $cod_fee
     * @return  float
     */
    public function pay_fee($payment_id, $order_amount, $cod_fee = null)
    {
        $pay_fee = 0;
        $payment = payment_info($payment_id);
        $rate = ($payment['is_cod'] && !is_null($cod_fee)) ? $cod_fee : $payment['pay_fee'];

        if (strpos($rate, '%') !== false) {
            /* 支付费用是一个比例 */
            $val = floatval($rate) / 100;
            $pay_fee = $val > 0 ? $order_amount * $val / (1 - $val) : 0;
        } else {
            $pay_fee = floatval($rate);
        }

        return round($pay_fee, 2);
    }

    /**
     * 取得可用的支付方式列表
     * @param bool $support_cod 配送方式是否支持货到付款
     * @param int $cod_fee 货到付款手续费（当配送方式支持货到付款时才传此参数）
     * @param int $is_online 是否支持在线支付
     * @return  array   配送方式数组
     */
    public function available_payment_list($support_cod, $cod_fee = 0, $is_online = false)
    {
        $sql = 'SELECT pay_id, pay_code, pay_name, pay_fee, pay_desc, pay_config, is_cod' .
            ' FROM ' . table('payment') .
            ' WHERE enabled = 1 ';
        if (!$support_cod) {
            $sql .= 'AND is_cod = 0 '; // 如果不支持货到付款
        }
        if ($is_online) {
            $sql .= "AND is_online = '1' ";
        }
        $sql .= 'ORDER BY pay_order'; // 排序
        $res = $GLOBALS['db']->query($sql);

        $pay_list = array();
        while ($row = $GLOBALS['db']->fetchRow($res)) {
            if ($row['is_cod'] == '1') {
                $row['pay_fee'] = $cod_fee;
            }

            $row['format_pay_fee'] = strpos($row['pay_fee'], '%') !== false ? $row['pay_fee'] :
                price_format($row['pay_fee'], false);
            $modules[] = $row;
        }

        if (isset($modules)) {
            return $modules;
        }
    }

}
