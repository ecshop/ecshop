<?php

namespace App\Models\Entity;

/**
 * Class OrderGoodsEntity
 * @package App\Models\Entity
 */
class OrderGoodsEntity
{
    /**
     * @var int 
     */
    private int $rec_id;

    /**
     * @var int 
     */
    private int $order_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var string 
     */
    private string $goods_name;

    /**
     * @var string 
     */
    private string $goods_sn;

    /**
     * @var int 
     */
    private int $product_id;

    /**
     * @var int 
     */
    private int $goods_number;

    /**
     * @var float 
     */
    private float $market_price;

    /**
     * @var float 
     */
    private float $goods_price;

    /**
     * @var string 
     */
    private string $goods_attr;

    /**
     * @var int 
     */
    private int $send_number;

    /**
     * @var int 
     */
    private int $is_real;

    /**
     * @var string 
     */
    private string $extension_code;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var int 
     */
    private int $is_gift;

    /**
     * @var string 
     */
    private string $goods_attr_id;

    /**
     * @return int
     */
    public function getRecId(): int
    {
        return $this->rec_id;
    }

    /**
     * @param int $value
     */
    public function setRecId(int $value)
    {
        $this->rec_id = $value;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $value
     */
    public function setOrderId(int $value)
    {
        $this->order_id = $value;
    }

    /**
     * @return int
     */
    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    /**
     * @param int $value
     */
    public function setGoodsId(int $value)
    {
        $this->goods_id = $value;
    }

    /**
     * @return string
     */
    public function getGoodsName(): string
    {
        return $this->goods_name;
    }

    /**
     * @param string $value
     */
    public function setGoodsName(string $value)
    {
        $this->goods_name = $value;
    }

    /**
     * @return string
     */
    public function getGoodsSn(): string
    {
        return $this->goods_sn;
    }

    /**
     * @param string $value
     */
    public function setGoodsSn(string $value)
    {
        $this->goods_sn = $value;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @param int $value
     */
    public function setProductId(int $value)
    {
        $this->product_id = $value;
    }

    /**
     * @return int
     */
    public function getGoodsNumber(): int
    {
        return $this->goods_number;
    }

    /**
     * @param int $value
     */
    public function setGoodsNumber(int $value)
    {
        $this->goods_number = $value;
    }

    /**
     * @return float
     */
    public function getMarketPrice(): float
    {
        return $this->market_price;
    }

    /**
     * @param float $value
     */
    public function setMarketPrice(float $value)
    {
        $this->market_price = $value;
    }

    /**
     * @return float
     */
    public function getGoodsPrice(): float
    {
        return $this->goods_price;
    }

    /**
     * @param float $value
     */
    public function setGoodsPrice(float $value)
    {
        $this->goods_price = $value;
    }

    /**
     * @return string
     */
    public function getGoodsAttr(): string
    {
        return $this->goods_attr;
    }

    /**
     * @param string $value
     */
    public function setGoodsAttr(string $value)
    {
        $this->goods_attr = $value;
    }

    /**
     * @return int
     */
    public function getSendNumber(): int
    {
        return $this->send_number;
    }

    /**
     * @param int $value
     */
    public function setSendNumber(int $value)
    {
        $this->send_number = $value;
    }

    /**
     * @return int
     */
    public function getIsReal(): int
    {
        return $this->is_real;
    }

    /**
     * @param int $value
     */
    public function setIsReal(int $value)
    {
        $this->is_real = $value;
    }

    /**
     * @return string
     */
    public function getExtensionCode(): string
    {
        return $this->extension_code;
    }

    /**
     * @param string $value
     */
    public function setExtensionCode(string $value)
    {
        $this->extension_code = $value;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @param int $value
     */
    public function setParentId(int $value)
    {
        $this->parent_id = $value;
    }

    /**
     * @return int
     */
    public function getIsGift(): int
    {
        return $this->is_gift;
    }

    /**
     * @param int $value
     */
    public function setIsGift(int $value)
    {
        $this->is_gift = $value;
    }

    /**
     * @return string
     */
    public function getGoodsAttrId(): string
    {
        return $this->goods_attr_id;
    }

    /**
     * @param string $value
     */
    public function setGoodsAttrId(string $value)
    {
        $this->goods_attr_id = $value;
    }

}
