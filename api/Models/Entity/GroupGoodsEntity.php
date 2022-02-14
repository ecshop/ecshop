<?php

namespace App\Models\Entity;

/**
 * Class GroupGoodsEntity
 * @package App\Models\Entity
 */
class GroupGoodsEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var float 
     */
    private float $goods_price;

    /**
     * @var int 
     */
    private int $admin_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value)
    {
        $this->id = $value;
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
    public function getAdminId(): int
    {
        return $this->admin_id;
    }

    /**
     * @param int $value
     */
    public function setAdminId(int $value)
    {
        $this->admin_id = $value;
    }

}
