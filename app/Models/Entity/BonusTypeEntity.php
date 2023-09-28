<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'BonusTypeEntity')]
class BonusTypeEntity
{
    use ArrayObject;

    #[OA\Property(property: 'type_id', description: '', type: 'integer')]
    protected int $typeId;

    #[OA\Property(property: 'type_name', description: '', type: 'string')]
    protected string $typeName;

    #[OA\Property(property: 'type_money', description: '', type: 'float')]
    protected float $typeMoney;

    #[OA\Property(property: 'send_type', description: '', type: 'integer')]
    protected int $sendType;

    #[OA\Property(property: 'min_amount', description: '', type: 'float')]
    protected float $minAmount;

    #[OA\Property(property: 'max_amount', description: '', type: 'float')]
    protected float $maxAmount;

    #[OA\Property(property: 'send_start_date', description: '', type: 'integer')]
    protected int $sendStartDate;

    #[OA\Property(property: 'send_end_date', description: '', type: 'integer')]
    protected int $sendEndDate;

    #[OA\Property(property: 'use_start_date', description: '', type: 'integer')]
    protected int $useStartDate;

    #[OA\Property(property: 'use_end_date', description: '', type: 'integer')]
    protected int $useEndDate;

    #[OA\Property(property: 'min_goods_amount', description: '', type: 'float')]
    protected float $minGoodsAmount;

    /**
     * 获取
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * 设置
     */
    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
    }

    /**
     * 获取
     */
    public function getTypeName(): string
    {
        return $this->typeName;
    }

    /**
     * 设置
     */
    public function setTypeName(string $typeName): void
    {
        $this->typeName = $typeName;
    }

    /**
     * 获取
     */
    public function getTypeMoney(): float
    {
        return $this->typeMoney;
    }

    /**
     * 设置
     */
    public function setTypeMoney(float $typeMoney): void
    {
        $this->typeMoney = $typeMoney;
    }

    /**
     * 获取
     */
    public function getSendType(): int
    {
        return $this->sendType;
    }

    /**
     * 设置
     */
    public function setSendType(int $sendType): void
    {
        $this->sendType = $sendType;
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
    public function getSendStartDate(): int
    {
        return $this->sendStartDate;
    }

    /**
     * 设置
     */
    public function setSendStartDate(int $sendStartDate): void
    {
        $this->sendStartDate = $sendStartDate;
    }

    /**
     * 获取
     */
    public function getSendEndDate(): int
    {
        return $this->sendEndDate;
    }

    /**
     * 设置
     */
    public function setSendEndDate(int $sendEndDate): void
    {
        $this->sendEndDate = $sendEndDate;
    }

    /**
     * 获取
     */
    public function getUseStartDate(): int
    {
        return $this->useStartDate;
    }

    /**
     * 设置
     */
    public function setUseStartDate(int $useStartDate): void
    {
        $this->useStartDate = $useStartDate;
    }

    /**
     * 获取
     */
    public function getUseEndDate(): int
    {
        return $this->useEndDate;
    }

    /**
     * 设置
     */
    public function setUseEndDate(int $useEndDate): void
    {
        $this->useEndDate = $useEndDate;
    }

    /**
     * 获取
     */
    public function getMinGoodsAmount(): float
    {
        return $this->minGoodsAmount;
    }

    /**
     * 设置
     */
    public function setMinGoodsAmount(float $minGoodsAmount): void
    {
        $this->minGoodsAmount = $minGoodsAmount;
    }
}
