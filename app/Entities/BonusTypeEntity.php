<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'BonusTypeEntity')]
class BonusTypeEntity
{
    use DTOHelper;

    const string getTypeId = 'type_id';

    const string getTypeName = 'type_name';

    const string getTypeMoney = 'type_money';

    const string getSendType = 'send_type';

    const string getMinAmount = 'min_amount';

    const string getMaxAmount = 'max_amount';

    const string getSendStartDate = 'send_start_date';

    const string getSendEndDate = 'send_end_date';

    const string getUseStartDate = 'use_start_date';

    const string getUseEndDate = 'use_end_date';

    const string getMinGoodsAmount = 'min_goods_amount';

    #[OA\Property(property: 'typeId', description: '', type: 'integer')]
    private int $typeId;

    #[OA\Property(property: 'typeName', description: '', type: 'string')]
    private string $typeName;

    #[OA\Property(property: 'typeMoney', description: '', type: 'string')]
    private string $typeMoney;

    #[OA\Property(property: 'sendType', description: '', type: 'integer')]
    private int $sendType;

    #[OA\Property(property: 'minAmount', description: '', type: 'string')]
    private string $minAmount;

    #[OA\Property(property: 'maxAmount', description: '', type: 'string')]
    private string $maxAmount;

    #[OA\Property(property: 'sendStartDate', description: '', type: 'integer')]
    private int $sendStartDate;

    #[OA\Property(property: 'sendEndDate', description: '', type: 'integer')]
    private int $sendEndDate;

    #[OA\Property(property: 'useStartDate', description: '', type: 'integer')]
    private int $useStartDate;

    #[OA\Property(property: 'useEndDate', description: '', type: 'integer')]
    private int $useEndDate;

    #[OA\Property(property: 'minGoodsAmount', description: '', type: 'string')]
    private string $minGoodsAmount;

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
    public function getTypeMoney(): string
    {
        return $this->typeMoney;
    }

    /**
     * 设置
     */
    public function setTypeMoney(string $typeMoney): void
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
    public function getMinAmount(): string
    {
        return $this->minAmount;
    }

    /**
     * 设置
     */
    public function setMinAmount(string $minAmount): void
    {
        $this->minAmount = $minAmount;
    }

    /**
     * 获取
     */
    public function getMaxAmount(): string
    {
        return $this->maxAmount;
    }

    /**
     * 设置
     */
    public function setMaxAmount(string $maxAmount): void
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
    public function getMinGoodsAmount(): string
    {
        return $this->minGoodsAmount;
    }

    /**
     * 设置
     */
    public function setMinGoodsAmount(string $minGoodsAmount): void
    {
        $this->minGoodsAmount = $minGoodsAmount;
    }
}
