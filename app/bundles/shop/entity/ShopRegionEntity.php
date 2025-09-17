<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopRegionEntity')]
class ShopRegionEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '地区ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'parent_id', description: '父地区ID', type: 'integer')]
    private int $parent_id;

    #[OA\Property(property: 'region_name', description: '地区名称', type: 'string')]
    private string $region_name;

    #[OA\Property(property: 'region_type', description: '地区类型(1国家/2省份/3城市/4区县)', type: 'integer')]
    private int $region_type;

    #[OA\Property(property: 'agency_id', description: '关联代理商ID', type: 'integer')]
    private int $agency_id;

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

    public function getParentId(): int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parentId): void
    {
        $this->parent_id = $parentId;
    }

    public function getRegionName(): string
    {
        return $this->region_name;
    }

    public function setRegionName(string $regionName): void
    {
        $this->region_name = $regionName;
    }

    public function getRegionType(): int
    {
        return $this->region_type;
    }

    public function setRegionType(int $regionType): void
    {
        $this->region_type = $regionType;
    }

    public function getAgencyId(): int
    {
        return $this->agency_id;
    }

    public function setAgencyId(int $agencyId): void
    {
        $this->agency_id = $agencyId;
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
