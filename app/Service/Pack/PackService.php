<?php

namespace App\Service\Pack;

/**
 * Class PackService
 * @package App\Service\Pack
 */
class PackService
{
    /**
     * 取得包装列表
     * @return  array   包装列表
     */
    public function pack_list()
    {
        $sql = 'SELECT * FROM ' . table('pack');
        $res = $GLOBALS['db']->query($sql);

        $list = array();
        while ($row = $GLOBALS['db']->fetchRow($res)) {
            $row['format_pack_fee'] = price_format($row['pack_fee'], false);
            $row['format_free_money'] = price_format($row['free_money'], false);
            $list[] = $row;
        }

        return $list;
    }

    /**
     * 取得包装信息
     * @param int $pack_id 包装id
     * @return  array   包装信息
     */
    public function pack_info($pack_id)
    {
        $sql = "SELECT * FROM " . table('pack') .
            " WHERE pack_id = '$pack_id'";

        return $GLOBALS['db']->getRow($sql);
    }

    /**
     * 根据订单中的商品总额来获得包装的费用
     *
     * @access  public
     * @param integer $pack_id
     * @param float $goods_amount
     * @return  float
     */
    public function pack_fee($pack_id, $goods_amount)
    {
        $pack = pack_info($pack_id);

        $val = (floatval($pack['free_money']) <= $goods_amount && $pack['free_money'] > 0) ? 0 : floatval($pack['pack_fee']);

        return $val;
    }

}
