<?php

namespace App\Models\Entity;

/**
 * Class FavourableActivityEntity
 * @package App\Models\Entity
 */
class FavourableActivityEntity
{
    /**
     * @var int 
     */
    private int $act_id;

    /**
     * @var string 
     */
    private string $act_name;

    /**
     * @var int 
     */
    private int $start_time;

    /**
     * @var int 
     */
    private int $end_time;

    /**
     * @var string 
     */
    private string $user_rank;

    /**
     * @var int 
     */
    private int $act_range;

    /**
     * @var string 
     */
    private string $act_range_ext;

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
    private int $act_type;

    /**
     * @var float 
     */
    private float $act_type_ext;

    /**
     * @var string 
     */
    private string $gift;

    /**
     * @var int 
     */
    private int $sort_order;

    /**
     * @return int
     */
    public function getActId(): int
    {
        return $this->act_id;
    }

    /**
     * @param int $value
     */
    public function setActId(int $value)
    {
        $this->act_id = $value;
    }

    /**
     * @return string
     */
    public function getActName(): string
    {
        return $this->act_name;
    }

    /**
     * @param string $value
     */
    public function setActName(string $value)
    {
        $this->act_name = $value;
    }

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->start_time;
    }

    /**
     * @param int $value
     */
    public function setStartTime(int $value)
    {
        $this->start_time = $value;
    }

    /**
     * @return int
     */
    public function getEndTime(): int
    {
        return $this->end_time;
    }

    /**
     * @param int $value
     */
    public function setEndTime(int $value)
    {
        $this->end_time = $value;
    }

    /**
     * @return string
     */
    public function getUserRank(): string
    {
        return $this->user_rank;
    }

    /**
     * @param string $value
     */
    public function setUserRank(string $value)
    {
        $this->user_rank = $value;
    }

    /**
     * @return int
     */
    public function getActRange(): int
    {
        return $this->act_range;
    }

    /**
     * @param int $value
     */
    public function setActRange(int $value)
    {
        $this->act_range = $value;
    }

    /**
     * @return string
     */
    public function getActRangeExt(): string
    {
        return $this->act_range_ext;
    }

    /**
     * @param string $value
     */
    public function setActRangeExt(string $value)
    {
        $this->act_range_ext = $value;
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
    public function getActType(): int
    {
        return $this->act_type;
    }

    /**
     * @param int $value
     */
    public function setActType(int $value)
    {
        $this->act_type = $value;
    }

    /**
     * @return float
     */
    public function getActTypeExt(): float
    {
        return $this->act_type_ext;
    }

    /**
     * @param float $value
     */
    public function setActTypeExt(float $value)
    {
        $this->act_type_ext = $value;
    }

    /**
     * @return string
     */
    public function getGift(): string
    {
        return $this->gift;
    }

    /**
     * @param string $value
     */
    public function setGift(string $value)
    {
        $this->gift = $value;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    /**
     * @param int $value
     */
    public function setSortOrder(int $value)
    {
        $this->sort_order = $value;
    }

}
