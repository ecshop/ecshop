<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\Agency;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AgencyResponse')]
class AgencyResponse
{
    use DTOHelper;

    #[OA\Property(property: 'agencyId', description: '', type: 'integer')]
    private int $agencyId;

    #[OA\Property(property: 'agencyName', description: '', type: 'string')]
    private string $agencyName;

    #[OA\Property(property: 'agencyDesc', description: '', type: 'string')]
    private string $agencyDesc;

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
