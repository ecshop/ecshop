<?php

namespace App\Models\Entity;

/**
 * Class GoodsAttrEntity
 * @package App\Models\Entity
 */
class GoodsAttrEntity
{
    /**
     * @var int 
     */
    private int $goods_attr_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $attr_id;

    /**
     * @var string 
     */
    private string $attr_value;

    /**
     * @var string 
     */
    private string $attr_price;

    /**
     * @return int
     */
    public function getGoodsAttrId(): int
    {
        return $this->goods_attr_id;
    }

    /**
     * @param int $value
     */
    public function setGoodsAttrId(int $value)
    {
        $this->goods_attr_id = $value;
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
    public function getAttrId(): int
    {
        return $this->attr_id;
    }

    /**
     * @param int $value
     */
    public function setAttrId(int $value)
    {
        $this->attr_id = $value;
    }

    /**
     * @return string
     */
    public function getAttrValue(): string
    {
        return $this->attr_value;
    }

    /**
     * @param string $value
     */
    public function setAttrValue(string $value)
    {
        $this->attr_value = $value;
    }

    /**
     * @return string
     */
    public function getAttrPrice(): string
    {
        return $this->attr_price;
    }

    /**
     * @param string $value
     */
    public function setAttrPrice(string $value)
    {
        $this->attr_price = $value;
    }

}
