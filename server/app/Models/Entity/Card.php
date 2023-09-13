<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CardSchema')]
class Card
{
    use ArrayObject;

    #[OA\Property(property: 'card_id', description: '', type: 'integer')]
    protected int $cardId;

    #[OA\Property(property: 'card_name', description: '', type: 'string')]
    protected string $cardName;

    #[OA\Property(property: 'card_img', description: '', type: 'string')]
    protected string $cardImg;

    #[OA\Property(property: 'card_fee', description: '', type: 'float')]
    protected float $cardFee;

    #[OA\Property(property: 'free_money', description: '', type: 'float')]
    protected float $freeMoney;

    #[OA\Property(property: 'card_desc', description: '', type: 'string')]
    protected string $cardDesc;

    /**
     * 获取
     */
    public function getCardId(): int
    {
        return $this->cardId;
    }

    /**
     * 设置
     */
    public function setCardId(int $cardId): void
    {
        $this->cardId = $cardId;
    }

    /**
     * 获取
     */
    public function getCardName(): string
    {
        return $this->cardName;
    }

    /**
     * 设置
     */
    public function setCardName(string $cardName): void
    {
        $this->cardName = $cardName;
    }

    /**
     * 获取
     */
    public function getCardImg(): string
    {
        return $this->cardImg;
    }

    /**
     * 设置
     */
    public function setCardImg(string $cardImg): void
    {
        $this->cardImg = $cardImg;
    }

    /**
     * 获取
     */
    public function getCardFee(): float
    {
        return $this->cardFee;
    }

    /**
     * 设置
     */
    public function setCardFee(float $cardFee): void
    {
        $this->cardFee = $cardFee;
    }

    /**
     * 获取
     */
    public function getFreeMoney(): float
    {
        return $this->freeMoney;
    }

    /**
     * 设置
     */
    public function setFreeMoney(float $freeMoney): void
    {
        $this->freeMoney = $freeMoney;
    }

    /**
     * 获取
     */
    public function getCardDesc(): string
    {
        return $this->cardDesc;
    }

    /**
     * 设置
     */
    public function setCardDesc(string $cardDesc): void
    {
        $this->cardDesc = $cardDesc;
    }
}
