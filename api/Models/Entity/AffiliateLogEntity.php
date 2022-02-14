<?php

namespace App\Models\Entity;

/**
 * Class AffiliateLogEntity
 * @package App\Models\Entity
 */
class AffiliateLogEntity
{
    /**
     * @var int 
     */
    private int $log_id;

    /**
     * @var int 
     */
    private int $order_id;

    /**
     * @var int 
     */
    private int $time;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $user_name;

    /**
     * @var float 
     */
    private float $money;

    /**
     * @var int 
     */
    private int $point;

    /**
     * @var int 
     */
    private int $separate_type;

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
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $value
     */
    public function setOrderId(int $value)
    {
        $this->order_id = $value;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $value
     */
    public function setTime(int $value)
    {
        $this->time = $value;
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
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $value
     */
    public function setUserName(string $value)
    {
        $this->user_name = $value;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @param float $value
     */
    public function setMoney(float $value)
    {
        $this->money = $value;
    }

    /**
     * @return int
     */
    public function getPoint(): int
    {
        return $this->point;
    }

    /**
     * @param int $value
     */
    public function setPoint(int $value)
    {
        $this->point = $value;
    }

    /**
     * @return int
     */
    public function getSeparateType(): int
    {
        return $this->separate_type;
    }

    /**
     * @param int $value
     */
    public function setSeparateType(int $value)
    {
        $this->separate_type = $value;
    }

}
