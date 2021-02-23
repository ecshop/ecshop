<?php

namespace App\Service\Goods;

/**
 * Class GoodsService
 * @package App\Service\Goods
 */
class GoodsService
{

    /**
     * 获得指定的商品属性
     *
     * @access      public
     * @param array $arr 规格、属性ID数组
     * @param type $type 设置返回结果类型：pice，显示价格，默认；no，不显示价格
     *
     * @return      string
     */
    public function get_goods_attr_info($arr, $type = 'pice')
    {
        $attr = '';

        if (!empty($arr)) {
            $fmt = "%s:%s[%s] \n";

            $sql = "SELECT a.attr_name, ga.attr_value, ga.attr_price " .
                "FROM " . table('goods_attr') . " AS ga, " .
                table('attribute') . " AS a " .
                "WHERE " . db_create_in($arr, 'ga.goods_attr_id') . " AND a.attr_id = ga.attr_id";
            $res = $GLOBALS['db']->query($sql);

            while ($row = $GLOBALS['db']->fetchRow($res)) {
                $attr_price = round(floatval($row['attr_price']), 2);
                $attr .= sprintf($fmt, $row['attr_name'], $row['attr_value'], $attr_price);
            }

            $attr = str_replace('[0]', '', $attr);
        }

        return $attr;
    }


    /**
     *  通过订单ID取得订单商品名称
     * @param string $order_id 订单ID
     */
    public function get_goods_name_by_id($order_id)
    {
        $sql = 'SELECT goods_name FROM ' . table('order_goods') . " WHERE order_id = '$order_id'";
        $goods_name = $GLOBALS['db']->getCol($sql);
        return implode(',', $goods_name);
    }
}
