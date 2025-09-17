<?php

declare(strict_types=1);

namespace app\bundles\activity\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityEntity')]
class ActivityEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '活动ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'act_name', description: '活动名称', type: 'string')]
    private string $act_name;

    #[OA\Property(property: 'start_time', description: '开始时间', type: 'integer')]
    private int $start_time;

    #[OA\Property(property: 'end_time', description: '结束时间', type: 'integer')]
    private int $end_time;

    #[OA\Property(property: 'user_rank', description: '适用会员等级', type: 'string')]
    private string $user_rank;

    #[OA\Property(property: 'act_range', description: '活动范围(0全部商品 1指定分类 2指定品牌 3指定商品)', type: 'integer')]
    private int $act_range;

    #[OA\Property(property: 'act_range_ext', description: '活动范围扩展(根据act_range存储不同数据)', type: 'string')]
    private string $act_range_ext;

    #[OA\Property(property: 'min_amount', description: '最小金额限制', type: 'float')]
    private float $min_amount;

    #[OA\Property(property: 'max_amount', description: '最大金额限制', type: 'float')]
    private float $max_amount;

    #[OA\Property(property: 'act_type', description: '活动类型(0赠品 1减免 2折扣 3现金)', type: 'integer')]
    private int $act_type;

    #[OA\Property(property: 'act_type_ext', description: '活动类型扩展值(折扣率/减免金额等)', type: 'float')]
    private float $act_type_ext;

    #[OA\Property(property: 'gift', description: '赠品信息(JSON格式)', type: 'string')]
    private string $gift;

    #[OA\Property(property: 'sort_order', description: '排序', type: 'integer')]
    private int $sort_order;

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

    public function getActName(): string
    {
        return $this->act_name;
    }

    public function setActName(string $actName): void
    {
        $this->act_name = $actName;
    }

    public function getStartTime(): int
    {
        return $this->start_time;
    }

    public function setStartTime(int $startTime): void
    {
        $this->start_time = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->end_time;
    }

    public function setEndTime(int $endTime): void
    {
        $this->end_time = $endTime;
    }

    public function getUserRank(): string
    {
        return $this->user_rank;
    }

    public function setUserRank(string $userRank): void
    {
        $this->user_rank = $userRank;
    }

    public function getActRange(): int
    {
        return $this->act_range;
    }

    public function setActRange(int $actRange): void
    {
        $this->act_range = $actRange;
    }

    public function getActRangeExt(): string
    {
        return $this->act_range_ext;
    }

    public function setActRangeExt(string $actRangeExt): void
    {
        $this->act_range_ext = $actRangeExt;
    }

    public function getMinAmount(): float
    {
        return $this->min_amount;
    }

    public function setMinAmount(float $minAmount): void
    {
        $this->min_amount = $minAmount;
    }

    public function getMaxAmount(): float
    {
        return $this->max_amount;
    }

    public function setMaxAmount(float $maxAmount): void
    {
        $this->max_amount = $maxAmount;
    }

    public function getActType(): int
    {
        return $this->act_type;
    }

    public function setActType(int $actType): void
    {
        $this->act_type = $actType;
    }

    public function getActTypeExt(): float
    {
        return $this->act_type_ext;
    }

    public function setActTypeExt(float $actTypeExt): void
    {
        $this->act_type_ext = $actTypeExt;
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
        return $this->sort_order;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sort_order = $sortOrder;
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
