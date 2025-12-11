<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserRankEntity')]
class UserRankEntity
{
    use DTOHelper;

    const string getRankId = 'rank_id';

    const string getRankName = 'rank_name';

    const string getMinPoints = 'min_points';

    const string getMaxPoints = 'max_points';

    const string getDiscount = 'discount';

    const string getShowPrice = 'show_price';

    const string getSpecialRank = 'special_rank';

    #[OA\Property(property: 'rankId', description: '', type: 'integer')]
    private int $rankId;

    #[OA\Property(property: 'rankName', description: '', type: 'string')]
    private string $rankName;

    #[OA\Property(property: 'minPoints', description: '', type: 'integer')]
    private int $minPoints;

    #[OA\Property(property: 'maxPoints', description: '', type: 'integer')]
    private int $maxPoints;

    #[OA\Property(property: 'discount', description: '', type: 'integer')]
    private int $discount;

    #[OA\Property(property: 'showPrice', description: '', type: 'integer')]
    private int $showPrice;

    #[OA\Property(property: 'specialRank', description: '', type: 'integer')]
    private int $specialRank;

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
