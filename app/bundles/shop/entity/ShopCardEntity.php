<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopCardEntity')]
class ShopCardEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '卡片ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'card_name', description: '卡片名称', type: 'string')]
    private string $card_name;

    #[OA\Property(property: 'card_img', description: '卡片图片路径', type: 'string')]
    private string $card_img;

    #[OA\Property(property: 'card_fee', description: '卡片费用', type: 'float')]
    private float $card_fee;

    #[OA\Property(property: 'free_money', description: '卡片面值', type: 'float')]
    private float $free_money;

    #[OA\Property(property: 'card_desc', description: '卡片描述', type: 'string')]
    private string $card_desc;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $created_time;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updated_time;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deleted_time;

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
        return $this->card_name;
    }

    public function setCardName(string $cardName): void
    {
        $this->card_name = $cardName;
    }

    public function getCardImg(): string
    {
        return $this->card_img;
    }

    public function setCardImg(string $cardImg): void
    {
        $this->card_img = $cardImg;
    }

    public function getCardFee(): float
    {
        return $this->card_fee;
    }

    public function setCardFee(float $cardFee): void
    {
        $this->card_fee = $cardFee;
    }

    public function getFreeMoney(): float
    {
        return $this->free_money;
    }

    public function setFreeMoney(float $freeMoney): void
    {
        $this->free_money = $freeMoney;
    }

    public function getCardDesc(): string
    {
        return $this->card_desc;
    }

    public function setCardDesc(string $cardDesc): void
    {
        $this->card_desc = $cardDesc;
    }

    public function getCreatedTime(): string
    {
        return $this->created_time;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->created_time = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updated_time = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deleted_time;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deleted_time = $deletedTime;
    }
}
