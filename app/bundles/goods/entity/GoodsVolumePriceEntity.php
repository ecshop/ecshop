<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsVolumePriceEntity')]
class GoodsVolumePriceEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'price_type', description: '价格类型(1会员价 2批发价)', type: 'integer')]
    private int $price_type;

    #[OA\Property(property: 'goods_id', description: '商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'product_id', description: '货品ID', type: 'integer')]
    private int $product_id;

    #[OA\Property(property: 'volume_number', description: '购买数量', type: 'integer')]
    private int $volume_number;

    #[OA\Property(property: 'volume_price', description: '阶梯价格', type: 'float')]
    private float $volume_price;

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

    public function getPriceType(): int
    {
        return $this->price_type;
    }

    public function setPriceType(int $priceType): void
    {
        $this->price_type = $priceType;
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

    public function getVolumeNumber(): int
    {
        return $this->volume_number;
    }

    public function setVolumeNumber(int $volumeNumber): void
    {
        $this->volume_number = $volumeNumber;
    }

    public function getVolumePrice(): float
    {
        return $this->volume_price;
    }

    public function setVolumePrice(float $volumePrice): void
    {
        $this->volume_price = $volumePrice;
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
