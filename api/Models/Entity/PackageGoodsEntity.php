<?php

namespace App\Models\Entity;

/**
 * Class PackageGoodsEntity
 * @package App\Models\Entity
 */
class PackageGoodsEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $package_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $product_id;

    /**
     * @var int 
     */
    private int $goods_number;

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
    public function getPackageId(): int
    {
        return $this->package_id;
    }

    /**
     * @param int $value
     */
    public function setPackageId(int $value)
    {
        $this->package_id = $value;
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
