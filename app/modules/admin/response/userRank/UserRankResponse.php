<?php

declare(strict_types=1);

namespace app\modules\admin\response\userRank;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserRankResponse')]
class UserRankResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '等级ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'rankName', description: '等级名称', type: 'string')]
    private string $rankName;

    #[OA\Property(property: 'minPoints', description: '最小积分值', type: 'integer')]
    private int $minPoints;

    #[OA\Property(property: 'maxPoints', description: '最大积分值', type: 'integer')]
    private int $maxPoints;

    #[OA\Property(property: 'discount', description: '折扣百分比(0-100)', type: 'integer')]
    private int $discount;

    #[OA\Property(property: 'showPrice', description: '是否显示价格(0不显示 1显示)', type: 'integer')]
    private int $showPrice;

    #[OA\Property(property: 'specialRank', description: '是否特殊等级(0普通 1特殊)', type: 'integer')]
    private int $specialRank;

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

    public function getRankName(): string
    {
        return $this->rankName;
    }

    public function setRankName(string $rankName): void
    {
        $this->rankName = $rankName;
    }

    public function getMinPoints(): int
    {
        return $this->minPoints;
    }

    public function setMinPoints(int $minPoints): void
    {
        $this->minPoints = $minPoints;
    }

    public function getMaxPoints(): int
    {
        return $this->maxPoints;
    }

    public function setMaxPoints(int $maxPoints): void
    {
        $this->maxPoints = $maxPoints;
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }

    public function setDiscount(int $discount): void
    {
        $this->discount = $discount;
    }

    public function getShowPrice(): int
    {
        return $this->showPrice;
    }

    public function setShowPrice(int $showPrice): void
    {
        $this->showPrice = $showPrice;
    }

    public function getSpecialRank(): int
    {
        return $this->specialRank;
    }

    public function setSpecialRank(int $specialRank): void
    {
        $this->specialRank = $specialRank;
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
