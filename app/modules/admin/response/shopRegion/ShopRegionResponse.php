<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopRegion;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopRegionResponse')]
class ShopRegionResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '地区ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'parentId', description: '父地区ID', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'regionName', description: '地区名称', type: 'string')]
    private string $regionName;

    #[OA\Property(property: 'regionType', description: '地区类型(1国家/2省份/3城市/4区县)', type: 'integer')]
    private int $regionType;

    #[OA\Property(property: 'agencyId', description: '关联代理商ID', type: 'integer')]
    private int $agencyId;

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

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    public function getRegionName(): string
    {
        return $this->regionName;
    }

    public function setRegionName(string $regionName): void
    {
        $this->regionName = $regionName;
    }

    public function getRegionType(): int
    {
        return $this->regionType;
    }

    public function setRegionType(int $regionType): void
    {
        $this->regionType = $regionType;
    }

    public function getAgencyId(): int
    {
        return $this->agencyId;
    }

    public function setAgencyId(int $agencyId): void
    {
        $this->agencyId = $agencyId;
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
