<?php

declare(strict_types=1);

namespace app\bundles\activity\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityExchangeEntity')]
class ActivityExchangeEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goods_id', description: '商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'product_id', description: '货品ID', type: 'integer')]
    private int $product_id;

    #[OA\Property(property: 'exchange_integral', description: '兑换所需积分', type: 'integer')]
    private int $exchange_integral;

    #[OA\Property(property: 'is_exchange', description: '是否可兑换(0否 1是)', type: 'integer')]
    private int $is_exchange;

    #[OA\Property(property: 'is_hot', description: '是否热销(0否 1是)', type: 'integer')]
    private int $is_hot;

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

    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goods_id = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function getExchangeIntegral(): int
    {
        return $this->exchange_integral;
    }

    public function setExchangeIntegral(int $exchangeIntegral): void
    {
        $this->exchange_integral = $exchangeIntegral;
    }

    public function getIsExchange(): int
    {
        return $this->is_exchange;
    }

    public function setIsExchange(int $isExchange): void
    {
        $this->is_exchange = $isExchange;
    }

    public function getIsHot(): int
    {
        return $this->is_hot;
    }

    public function setIsHot(int $isHot): void
    {
        $this->is_hot = $isHot;
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
