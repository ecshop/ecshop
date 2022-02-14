<?php

namespace App\Models\Entity;

/**
 * Class AccountLogEntity
 * @package App\Models\Entity
 */
class AccountLogEntity
{
    /**
     * @var int 
     */
    private int $log_id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var float 
     */
    private float $user_money;

    /**
     * @var float 
     */
    private float $frozen_money;

    /**
     * @var int 
     */
    private int $rank_points;

    /**
     * @var int 
     */
    private int $pay_points;

    /**
     * @var int 
     */
    private int $change_time;

    /**
     * @var string 
     */
    private string $change_desc;

    /**
     * @var int 
     */
    private int $change_type;

    /**
     * @return int
     */
    public function getLogId(): int
    {
        return $this->log_id;
    }

    /**
     * @param int $value
     */
    public function setLogId(int $value)
    {
        $this->log_id = $value;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $value
     */
    public function setUserId(int $value)
    {
        $this->user_id = $value;
    }

    /**
     * @return float
     */
    public function getUserMoney(): float
    {
        return $this->user_money;
    }

    /**
     * @param float $value
     */
    public function setUserMoney(float $value)
    {
        $this->user_money = $value;
    }

    /**
     * @return float
     */
    public function getFrozenMoney(): float
    {
        return $this->frozen_money;
    }

    /**
     * @param float $value
     */
    public function setFrozenMoney(float $value)
    {
        $this->frozen_money = $value;
    }

    /**
     * @return int
     */
    public function getRankPoints(): int
    {
        return $this->rank_points;
    }

    /**
     * @param int $value
     */
    public function setRankPoints(int $value)
    {
        $this->rank_points = $value;
    }

    /**
     * @return int
     */
    public function getPayPoints(): int
    {
        return $this->pay_points;
    }

    /**
     * @param int $value
     */
    public function setPayPoints(int $value)
    {
        $this->pay_points = $value;
    }

    /**
     * @return int
     */
    public function getChangeTime(): int
    {
        return $this->change_time;
    }

    /**
     * @param int $value
     */
    public function setChangeTime(int $value)
    {
        $this->change_time = $value;
    }

    /**
     * @return string
     */
    public function getChangeDesc(): string
    {
        return $this->change_desc;
    }

    /**
     * @param string $value
     */
    public function setChangeDesc(string $value)
    {
        $this->change_desc = $value;
    }

    /**
     * @return int
     */
    public function getChangeType(): int
    {
        return $this->change_type;
    }

    /**
     * @param int $value
     */
    public function setChangeType(int $value)
    {
        $this->change_type = $value;
    }

}
