<?php

namespace App\Models\Entity;

/**
 * Class CartEntity
 * @package App\Models\Entity
 */
class CartEntity
{
    /**
     * @var int 
     */
    private int $rec_id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $session_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var string 
     */
    private string $goods_sn;

    /**
     * @var int 
     */
    private int $product_id;

    /**
     * @var string 
     */
    private string $goods_name;

    /**
     * @var float 
     */
    private float $market_price;

    /**
     * @var float 
     */
    private float $goods_price;

    /**
     * @var int 
     */
    private int $goods_number;

    /**
     * @var string 
     */
    private string $goods_attr;

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
    private int $rec_type;

    /**
     * @var int 
     */
    private int $is_gift;

    /**
     * @var int 
     */
    private int $is_shipping;

    /**
     * @var int 
     */
    private int $can_handsel;

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
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $value
     */
    public function setUserId(int $value)
    {
        $this->user_id = $value;
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->session_id;
    }

    /**
     * @param string $value
     */
    public function setSessionId(string $value)
    {
        $this->session_id = $value;
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
    public function getRecType(): int
    {
        return $this->rec_type;
    }

    /**
     * @param int $value
     */
    public function setRecType(int $value)
    {
        $this->rec_type = $value;
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
     * @return int
     */
    public function getIsShipping(): int
    {
        return $this->is_shipping;
    }

    /**
     * @param int $value
     */
    public function setIsShipping(int $value)
    {
        $this->is_shipping = $value;
    }

    /**
     * @return int
     */
    public function getCanHandsel(): int
    {
        return $this->can_handsel;
    }

    /**
     * @param int $value
     */
    public function setCanHandsel(int $value)
    {
        $this->can_handsel = $value;
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
