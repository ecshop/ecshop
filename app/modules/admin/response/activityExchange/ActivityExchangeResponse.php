<?php

declare(strict_types=1);

namespace app\modules\admin\response\activityExchange;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityExchangeResponse')]
class ActivityExchangeResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'exchangeIntegral', description: '兑换所需积分', type: 'integer')]
    private int $exchangeIntegral;

    #[OA\Property(property: 'isExchange', description: '是否可兑换(0否 1是)', type: 'integer')]
    private int $isExchange;

    #[OA\Property(property: 'isHot', description: '是否热销(0否 1是)', type: 'integer')]
    private int $isHot;

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

    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getExchangeIntegral(): int
    {
        return $this->exchangeIntegral;
    }

    public function setExchangeIntegral(int $exchangeIntegral): void
    {
        $this->exchangeIntegral = $exchangeIntegral;
    }

    public function getIsExchange(): int
    {
        return $this->isExchange;
    }

    public function setIsExchange(int $isExchange): void
    {
        $this->isExchange = $isExchange;
    }

    public function getIsHot(): int
    {
        return $this->isHot;
    }

    public function setIsHot(int $isHot): void
    {
        $this->isHot = $isHot;
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
