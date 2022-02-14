<?php

namespace App\Models\Entity;

/**
 * Class PackEntity
 * @package App\Models\Entity
 */
class PackEntity
{
    /**
     * @var int 
     */
    private int $pack_id;

    /**
     * @var string 
     */
    private string $pack_name;

    /**
     * @var string 
     */
    private string $pack_img;

    /**
     * @var float 
     */
    private float $pack_fee;

    /**
     * @var int 
     */
    private int $free_money;

    /**
     * @var string 
     */
    private string $pack_desc;

    /**
     * @return int
     */
    public function getPackId(): int
    {
        return $this->pack_id;
    }

    /**
     * @param int $value
     */
    public function setPackId(int $value)
    {
        $this->pack_id = $value;
    }

    /**
     * @return string
     */
    public function getPackName(): string
    {
        return $this->pack_name;
    }

    /**
     * @param string $value
     */
    public function setPackName(string $value)
    {
        $this->pack_name = $value;
    }

    /**
     * @return string
     */
    public function getPackImg(): string
    {
        return $this->pack_img;
    }

    /**
     * @param string $value
     */
    public function setPackImg(string $value)
    {
        $this->pack_img = $value;
    }

    /**
     * @return float
     */
    public function getPackFee(): float
    {
        return $this->pack_fee;
    }

    /**
     * @param float $value
     */
    public function setPackFee(float $value)
    {
        $this->pack_fee = $value;
    }

    /**
     * @return int
     */
    public function getFreeMoney(): int
    {
        return $this->free_money;
    }

    /**
     * @param int $value
     */
    public function setFreeMoney(int $value)
    {
        $this->free_money = $value;
    }

    /**
     * @return string
     */
    public function getPackDesc(): string
    {
        return $this->pack_desc;
    }

    /**
     * @param string $value
     */
    public function setPackDesc(string $value)
    {
        $this->pack_desc = $value;
    }

}
