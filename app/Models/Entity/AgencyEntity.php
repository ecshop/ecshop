<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AgencyEntity')]
class AgencyEntity
{
    use ArrayObject;

    #[OA\Property(property: 'agency_id', description: '', type: 'integer')]
    protected int $agencyId;

    #[OA\Property(property: 'agency_name', description: '', type: 'string')]
    protected string $agencyName;

    #[OA\Property(property: 'agency_desc', description: '', type: 'string')]
    protected string $agencyDesc;

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

    /**
     * 获取
     */
    public function getAgencyName(): string
    {
        return $this->agencyName;
    }

    /**
     * 设置
     */
    public function setAgencyName(string $agencyName): void
    {
        $this->agencyName = $agencyName;
    }

    /**
     * 获取
     */
    public function getAgencyDesc(): string
    {
        return $this->agencyDesc;
    }

    /**
     * 设置
     */
    public function setAgencyDesc(string $agencyDesc): void
    {
        $this->agencyDesc = $agencyDesc;
    }
}
