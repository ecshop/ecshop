<?php

declare(strict_types=1);

namespace app\bundles\activity\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityBonusEntity')]
class ActivityBonusEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '红包类型ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'type_name', description: '红包类型名称', type: 'string')]
    private string $type_name;

    #[OA\Property(property: 'type_money', description: '红包金额', type: 'float')]
    private float $type_money;

    #[OA\Property(property: 'send_type', description: '发放方式（0手动 1自动）', type: 'integer')]
    private int $send_type;

    #[OA\Property(property: 'min_amount', description: '最小订单金额', type: 'float')]
    private float $min_amount;

    #[OA\Property(property: 'max_amount', description: '最大订单金额', type: 'float')]
    private float $max_amount;

    #[OA\Property(property: 'send_start_date', description: '发放开始时间戳', type: 'integer')]
    private int $send_start_date;

    #[OA\Property(property: 'send_end_date', description: '发放结束时间戳', type: 'integer')]
    private int $send_end_date;

    #[OA\Property(property: 'use_start_date', description: '使用开始时间戳', type: 'integer')]
    private int $use_start_date;

    #[OA\Property(property: 'use_end_date', description: '使用结束时间戳', type: 'integer')]
    private int $use_end_date;

    #[OA\Property(property: 'min_goods_amount', description: '最小商品金额限制', type: 'float')]
    private float $min_goods_amount;

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

    public function getTypeName(): string
    {
        return $this->type_name;
    }

    public function setTypeName(string $typeName): void
    {
        $this->type_name = $typeName;
    }

    public function getTypeMoney(): float
    {
        return $this->type_money;
    }

    public function setTypeMoney(float $typeMoney): void
    {
        $this->type_money = $typeMoney;
    }

    public function getSendType(): int
    {
        return $this->send_type;
    }

    public function setSendType(int $sendType): void
    {
        $this->send_type = $sendType;
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

    public function getSendStartDate(): int
    {
        return $this->send_start_date;
    }

    public function setSendStartDate(int $sendStartDate): void
    {
        $this->send_start_date = $sendStartDate;
    }

    public function getSendEndDate(): int
    {
        return $this->send_end_date;
    }

    public function setSendEndDate(int $sendEndDate): void
    {
        $this->send_end_date = $sendEndDate;
    }

    public function getUseStartDate(): int
    {
        return $this->use_start_date;
    }

    public function setUseStartDate(int $useStartDate): void
    {
        $this->use_start_date = $useStartDate;
    }

    public function getUseEndDate(): int
    {
        return $this->use_end_date;
    }

    public function setUseEndDate(int $useEndDate): void
    {
        $this->use_end_date = $useEndDate;
    }

    public function getMinGoodsAmount(): float
    {
        return $this->min_goods_amount;
    }

    public function setMinGoodsAmount(float $minGoodsAmount): void
    {
        $this->min_goods_amount = $minGoodsAmount;
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
