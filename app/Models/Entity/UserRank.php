<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserRankSchema')]
class UserRank
{
    use ArrayObject;

    #[OA\Property(property: 'rank_id', description: '', type: 'integer')]
    protected int $rankId;

    #[OA\Property(property: 'rank_name', description: '', type: 'string')]
    protected string $rankName;

    #[OA\Property(property: 'min_points', description: '', type: 'integer')]
    protected int $minPoints;

    #[OA\Property(property: 'max_points', description: '', type: 'integer')]
    protected int $maxPoints;

    #[OA\Property(property: 'discount', description: '', type: 'integer')]
    protected int $discount;

    #[OA\Property(property: 'show_price', description: '', type: 'integer')]
    protected int $showPrice;

    #[OA\Property(property: 'special_rank', description: '', type: 'integer')]
    protected int $specialRank;

    /**
     * 获取
     */
    public function getRankId(): int
    {
        return $this->rankId;
    }

    /**
     * 设置
     */
    public function setRankId(int $rankId): void
    {
        $this->rankId = $rankId;
    }

    /**
     * 获取
     */
    public function getRankName(): string
    {
        return $this->rankName;
    }

    /**
     * 设置
     */
    public function setRankName(string $rankName): void
    {
        $this->rankName = $rankName;
    }

    /**
     * 获取
     */
    public function getMinPoints(): int
    {
        return $this->minPoints;
    }

    /**
     * 设置
     */
    public function setMinPoints(int $minPoints): void
    {
        $this->minPoints = $minPoints;
    }

    /**
     * 获取
     */
    public function getMaxPoints(): int
    {
        return $this->maxPoints;
    }

    /**
     * 设置
     */
    public function setMaxPoints(int $maxPoints): void
    {
        $this->maxPoints = $maxPoints;
    }

    /**
     * 获取
     */
    public function getDiscount(): int
    {
        return $this->discount;
    }

    /**
     * 设置
     */
    public function setDiscount(int $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * 获取
     */
    public function getShowPrice(): int
    {
        return $this->showPrice;
    }

    /**
     * 设置
     */
    public function setShowPrice(int $showPrice): void
    {
        $this->showPrice = $showPrice;
    }

    /**
     * 获取
     */
    public function getSpecialRank(): int
    {
        return $this->specialRank;
    }

    /**
     * 设置
     */
    public function setSpecialRank(int $specialRank): void
    {
        $this->specialRank = $specialRank;
    }
}
