<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\VolumePrice;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VolumePriceResponse')]
class VolumePriceResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'priceType', description: '', type: 'integer')]
    private int $priceType;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'volumeNumber', description: '', type: 'integer')]
    private int $volumeNumber;

    #[OA\Property(property: 'volumePrice', description: '', type: 'string')]
    private string $volumePrice;

    /**
     * 获取ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置ID
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
    public function getVolumePrice(): string
    {
        return $this->volumePrice;
    }

    /**
     * 设置
     */
    public function setVolumePrice(string $volumePrice): void
    {
        $this->volumePrice = $volumePrice;
    }
}
