<?php

namespace App\Models\Entity;

/**
 * Class MemberPriceEntity
 * @package App\Models\Entity
 */
class MemberPriceEntity
{
    /**
     * @var int 
     */
    private int $price_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $user_rank;

    /**
     * @var float 
     */
    private float $user_price;

    /**
     * @return int
     */
    public function getPriceId(): int
    {
        return $this->price_id;
    }

    /**
     * @param int $value
     */
    public function setPriceId(int $value)
    {
        $this->price_id = $value;
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
    public function getUserRank(): int
    {
        return $this->user_rank;
    }

    /**
     * @param int $value
     */
    public function setUserRank(int $value)
    {
        $this->user_rank = $value;
    }

    /**
     * @return float
     */
    public function getUserPrice(): float
    {
        return $this->user_price;
    }

    /**
     * @param float $value
     */
    public function setUserPrice(float $value)
    {
        $this->user_price = $value;
    }

}
