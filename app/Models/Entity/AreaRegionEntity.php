<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AreaRegionEntity')]
class AreaRegionEntity
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'shipping_area_id', description: '', type: 'integer')]
    protected int $shippingAreaId;

    #[OA\Property(property: 'region_id', description: '', type: 'integer')]
    protected int $regionId;

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
    public function getShippingAreaId(): int
    {
        return $this->shippingAreaId;
    }

    /**
     * 设置
     */
    public function setShippingAreaId(int $shippingAreaId): void
    {
        $this->shippingAreaId = $shippingAreaId;
    }

    /**
     * 获取
     */
    public function getRegionId(): int
    {
        return $this->regionId;
    }

    /**
     * 设置
     */
    public function setRegionId(int $regionId): void
    {
        $this->regionId = $regionId;
    }
}
