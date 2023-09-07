<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsActivitySchema')]
class GoodsActivity
{
    use ArrayObject;

    #[OA\Property(property: 'act_id', description: '', type: 'integer')]
    protected int $actId;

    #[OA\Property(property: 'act_name', description: '', type: 'string')]
    protected string $actName;

    #[OA\Property(property: 'act_desc', description: '', type: 'string')]
    protected string $actDesc;

    #[OA\Property(property: 'act_type', description: '', type: 'integer')]
    protected int $actType;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'product_id', description: '', type: 'integer')]
    protected int $productId;

    #[OA\Property(property: 'goods_name', description: '', type: 'string')]
    protected string $goodsName;

    #[OA\Property(property: 'start_time', description: '', type: 'integer')]
    protected int $startTime;

    #[OA\Property(property: 'end_time', description: '', type: 'integer')]
    protected int $endTime;

    #[OA\Property(property: 'is_finished', description: '', type: 'integer')]
    protected int $isFinished;

    #[OA\Property(property: 'ext_info', description: '', type: 'string')]
    protected string $extInfo;

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
    public function getActDesc(): string
    {
        return $this->actDesc;
    }

    /**
     * 设置
     */
    public function setActDesc(string $actDesc): void
    {
        $this->actDesc = $actDesc;
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
    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    /**
     * 设置
     */
    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    /**
     * 获取
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * 设置
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * 获取
     */
    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    /**
     * 设置
     */
    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
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
    public function getIsFinished(): int
    {
        return $this->isFinished;
    }

    /**
     * 设置
     */
    public function setIsFinished(int $isFinished): void
    {
        $this->isFinished = $isFinished;
    }

    /**
     * 获取
     */
    public function getExtInfo(): string
    {
        return $this->extInfo;
    }

    /**
     * 设置
     */
    public function setExtInfo(string $extInfo): void
    {
        $this->extInfo = $extInfo;
    }
}
