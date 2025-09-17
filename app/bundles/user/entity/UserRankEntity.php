<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserRankEntity')]
class UserRankEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '等级ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'rank_name', description: '等级名称', type: 'string')]
    private string $rank_name;

    #[OA\Property(property: 'min_points', description: '最小积分值', type: 'integer')]
    private int $min_points;

    #[OA\Property(property: 'max_points', description: '最大积分值', type: 'integer')]
    private int $max_points;

    #[OA\Property(property: 'discount', description: '折扣百分比(0-100)', type: 'integer')]
    private int $discount;

    #[OA\Property(property: 'show_price', description: '是否显示价格(0不显示 1显示)', type: 'integer')]
    private int $show_price;

    #[OA\Property(property: 'special_rank', description: '是否特殊等级(0普通 1特殊)', type: 'integer')]
    private int $special_rank;

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

    public function getRankName(): string
    {
        return $this->rank_name;
    }

    public function setRankName(string $rankName): void
    {
        $this->rank_name = $rankName;
    }

    public function getMinPoints(): int
    {
        return $this->min_points;
    }

    public function setMinPoints(int $minPoints): void
    {
        $this->min_points = $minPoints;
    }

    public function getMaxPoints(): int
    {
        return $this->max_points;
    }

    public function setMaxPoints(int $maxPoints): void
    {
        $this->max_points = $maxPoints;
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
        return $this->show_price;
    }

    public function setShowPrice(int $showPrice): void
    {
        $this->show_price = $showPrice;
    }

    public function getSpecialRank(): int
    {
        return $this->special_rank;
    }

    public function setSpecialRank(int $specialRank): void
    {
        $this->special_rank = $specialRank;
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
