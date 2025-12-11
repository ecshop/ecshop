<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingAreaEntity')]
class ShippingAreaEntity
{
    use DTOHelper;

    const string getShippingAreaId = 'shipping_area_id';

    const string getShippingAreaName = 'shipping_area_name';

    const string getShippingId = 'shipping_id';

    const string getConfigure = 'configure';

    #[OA\Property(property: 'shippingAreaId', description: '', type: 'integer')]
    private int $shippingAreaId;

    #[OA\Property(property: 'shippingAreaName', description: '', type: 'string')]
    private string $shippingAreaName;

    #[OA\Property(property: 'shippingId', description: '', type: 'integer')]
    private int $shippingId;

    #[OA\Property(property: 'configure', description: '', type: 'string')]
    private string $configure;

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
    public function getShippingAreaName(): string
    {
        return $this->shippingAreaName;
    }

    /**
     * 设置
     */
    public function setShippingAreaName(string $shippingAreaName): void
    {
        $this->shippingAreaName = $shippingAreaName;
    }

    /**
     * 获取
     */
    public function getShippingId(): int
    {
        return $this->shippingId;
    }

    /**
     * 设置
     */
    public function setShippingId(int $shippingId): void
    {
        $this->shippingId = $shippingId;
    }

    /**
     * 获取
     */
    public function getConfigure(): string
    {
        return $this->configure;
    }

    /**
     * 设置
     */
    public function setConfigure(string $configure): void
    {
        $this->configure = $configure;
    }
}
