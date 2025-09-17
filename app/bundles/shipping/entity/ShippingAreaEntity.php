<?php

declare(strict_types=1);

namespace app\bundles\shipping\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingAreaEntity')]
class ShippingAreaEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '配送区域ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'shipping_area_name', description: '配送区域名称', type: 'string')]
    private string $shipping_area_name;

    #[OA\Property(property: 'shipping_id', description: '关联配送方式ID', type: 'integer')]
    private int $shipping_id;

    #[OA\Property(property: 'configure', description: '配置信息(序列化存储)', type: 'string')]
    private string $configure;

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

    public function getShippingAreaName(): string
    {
        return $this->shipping_area_name;
    }

    public function setShippingAreaName(string $shippingAreaName): void
    {
        $this->shipping_area_name = $shippingAreaName;
    }

    public function getShippingId(): int
    {
        return $this->shipping_id;
    }

    public function setShippingId(int $shippingId): void
    {
        $this->shipping_id = $shippingId;
    }

    public function getConfigure(): string
    {
        return $this->configure;
    }

    public function setConfigure(string $configure): void
    {
        $this->configure = $configure;
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
