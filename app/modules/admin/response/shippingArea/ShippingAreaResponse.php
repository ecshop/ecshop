<?php

declare(strict_types=1);

namespace app\modules\admin\response\shippingArea;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShippingAreaResponse')]
class ShippingAreaResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '配送区域ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'shippingAreaName', description: '配送区域名称', type: 'string')]
    private string $shippingAreaName;

    #[OA\Property(property: 'shippingId', description: '关联配送方式ID', type: 'integer')]
    private int $shippingId;

    #[OA\Property(property: 'configure', description: '配置信息(序列化存储)', type: 'string')]
    private string $configure;

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

    public function getShippingAreaName(): string
    {
        return $this->shippingAreaName;
    }

    public function setShippingAreaName(string $shippingAreaName): void
    {
        $this->shippingAreaName = $shippingAreaName;
    }

    public function getShippingId(): int
    {
        return $this->shippingId;
    }

    public function setShippingId(int $shippingId): void
    {
        $this->shippingId = $shippingId;
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
