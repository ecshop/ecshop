<?php

namespace App\Service\Card;

/**
 * Class CardService
 * @package App\Service\Card
 */
class CardService
{
    /**
     * 取得贺卡列表
     * @return  array   贺卡列表
     */
    public function card_list()
    {
        $sql = "SELECT * FROM " . table('card');
        $res = $GLOBALS['db']->query($sql);

        $list = array();
        while ($row = $GLOBALS['db']->fetchRow($res)) {
            $row['format_card_fee'] = price_format($row['card_fee'], false);
            $row['format_free_money'] = price_format($row['free_money'], false);
            $list[] = $row;
        }

        return $list;
    }

    /**
     * 取得贺卡信息
     * @param int $card_id 贺卡id
     * @return  array   贺卡信息
     */
    public function card_info($card_id)
    {
        $sql = "SELECT * FROM " . table('card') .
            " WHERE card_id = '$card_id'";

        return $GLOBALS['db']->getRow($sql);
    }

    /**
     * 根据订单中商品总额获得需要支付的贺卡费用
     *
     * @access  public
     * @param integer $card_id
     * @param float $goods_amount
     * @return  float
     */
    public function card_fee($card_id, $goods_amount)
    {
        $card = card_info($card_id);

        return ($card['free_money'] <= $goods_amount && $card['free_money'] > 0) ? 0 : $card['card_fee'];
    }

}
