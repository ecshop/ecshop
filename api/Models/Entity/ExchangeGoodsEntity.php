<?php

namespace App\Models\Entity;

/**
 * Class ExchangeGoodsEntity
 * @package App\Models\Entity
 */
class ExchangeGoodsEntity
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
    private int $exchange_integral;

    /**
     * @var int 
     */
    private int $is_exchange;

    /**
     * @var int 
     */
    private int $is_hot;

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
    public function getExchangeIntegral(): int
    {
        return $this->exchange_integral;
    }

    /**
     * @param int $value
     */
    public function setExchangeIntegral(int $value)
    {
        $this->exchange_integral = $value;
    }

    /**
     * @return int
     */
    public function getIsExchange(): int
    {
        return $this->is_exchange;
    }

    /**
     * @param int $value
     */
    public function setIsExchange(int $value)
    {
        $this->is_exchange = $value;
    }

    /**
     * @return int
     */
    public function getIsHot(): int
    {
        return $this->is_hot;
    }

    /**
     * @param int $value
     */
    public function setIsHot(int $value)
    {
        $this->is_hot = $value;
    }

}
