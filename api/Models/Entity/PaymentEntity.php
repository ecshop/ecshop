<?php

namespace App\Models\Entity;

/**
 * Class PaymentEntity
 * @package App\Models\Entity
 */
class PaymentEntity
{
    /**
     * @var int 
     */
    private int $pay_id;

    /**
     * @var string 
     */
    private string $pay_code;

    /**
     * @var string 
     */
    private string $pay_name;

    /**
     * @var string 
     */
    private string $pay_fee;

    /**
     * @var string 
     */
    private string $pay_desc;

    /**
     * @var int 
     */
    private int $pay_order;

    /**
     * @var string 
     */
    private string $pay_config;

    /**
     * @var int 
     */
    private int $enabled;

    /**
     * @var int 
     */
    private int $is_cod;

    /**
     * @var int 
     */
    private int $is_online;

    /**
     * @return int
     */
    public function getPayId(): int
    {
        return $this->pay_id;
    }

    /**
     * @param int $value
     */
    public function setPayId(int $value)
    {
        $this->pay_id = $value;
    }

    /**
     * @return string
     */
    public function getPayCode(): string
    {
        return $this->pay_code;
    }

    /**
     * @param string $value
     */
    public function setPayCode(string $value)
    {
        $this->pay_code = $value;
    }

    /**
     * @return string
     */
    public function getPayName(): string
    {
        return $this->pay_name;
    }

    /**
     * @param string $value
     */
    public function setPayName(string $value)
    {
        $this->pay_name = $value;
    }

    /**
     * @return string
     */
    public function getPayFee(): string
    {
        return $this->pay_fee;
    }

    /**
     * @param string $value
     */
    public function setPayFee(string $value)
    {
        $this->pay_fee = $value;
    }

    /**
     * @return string
     */
    public function getPayDesc(): string
    {
        return $this->pay_desc;
    }

    /**
     * @param string $value
     */
    public function setPayDesc(string $value)
    {
        $this->pay_desc = $value;
    }

    /**
     * @return int
     */
    public function getPayOrder(): int
    {
        return $this->pay_order;
    }

    /**
     * @param int $value
     */
    public function setPayOrder(int $value)
    {
        $this->pay_order = $value;
    }

    /**
     * @return string
     */
    public function getPayConfig(): string
    {
        return $this->pay_config;
    }

    /**
     * @param string $value
     */
    public function setPayConfig(string $value)
    {
        $this->pay_config = $value;
    }

    /**
     * @return int
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * @param int $value
     */
    public function setEnabled(int $value)
    {
        $this->enabled = $value;
    }

    /**
     * @return int
     */
    public function getIsCod(): int
    {
        return $this->is_cod;
    }

    /**
     * @param int $value
     */
    public function setIsCod(int $value)
    {
        $this->is_cod = $value;
    }

    /**
     * @return int
     */
    public function getIsOnline(): int
    {
        return $this->is_online;
    }

    /**
     * @param int $value
     */
    public function setIsOnline(int $value)
    {
        $this->is_online = $value;
    }

}
