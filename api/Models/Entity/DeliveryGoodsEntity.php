<?php

namespace App\Models\Entity;

/**
 * Class DeliveryGoodsEntity
 * @package App\Models\Entity
 */
class DeliveryGoodsEntity
{
    /**
     * @var int 
     */
    private int $rec_id;

    /**
     * @var int 
     */
    private int $delivery_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $product_id;

    /**
     * @var string 
     */
    private string $product_sn;

    /**
     * @var string 
     */
    private string $goods_name;

    /**
     * @var string 
     */
    private string $brand_name;

    /**
     * @var string 
     */
    private string $goods_sn;

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
    private int $send_number;

    /**
     * @var string 
     */
    private string $goods_attr;

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
    public function getDeliveryId(): int
    {
        return $this->delivery_id;
    }

    /**
     * @param int $value
     */
    public function setDeliveryId(int $value)
    {
        $this->delivery_id = $value;
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
    public function getProductSn(): string
    {
        return $this->product_sn;
    }

    /**
     * @param string $value
     */
    public function setProductSn(string $value)
    {
        $this->product_sn = $value;
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
    public function getBrandName(): string
    {
        return $this->brand_name;
    }

    /**
     * @param string $value
     */
    public function setBrandName(string $value)
    {
        $this->brand_name = $value;
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

}
