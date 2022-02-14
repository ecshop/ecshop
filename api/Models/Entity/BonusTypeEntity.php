<?php

namespace App\Models\Entity;

/**
 * Class BonusTypeEntity
 * @package App\Models\Entity
 */
class BonusTypeEntity
{
    /**
     * @var int 
     */
    private int $type_id;

    /**
     * @var string 
     */
    private string $type_name;

    /**
     * @var float 
     */
    private float $type_money;

    /**
     * @var int 
     */
    private int $send_type;

    /**
     * @var float 
     */
    private float $min_amount;

    /**
     * @var float 
     */
    private float $max_amount;

    /**
     * @var int 
     */
    private int $send_start_date;

    /**
     * @var int 
     */
    private int $send_end_date;

    /**
     * @var int 
     */
    private int $use_start_date;

    /**
     * @var int 
     */
    private int $use_end_date;

    /**
     * @var float 
     */
    private float $min_goods_amount;

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * @param int $value
     */
    public function setTypeId(int $value)
    {
        $this->type_id = $value;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->type_name;
    }

    /**
     * @param string $value
     */
    public function setTypeName(string $value)
    {
        $this->type_name = $value;
    }

    /**
     * @return float
     */
    public function getTypeMoney(): float
    {
        return $this->type_money;
    }

    /**
     * @param float $value
     */
    public function setTypeMoney(float $value)
    {
        $this->type_money = $value;
    }

    /**
     * @return int
     */
    public function getSendType(): int
    {
        return $this->send_type;
    }

    /**
     * @param int $value
     */
    public function setSendType(int $value)
    {
        $this->send_type = $value;
    }

    /**
     * @return float
     */
    public function getMinAmount(): float
    {
        return $this->min_amount;
    }

    /**
     * @param float $value
     */
    public function setMinAmount(float $value)
    {
        $this->min_amount = $value;
    }

    /**
     * @return float
     */
    public function getMaxAmount(): float
    {
        return $this->max_amount;
    }

    /**
     * @param float $value
     */
    public function setMaxAmount(float $value)
    {
        $this->max_amount = $value;
    }

    /**
     * @return int
     */
    public function getSendStartDate(): int
    {
        return $this->send_start_date;
    }

    /**
     * @param int $value
     */
    public function setSendStartDate(int $value)
    {
        $this->send_start_date = $value;
    }

    /**
     * @return int
     */
    public function getSendEndDate(): int
    {
        return $this->send_end_date;
    }

    /**
     * @param int $value
     */
    public function setSendEndDate(int $value)
    {
        $this->send_end_date = $value;
    }

    /**
     * @return int
     */
    public function getUseStartDate(): int
    {
        return $this->use_start_date;
    }

    /**
     * @param int $value
     */
    public function setUseStartDate(int $value)
    {
        $this->use_start_date = $value;
    }

    /**
     * @return int
     */
    public function getUseEndDate(): int
    {
        return $this->use_end_date;
    }

    /**
     * @param int $value
     */
    public function setUseEndDate(int $value)
    {
        $this->use_end_date = $value;
    }

    /**
     * @return float
     */
    public function getMinGoodsAmount(): float
    {
        return $this->min_goods_amount;
    }

    /**
     * @param float $value
     */
    public function setMinGoodsAmount(float $value)
    {
        $this->min_goods_amount = $value;
    }

}
