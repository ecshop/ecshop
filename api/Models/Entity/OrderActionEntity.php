<?php

namespace App\Models\Entity;

/**
 * Class OrderActionEntity
 * @package App\Models\Entity
 */
class OrderActionEntity
{
    /**
     * @var int 
     */
    private int $action_id;

    /**
     * @var int 
     */
    private int $order_id;

    /**
     * @var string 
     */
    private string $action_user;

    /**
     * @var int 
     */
    private int $order_status;

    /**
     * @var int 
     */
    private int $shipping_status;

    /**
     * @var int 
     */
    private int $pay_status;

    /**
     * @var int 
     */
    private int $action_place;

    /**
     * @var string 
     */
    private string $action_note;

    /**
     * @var int 
     */
    private int $log_time;

    /**
     * @return int
     */
    public function getActionId(): int
    {
        return $this->action_id;
    }

    /**
     * @param int $value
     */
    public function setActionId(int $value)
    {
        $this->action_id = $value;
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
     * @return string
     */
    public function getActionUser(): string
    {
        return $this->action_user;
    }

    /**
     * @param string $value
     */
    public function setActionUser(string $value)
    {
        $this->action_user = $value;
    }

    /**
     * @return int
     */
    public function getOrderStatus(): int
    {
        return $this->order_status;
    }

    /**
     * @param int $value
     */
    public function setOrderStatus(int $value)
    {
        $this->order_status = $value;
    }

    /**
     * @return int
     */
    public function getShippingStatus(): int
    {
        return $this->shipping_status;
    }

    /**
     * @param int $value
     */
    public function setShippingStatus(int $value)
    {
        $this->shipping_status = $value;
    }

    /**
     * @return int
     */
    public function getPayStatus(): int
    {
        return $this->pay_status;
    }

    /**
     * @param int $value
     */
    public function setPayStatus(int $value)
    {
        $this->pay_status = $value;
    }

    /**
     * @return int
     */
    public function getActionPlace(): int
    {
        return $this->action_place;
    }

    /**
     * @param int $value
     */
    public function setActionPlace(int $value)
    {
        $this->action_place = $value;
    }

    /**
     * @return string
     */
    public function getActionNote(): string
    {
        return $this->action_note;
    }

    /**
     * @param string $value
     */
    public function setActionNote(string $value)
    {
        $this->action_note = $value;
    }

    /**
     * @return int
     */
    public function getLogTime(): int
    {
        return $this->log_time;
    }

    /**
     * @param int $value
     */
    public function setLogTime(int $value)
    {
        $this->log_time = $value;
    }

}
