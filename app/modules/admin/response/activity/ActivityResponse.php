<?php

declare(strict_types=1);

namespace app\modules\admin\response\activity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityResponse')]
class ActivityResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '活动ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'actName', description: '活动名称', type: 'string')]
    private string $actName;

    #[OA\Property(property: 'startTime', description: '开始时间', type: 'integer')]
    private int $startTime;

    #[OA\Property(property: 'endTime', description: '结束时间', type: 'integer')]
    private int $endTime;

    #[OA\Property(property: 'userRank', description: '适用会员等级', type: 'string')]
    private string $userRank;

    #[OA\Property(property: 'actRange', description: '活动范围(0全部商品 1指定分类 2指定品牌 3指定商品)', type: 'integer')]
    private int $actRange;

    #[OA\Property(property: 'actRangeExt', description: '活动范围扩展(根据act_range存储不同数据)', type: 'string')]
    private string $actRangeExt;

    #[OA\Property(property: 'minAmount', description: '最小金额限制', type: 'float')]
    private float $minAmount;

    #[OA\Property(property: 'maxAmount', description: '最大金额限制', type: 'float')]
    private float $maxAmount;

    #[OA\Property(property: 'actType', description: '活动类型(0赠品 1减免 2折扣 3现金)', type: 'integer')]
    private int $actType;

    #[OA\Property(property: 'actTypeExt', description: '活动类型扩展值(折扣率/减免金额等)', type: 'float')]
    private float $actTypeExt;

    #[OA\Property(property: 'gift', description: '赠品信息(JSON格式)', type: 'string')]
    private string $gift;

    #[OA\Property(property: 'sortOrder', description: '排序', type: 'integer')]
    private int $sortOrder;

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

    public function getActName(): string
    {
        return $this->actName;
    }

    public function setActName(string $actName): void
    {
        $this->actName = $actName;
    }

    public function getStartTime(): int
    {
        return $this->startTime;
    }

    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->endTime;
    }

    public function setEndTime(int $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function getUserRank(): string
    {
        return $this->userRank;
    }

    public function setUserRank(string $userRank): void
    {
        $this->userRank = $userRank;
    }

    public function getActRange(): int
    {
        return $this->actRange;
    }

    public function setActRange(int $actRange): void
    {
        $this->actRange = $actRange;
    }

    public function getActRangeExt(): string
    {
        return $this->actRangeExt;
    }

    public function setActRangeExt(string $actRangeExt): void
    {
        $this->actRangeExt = $actRangeExt;
    }

    public function getMinAmount(): float
    {
        return $this->minAmount;
    }

    public function setMinAmount(float $minAmount): void
    {
        $this->minAmount = $minAmount;
    }

    public function getMaxAmount(): float
    {
        return $this->maxAmount;
    }

    public function setMaxAmount(float $maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }

    public function getActType(): int
    {
        return $this->actType;
    }

    public function setActType(int $actType): void
    {
        $this->actType = $actType;
    }

    public function getActTypeExt(): float
    {
        return $this->actTypeExt;
    }

    public function setActTypeExt(float $actTypeExt): void
    {
        $this->actTypeExt = $actTypeExt;
    }

    public function getGift(): string
    {
        return $this->gift;
    }

    public function setGift(string $gift): void
    {
        $this->gift = $gift;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
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
