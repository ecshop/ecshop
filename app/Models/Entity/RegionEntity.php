<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'RegionEntity')]
class RegionEntity
{
    use ArrayObject;

    #[OA\Property(property: 'region_id', description: '', type: 'integer')]
    protected int $regionId;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    #[OA\Property(property: 'region_name', description: '', type: 'string')]
    protected string $regionName;

    #[OA\Property(property: 'region_type', description: '', type: 'integer')]
    protected int $regionType;

    #[OA\Property(property: 'agency_id', description: '', type: 'integer')]
    protected int $agencyId;

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

    /**
     * 获取
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * 设置
     */
    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * 获取
     */
    public function getRegionName(): string
    {
        return $this->regionName;
    }

    /**
     * 设置
     */
    public function setRegionName(string $regionName): void
    {
        $this->regionName = $regionName;
    }

    /**
     * 获取
     */
    public function getRegionType(): int
    {
        return $this->regionType;
    }

    /**
     * 设置
     */
    public function setRegionType(int $regionType): void
    {
        $this->regionType = $regionType;
    }

    /**
     * 获取
     */
    public function getAgencyId(): int
    {
        return $this->agencyId;
    }

    /**
     * 设置
     */
    public function setAgencyId(int $agencyId): void
    {
        $this->agencyId = $agencyId;
    }
}
