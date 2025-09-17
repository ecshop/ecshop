<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopCard;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopCardResponse')]
class ShopCardResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '卡片ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cardName', description: '卡片名称', type: 'string')]
    private string $cardName;

    #[OA\Property(property: 'cardImg', description: '卡片图片路径', type: 'string')]
    private string $cardImg;

    #[OA\Property(property: 'cardFee', description: '卡片费用', type: 'float')]
    private float $cardFee;

    #[OA\Property(property: 'freeMoney', description: '卡片面值', type: 'float')]
    private float $freeMoney;

    #[OA\Property(property: 'cardDesc', description: '卡片描述', type: 'string')]
    private string $cardDesc;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCardName(): string
    {
        return $this->cardName;
    }

    public function setCardName(string $cardName): void
    {
        $this->cardName = $cardName;
    }

    public function getCardImg(): string
    {
        return $this->cardImg;
    }

    public function setCardImg(string $cardImg): void
    {
        $this->cardImg = $cardImg;
    }

    public function getCardFee(): float
    {
        return $this->cardFee;
    }

    public function setCardFee(float $cardFee): void
    {
        $this->cardFee = $cardFee;
    }

    public function getFreeMoney(): float
    {
        return $this->freeMoney;
    }

    public function setFreeMoney(float $freeMoney): void
    {
        $this->freeMoney = $freeMoney;
    }

    public function getCardDesc(): string
    {
        return $this->cardDesc;
    }

    public function setCardDesc(string $cardDesc): void
    {
        $this->cardDesc = $cardDesc;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}
