<?php

declare(strict_types=1);

namespace app\bundles\shipping\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingAreaRegionEntity')]
class ShippingAreaRegionEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'shipping_area_id', description: '配送区域ID', type: 'integer')]
    private int $shipping_area_id;

    #[OA\Property(property: 'region_id', description: '地区ID', type: 'integer')]
    private int $region_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getShippingAreaId(): int
    {
        return $this->shipping_area_id;
    }

    public function setShippingAreaId(int $shippingAreaId): void
    {
        $this->shipping_area_id = $shippingAreaId;
    }

    public function getRegionId(): int
    {
        return $this->region_id;
    }

    public function setRegionId(int $regionId): void
    {
        $this->region_id = $regionId;
    }
}
