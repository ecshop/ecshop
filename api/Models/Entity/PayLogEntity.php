<?php

namespace App\Models\Entity;

/**
 * Class PayLogEntity
 * @package App\Models\Entity
 */
class PayLogEntity
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
     * @var float 
     */
    private float $order_amount;

    /**
     * @var int 
     */
    private int $order_type;

    /**
     * @var int 
     */
    private int $is_paid;

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
     * @return float
     */
    public function getOrderAmount(): float
    {
        return $this->order_amount;
    }

    /**
     * @param float $value
     */
    public function setOrderAmount(float $value)
    {
        $this->order_amount = $value;
    }

    /**
     * @return int
     */
    public function getOrderType(): int
    {
        return $this->order_type;
    }

    /**
     * @param int $value
     */
    public function setOrderType(int $value)
    {
        $this->order_type = $value;
    }

    /**
     * @return int
     */
    public function getIsPaid(): int
    {
        return $this->is_paid;
    }

    /**
     * @param int $value
     */
    public function setIsPaid(int $value)
    {
        $this->is_paid = $value;
    }

}
