<?php

declare(strict_types=1);

namespace app\modules\admin\response\activityBonus;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityBonusResponse')]
class ActivityBonusResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '红包类型ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'typeName', description: '红包类型名称', type: 'string')]
    private string $typeName;

    #[OA\Property(property: 'typeMoney', description: '红包金额', type: 'float')]
    private float $typeMoney;

    #[OA\Property(property: 'sendType', description: '发放方式（0手动 1自动）', type: 'integer')]
    private int $sendType;

    #[OA\Property(property: 'minAmount', description: '最小订单金额', type: 'float')]
    private float $minAmount;

    #[OA\Property(property: 'maxAmount', description: '最大订单金额', type: 'float')]
    private float $maxAmount;

    #[OA\Property(property: 'sendStartDate', description: '发放开始时间戳', type: 'integer')]
    private int $sendStartDate;

    #[OA\Property(property: 'sendEndDate', description: '发放结束时间戳', type: 'integer')]
    private int $sendEndDate;

    #[OA\Property(property: 'useStartDate', description: '使用开始时间戳', type: 'integer')]
    private int $useStartDate;

    #[OA\Property(property: 'useEndDate', description: '使用结束时间戳', type: 'integer')]
    private int $useEndDate;

    #[OA\Property(property: 'minGoodsAmount', description: '最小商品金额限制', type: 'float')]
    private float $minGoodsAmount;

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

    public function getTypeName(): string
    {
        return $this->typeName;
    }

    public function setTypeName(string $typeName): void
    {
        $this->typeName = $typeName;
    }

    public function getTypeMoney(): float
    {
        return $this->typeMoney;
    }

    public function setTypeMoney(float $typeMoney): void
    {
        $this->typeMoney = $typeMoney;
    }

    public function getSendType(): int
    {
        return $this->sendType;
    }

    public function setSendType(int $sendType): void
    {
        $this->sendType = $sendType;
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

    public function getSendStartDate(): int
    {
        return $this->sendStartDate;
    }

    public function setSendStartDate(int $sendStartDate): void
    {
        $this->sendStartDate = $sendStartDate;
    }

    public function getSendEndDate(): int
    {
        return $this->sendEndDate;
    }

    public function setSendEndDate(int $sendEndDate): void
    {
        $this->sendEndDate = $sendEndDate;
    }

    public function getUseStartDate(): int
    {
        return $this->useStartDate;
    }

    public function setUseStartDate(int $useStartDate): void
    {
        $this->useStartDate = $useStartDate;
    }

    public function getUseEndDate(): int
    {
        return $this->useEndDate;
    }

    public function setUseEndDate(int $useEndDate): void
    {
        $this->useEndDate = $useEndDate;
    }

    public function getMinGoodsAmount(): float
    {
        return $this->minGoodsAmount;
    }

    public function setMinGoodsAmount(float $minGoodsAmount): void
    {
        $this->minGoodsAmount = $minGoodsAmount;
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
