<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\AreaRegion;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AreaRegionResponse')]
class AreaRegionResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'shippingAreaId', description: '', type: 'integer')]
    private int $shippingAreaId;

    #[OA\Property(property: 'regionId', description: '', type: 'integer')]
    private int $regionId;

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
