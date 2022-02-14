<?php

namespace App\Models\Entity;

/**
 * Class UserAccountEntity
 * @package App\Models\Entity
 */
class UserAccountEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $admin_user;

    /**
     * @var float 
     */
    private float $amount;

    /**
     * @var int 
     */
    private int $add_time;

    /**
     * @var int 
     */
    private int $paid_time;

    /**
     * @var string 
     */
    private string $admin_note;

    /**
     * @var string 
     */
    private string $user_note;

    /**
     * @var int 
     */
    private int $process_type;

    /**
     * @var string 
     */
    private string $payment;

    /**
     * @var int 
     */
    private int $is_paid;

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
    public function getAdminUser(): string
    {
        return $this->admin_user;
    }

    /**
     * @param string $value
     */
    public function setAdminUser(string $value)
    {
        $this->admin_user = $value;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $value
     */
    public function setAmount(float $value)
    {
        $this->amount = $value;
    }

    /**
     * @return int
     */
    public function getAddTime(): int
    {
        return $this->add_time;
    }

    /**
     * @param int $value
     */
    public function setAddTime(int $value)
    {
        $this->add_time = $value;
    }

    /**
     * @return int
     */
    public function getPaidTime(): int
    {
        return $this->paid_time;
    }

    /**
     * @param int $value
     */
    public function setPaidTime(int $value)
    {
        $this->paid_time = $value;
    }

    /**
     * @return string
     */
    public function getAdminNote(): string
    {
        return $this->admin_note;
    }

    /**
     * @param string $value
     */
    public function setAdminNote(string $value)
    {
        $this->admin_note = $value;
    }

    /**
     * @return string
     */
    public function getUserNote(): string
    {
        return $this->user_note;
    }

    /**
     * @param string $value
     */
    public function setUserNote(string $value)
    {
        $this->user_note = $value;
    }

    /**
     * @return int
     */
    public function getProcessType(): int
    {
        return $this->process_type;
    }

    /**
     * @param int $value
     */
    public function setProcessType(int $value)
    {
        $this->process_type = $value;
    }

    /**
     * @return string
     */
    public function getPayment(): string
    {
        return $this->payment;
    }

    /**
     * @param string $value
     */
    public function setPayment(string $value)
    {
        $this->payment = $value;
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
