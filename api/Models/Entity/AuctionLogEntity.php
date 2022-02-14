<?php

namespace App\Models\Entity;

/**
 * Class AuctionLogEntity
 * @package App\Models\Entity
 */
class AuctionLogEntity
{
    /**
     * @var int 
     */
    private int $log_id;

    /**
     * @var int 
     */
    private int $act_id;

    /**
     * @var int 
     */
    private int $bid_user;

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
     * @return int
     */
    public function getBidUser(): int
    {
        return $this->bid_user;
    }

    /**
     * @param int $value
     */
    public function setBidUser(int $value)
    {
        $this->bid_user = $value;
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
