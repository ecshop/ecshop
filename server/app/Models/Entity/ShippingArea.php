<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingAreaSchema')]
class ShippingArea
{
    use ArrayObject;

    #[OA\Property(property: 'shipping_area_id', description: '', type: 'integer')]
    protected int $shippingAreaId;

    #[OA\Property(property: 'shipping_area_name', description: '', type: 'string')]
    protected string $shippingAreaName;

    #[OA\Property(property: 'shipping_id', description: '', type: 'integer')]
    protected int $shippingId;

    #[OA\Property(property: 'configure', description: '', type: 'string')]
    protected string $configure;

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
