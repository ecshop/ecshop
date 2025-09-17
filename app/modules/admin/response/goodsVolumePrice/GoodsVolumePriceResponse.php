<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsVolumePrice;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsVolumePriceResponse')]
class GoodsVolumePriceResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'priceType', description: '价格类型(1会员价 2批发价)', type: 'integer')]
    private int $priceType;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'volumeNumber', description: '购买数量', type: 'integer')]
    private int $volumeNumber;

    #[OA\Property(property: 'volumePrice', description: '阶梯价格', type: 'float')]
    private float $volumePrice;

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

    public function getPriceType(): int
    {
        return $this->priceType;
    }

    public function setPriceType(int $priceType): void
    {
        $this->priceType = $priceType;
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

    public function getVolumeNumber(): int
    {
        return $this->volumeNumber;
    }

    public function setVolumeNumber(int $volumeNumber): void
    {
        $this->volumeNumber = $volumeNumber;
    }

    public function getVolumePrice(): float
    {
        return $this->volumePrice;
    }

    public function setVolumePrice(float $volumePrice): void
    {
        $this->volumePrice = $volumePrice;
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
