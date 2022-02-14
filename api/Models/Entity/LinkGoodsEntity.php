<?php

namespace App\Models\Entity;

/**
 * Class LinkGoodsEntity
 * @package App\Models\Entity
 */
class LinkGoodsEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $link_goods_id;

    /**
     * @var int 
     */
    private int $is_double;

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
    public function getLinkGoodsId(): int
    {
        return $this->link_goods_id;
    }

    /**
     * @param int $value
     */
    public function setLinkGoodsId(int $value)
    {
        $this->link_goods_id = $value;
    }

    /**
     * @return int
     */
    public function getIsDouble(): int
    {
        return $this->is_double;
    }

    /**
     * @param int $value
     */
    public function setIsDouble(int $value)
    {
        $this->is_double = $value;
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
