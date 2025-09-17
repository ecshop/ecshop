<?php

declare(strict_types=1);

namespace app\modules\admin\response\shippingAreaRegion;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingAreaRegionResponse')]
class ShippingAreaRegionResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'shippingAreaId', description: '配送区域ID', type: 'integer')]
    private int $shippingAreaId;

    #[OA\Property(property: 'regionId', description: '地区ID', type: 'integer')]
    private int $regionId;

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
        return $this->shippingAreaId;
    }

    public function setShippingAreaId(int $shippingAreaId): void
    {
        $this->shippingAreaId = $shippingAreaId;
    }

    public function getRegionId(): int
    {
        return $this->regionId;
    }

    public function setRegionId(int $regionId): void
    {
        $this->regionId = $regionId;
    }
}
