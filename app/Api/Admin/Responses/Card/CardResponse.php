<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\Card;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CardResponse')]
class CardResponse
{
    use DTOHelper;

    #[OA\Property(property: 'cardId', description: '', type: 'integer')]
    private int $cardId;

    #[OA\Property(property: 'cardName', description: '', type: 'string')]
    private string $cardName;

    #[OA\Property(property: 'cardImg', description: '', type: 'string')]
    private string $cardImg;

    #[OA\Property(property: 'cardFee', description: '', type: 'string')]
    private string $cardFee;

    #[OA\Property(property: 'freeMoney', description: '', type: 'string')]
    private string $freeMoney;

    #[OA\Property(property: 'cardDesc', description: '', type: 'string')]
    private string $cardDesc;

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
    public function getCardFee(): string
    {
        return $this->cardFee;
    }

    /**
     * 设置
     */
    public function setCardFee(string $cardFee): void
    {
        $this->cardFee = $cardFee;
    }

    /**
     * 获取
     */
    public function getFreeMoney(): string
    {
        return $this->freeMoney;
    }

    /**
     * 设置
     */
    public function setFreeMoney(string $freeMoney): void
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
