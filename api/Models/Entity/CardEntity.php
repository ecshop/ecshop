<?php

namespace App\Models\Entity;

/**
 * Class CardEntity
 * @package App\Models\Entity
 */
class CardEntity
{
    /**
     * @var int 
     */
    private int $card_id;

    /**
     * @var string 
     */
    private string $card_name;

    /**
     * @var string 
     */
    private string $card_img;

    /**
     * @var float 
     */
    private float $card_fee;

    /**
     * @var float 
     */
    private float $free_money;

    /**
     * @var string 
     */
    private string $card_desc;

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
     * @return string
     */
    public function getCardName(): string
    {
        return $this->card_name;
    }

    /**
     * @param string $value
     */
    public function setCardName(string $value)
    {
        $this->card_name = $value;
    }

    /**
     * @return string
     */
    public function getCardImg(): string
    {
        return $this->card_img;
    }

    /**
     * @param string $value
     */
    public function setCardImg(string $value)
    {
        $this->card_img = $value;
    }

    /**
     * @return float
     */
    public function getCardFee(): float
    {
        return $this->card_fee;
    }

    /**
     * @param float $value
     */
    public function setCardFee(float $value)
    {
        $this->card_fee = $value;
    }

    /**
     * @return float
     */
    public function getFreeMoney(): float
    {
        return $this->free_money;
    }

    /**
     * @param float $value
     */
    public function setFreeMoney(float $value)
    {
        $this->free_money = $value;
    }

    /**
     * @return string
     */
    public function getCardDesc(): string
    {
        return $this->card_desc;
    }

    /**
     * @param string $value
     */
    public function setCardDesc(string $value)
    {
        $this->card_desc = $value;
    }

}
