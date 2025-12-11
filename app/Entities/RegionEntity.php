<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'RegionEntity')]
class RegionEntity
{
    use DTOHelper;

    const string getRegionId = 'region_id';

    const string getParentId = 'parent_id';

    const string getRegionName = 'region_name';

    const string getRegionType = 'region_type';

    const string getAgencyId = 'agency_id';

    #[OA\Property(property: 'regionId', description: '', type: 'integer')]
    private int $regionId;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'regionName', description: '', type: 'string')]
    private string $regionName;

    #[OA\Property(property: 'regionType', description: '', type: 'integer')]
    private int $regionType;

    #[OA\Property(property: 'agencyId', description: '', type: 'integer')]
    private int $agencyId;

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
