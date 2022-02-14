<?php

namespace App\Models\Entity;

/**
 * Class ProductsEntity
 * @package App\Models\Entity
 */
class ProductsEntity
{
    /**
     * @var int 
     */
    private int $product_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var string 
     */
    private string $goods_attr;

    /**
     * @var string 
     */
    private string $product_sn;

    /**
     * @var int 
     */
    private int $product_number;

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
     * @return int
     */
    public function getProductNumber(): int
    {
        return $this->product_number;
    }

    /**
     * @param int $value
     */
    public function setProductNumber(int $value)
    {
        $this->product_number = $value;
    }

}
