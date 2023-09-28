<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VolumePriceEntity')]
class VolumePriceEntity
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'price_type', description: '', type: 'integer')]
    protected int $priceType;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'volume_number', description: '', type: 'integer')]
    protected int $volumeNumber;

    #[OA\Property(property: 'volume_price', description: '', type: 'float')]
    protected float $volumePrice;

    /**
     * 获取
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * 获取
     */
    public function getPriceType(): int
    {
        return $this->priceType;
    }

    /**
     * 设置
     */
    public function setPriceType(int $priceType): void
    {
        $this->priceType = $priceType;
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
    public function getVolumeNumber(): int
    {
        return $this->volumeNumber;
    }

    /**
     * 设置
     */
    public function setVolumeNumber(int $volumeNumber): void
    {
        $this->volumeNumber = $volumeNumber;
    }

    /**
     * 获取
     */
    public function getVolumePrice(): float
    {
        return $this->volumePrice;
    }

    /**
     * 设置
     */
    public function setVolumePrice(float $volumePrice): void
    {
        $this->volumePrice = $volumePrice;
    }
}
