<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'FavourableActivitySchema')]
class FavourableActivity
{
    use ArrayObject;

    #[OA\Property(property: 'act_id', description: '', type: 'integer')]
    protected int $actId;

    #[OA\Property(property: 'act_name', description: '', type: 'string')]
    protected string $actName;

    #[OA\Property(property: 'start_time', description: '', type: 'integer')]
    protected int $startTime;

    #[OA\Property(property: 'end_time', description: '', type: 'integer')]
    protected int $endTime;

    #[OA\Property(property: 'user_rank', description: '', type: 'string')]
    protected string $userRank;

    #[OA\Property(property: 'act_range', description: '', type: 'integer')]
    protected int $actRange;

    #[OA\Property(property: 'act_range_ext', description: '', type: 'string')]
    protected string $actRangeExt;

    #[OA\Property(property: 'min_amount', description: '', type: 'float')]
    protected float $minAmount;

    #[OA\Property(property: 'max_amount', description: '', type: 'float')]
    protected float $maxAmount;

    #[OA\Property(property: 'act_type', description: '', type: 'integer')]
    protected int $actType;

    #[OA\Property(property: 'act_type_ext', description: '', type: 'float')]
    protected float $actTypeExt;

    #[OA\Property(property: 'gift', description: '', type: 'string')]
    protected string $gift;

    #[OA\Property(property: 'sort_order', description: '', type: 'integer')]
    protected int $sortOrder;

    /**
     * 获取
     */
    public function getActId(): int
    {
        return $this->actId;
    }

    /**
     * 设置
     */
    public function setActId(int $actId): void
    {
        $this->actId = $actId;
    }

    /**
     * 获取
     */
    public function getActName(): string
    {
        return $this->actName;
    }

    /**
     * 设置
     */
    public function setActName(string $actName): void
    {
        $this->actName = $actName;
    }

    /**
     * 获取
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * 设置
     */
    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * 获取
     */
    public function getEndTime(): int
    {
        return $this->endTime;
    }

    /**
     * 设置
     */
    public function setEndTime(int $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * 获取
     */
    public function getUserRank(): string
    {
        return $this->userRank;
    }

    /**
     * 设置
     */
    public function setUserRank(string $userRank): void
    {
        $this->userRank = $userRank;
    }

    /**
     * 获取
     */
    public function getActRange(): int
    {
        return $this->actRange;
    }

    /**
     * 设置
     */
    public function setActRange(int $actRange): void
    {
        $this->actRange = $actRange;
    }

    /**
     * 获取
     */
    public function getActRangeExt(): string
    {
        return $this->actRangeExt;
    }

    /**
     * 设置
     */
    public function setActRangeExt(string $actRangeExt): void
    {
        $this->actRangeExt = $actRangeExt;
    }

    /**
     * 获取
     */
    public function getMinAmount(): float
    {
        return $this->minAmount;
    }

    /**
     * 设置
     */
    public function setMinAmount(float $minAmount): void
    {
        $this->minAmount = $minAmount;
    }

    /**
     * 获取
     */
    public function getMaxAmount(): float
    {
        return $this->maxAmount;
    }

    /**
     * 设置
     */
    public function setMaxAmount(float $maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }

    /**
     * 获取
     */
    public function getActType(): int
    {
        return $this->actType;
    }

    /**
     * 设置
     */
    public function setActType(int $actType): void
    {
        $this->actType = $actType;
    }

    /**
     * 获取
     */
    public function getActTypeExt(): float
    {
        return $this->actTypeExt;
    }

    /**
     * 设置
     */
    public function setActTypeExt(float $actTypeExt): void
    {
        $this->actTypeExt = $actTypeExt;
    }

    /**
     * 获取
     */
    public function getGift(): string
    {
        return $this->gift;
    }

    /**
     * 设置
     */
    public function setGift(string $gift): void
    {
        $this->gift = $gift;
    }

    /**
     * 获取
     */
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    /**
     * 设置
     */
    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }
}
