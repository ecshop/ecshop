<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\GoodsActivity;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsActivityResponse')]
class GoodsActivityResponse
{
    use DTOHelper;

    #[OA\Property(property: 'actId', description: '', type: 'integer')]
    private int $actId;

    #[OA\Property(property: 'actName', description: '', type: 'string')]
    private string $actName;

    #[OA\Property(property: 'actDesc', description: '', type: 'string')]
    private string $actDesc;

    #[OA\Property(property: 'actType', description: '', type: 'integer')]
    private int $actType;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'goodsName', description: '', type: 'string')]
    private string $goodsName;

    #[OA\Property(property: 'startTime', description: '', type: 'integer')]
    private int $startTime;

    #[OA\Property(property: 'endTime', description: '', type: 'integer')]
    private int $endTime;

    #[OA\Property(property: 'isFinished', description: '', type: 'integer')]
    private int $isFinished;

    #[OA\Property(property: 'extInfo', description: '', type: 'string')]
    private string $extInfo;

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
