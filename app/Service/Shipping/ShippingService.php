<?php

namespace App\Service\Shipping;

/**
 * Class ShippingService
 * @package App\Service\Shipping
 */
class ShippingService
{
    /**
     * 取得已安装的配送方式
     * @return  array   已安装的配送方式
     */
    public function shipping_list()
    {
        $sql = 'SELECT shipping_id, shipping_name ' .
            'FROM ' . table('shipping') .
            ' WHERE enabled = 1';

        return $GLOBALS['db']->getAll($sql);
    }

    /**
     * 取得配送方式信息
     * @param int $shipping_id 配送方式id
     * @return  array   配送方式信息
     */
    public function shipping_info($shipping_id)
    {
        $sql = 'SELECT * FROM ' . table('shipping') .
            " WHERE shipping_id = '$shipping_id' " .
            'AND enabled = 1';

        return $GLOBALS['db']->getRow($sql);
    }

    /**
     * 取得可用的配送方式列表
     * @param array $region_id_list 收货人地区id数组（包括国家、省、市、区）
     * @return  array   配送方式数组
     */
    public function available_shipping_list($region_id_list)
    {
        $sql = 'SELECT s.shipping_id, s.shipping_code, s.shipping_name, ' .
            's.shipping_desc, s.insure, s.support_cod, a.configure ' .
            'FROM ' . table('shipping') . ' AS s, ' .
            table('shipping_area') . ' AS a, ' .
            table('area_region') . ' AS r ' .
            'WHERE r.region_id ' . db_create_in($region_id_list) .
            ' AND r.shipping_area_id = a.shipping_area_id AND a.shipping_id = s.shipping_id AND s.enabled = 1 ORDER BY s.shipping_order';

        return $GLOBALS['db']->getAll($sql);
    }

    /**
     * 取得某配送方式对应于某收货地址的区域信息
     * @param int $shipping_id 配送方式id
     * @param array $region_id_list 收货人地区id数组
     * @return  array   配送区域信息（config 对应着反序列化的 configure）
     */
    public function shipping_area_info($shipping_id, $region_id_list)
    {
        $sql = 'SELECT s.shipping_code, s.shipping_name, ' .
            's.shipping_desc, s.insure, s.support_cod, a.configure ' .
            'FROM ' . table('shipping') . ' AS s, ' .
            table('shipping_area') . ' AS a, ' .
            table('area_region') . ' AS r ' .
            "WHERE s.shipping_id = '$shipping_id' " .
            'AND r.region_id ' . db_create_in($region_id_list) .
            ' AND r.shipping_area_id = a.shipping_area_id AND a.shipping_id = s.shipping_id AND s.enabled = 1';
        $row = $GLOBALS['db']->getRow($sql);

        if (!empty($row)) {
            $shipping_config = unserialize_config($row['configure']);
            if (isset($shipping_config['pay_fee'])) {
                if (strpos($shipping_config['pay_fee'], '%') !== false) {
                    $row['pay_fee'] = floatval($shipping_config['pay_fee']) . '%';
                } else {
                    $row['pay_fee'] = floatval($shipping_config['pay_fee']);
                }
            } else {
                $row['pay_fee'] = 0.00;
            }
        }

        return $row;
    }

    /**
     * 计算运费
     * @param string $shipping_code 配送方式代码
     * @param mix $shipping_config 配送方式配置信息
     * @param float $goods_weight 商品重量
     * @param float $goods_amount 商品金额
     * @param float $goods_number 商品数量
     * @return  float   运费
     */
    public function shipping_fee($shipping_code, $shipping_config, $goods_weight, $goods_amount, $goods_number = '')
    {
        if (!is_array($shipping_config)) {
            $shipping_config = unserialize($shipping_config);
        }

        $filename = ROOT_PATH . 'includes/modules/shipping/' . $shipping_code . '.php';
        if (file_exists($filename)) {
            include_once($filename);

            $obj = new $shipping_code($shipping_config);

            return $obj->calculate($goods_weight, $goods_amount, $goods_number);
        } else {
            return 0;
        }
    }

    /**
     * 获取指定配送的保价费用
     *
     * @access  public
     * @param string $shipping_code 配送方式的code
     * @param float $goods_amount 保价金额
     * @param mix $insure 保价比例
     * @return  float
     */
    public function shipping_insure_fee($shipping_code, $goods_amount, $insure)
    {
        if (strpos($insure, '%') === false) {
            /* 如果保价费用不是百分比则直接返回该数值 */
            return floatval($insure);
        } else {
            $path = ROOT_PATH . 'includes/modules/shipping/' . $shipping_code . '.php';

            if (file_exists($path)) {
                include_once($path);

                $shipping = new $shipping_code;
                $insure = floatval($insure) / 100;

                if (method_exists($shipping, 'calculate_insure')) {
                    return $shipping->calculate_insure($goods_amount, $insure);
                } else {
                    return ceil($goods_amount * $insure);
                }
            } else {
                return false;
            }
        }
    }

}
