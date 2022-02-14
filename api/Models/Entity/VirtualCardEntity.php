<?php

namespace App\Models\Entity;

/**
 * Class VirtualCardEntity
 * @package App\Models\Entity
 */
class VirtualCardEntity
{
    /**
     * @var int 
     */
    private int $card_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var string 
     */
    private string $card_sn;

    /**
     * @var string 
     */
    private string $card_password;

    /**
     * @var int 
     */
    private int $add_date;

    /**
     * @var int 
     */
    private int $end_date;

    /**
     * @var int 
     */
    private int $is_saled;

    /**
     * @var string 
     */
    private string $order_sn;

    /**
     * @var string 
     */
    private string $crc32;

    /**
     * @return int
     */
    public function getCardId(): int
    {
        return $this->card_id;
    }

    /**
     * @param int $value
     */
    public function setCardId(int $value)
    {
        $this->card_id = $value;
    }

    /**
     * @return int
     */
    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    /**
     * @param int $value
     */
    public function setGoodsId(int $value)
    {
        $this->goods_id = $value;
    }

    /**
     * @return string
     */
    public function getCardSn(): string
    {
        return $this->card_sn;
    }

    /**
     * @param string $value
     */
    public function setCardSn(string $value)
    {
        $this->card_sn = $value;
    }

    /**
     * @return string
     */
    public function getCardPassword(): string
    {
        return $this->card_password;
    }

    /**
     * @param string $value
     */
    public function setCardPassword(string $value)
    {
        $this->card_password = $value;
    }

    /**
     * @return int
     */
    public function getAddDate(): int
    {
        return $this->add_date;
    }

    /**
     * @param int $value
     */
    public function setAddDate(int $value)
    {
        $this->add_date = $value;
    }

    /**
     * @return int
     */
    public function getEndDate(): int
    {
        return $this->end_date;
    }

    /**
     * @param int $value
     */
    public function setEndDate(int $value)
    {
        $this->end_date = $value;
    }

    /**
     * @return int
     */
    public function getIsSaled(): int
    {
        return $this->is_saled;
    }

    /**
     * @param int $value
     */
    public function setIsSaled(int $value)
    {
        $this->is_saled = $value;
    }

    /**
     * @return string
     */
    public function getOrderSn(): string
    {
        return $this->order_sn;
    }

    /**
     * @param string $value
     */
    public function setOrderSn(string $value)
    {
        $this->order_sn = $value;
    }

    /**
     * @return string
     */
    public function getCrc32(): string
    {
        return $this->crc32;
    }

    /**
     * @param string $value
     */
    public function setCrc32(string $value)
    {
        $this->crc32 = $value;
    }

}
