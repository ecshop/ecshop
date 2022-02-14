<?php

namespace App\Models\Entity;

/**
 * Class SnatchLogEntity
 * @package App\Models\Entity
 */
class SnatchLogEntity
{
    /**
     * @var int 
     */
    private int $log_id;

    /**
     * @var int 
     */
    private int $snatch_id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var float 
     */
    private float $bid_price;

    /**
     * @var int 
     */
    private int $bid_time;

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
    public function getSnatchId(): int
    {
        return $this->snatch_id;
    }

    /**
     * @param int $value
     */
    public function setSnatchId(int $value)
    {
        $this->snatch_id = $value;
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
    public function getBidPrice(): float
    {
        return $this->bid_price;
    }

    /**
     * @param float $value
     */
    public function setBidPrice(float $value)
    {
        $this->bid_price = $value;
    }

    /**
     * @return int
     */
    public function getBidTime(): int
    {
        return $this->bid_time;
    }

    /**
     * @param int $value
     */
    public function setBidTime(int $value)
    {
        $this->bid_time = $value;
    }

}
