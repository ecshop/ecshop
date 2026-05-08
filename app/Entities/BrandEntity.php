<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'BrandEntity')]
class BrandEntity
{
    use DTOHelper;

    const string getBrandId = 'brand_id';

    const string getBrandName = 'brand_name';

    const string getBrandLogo = 'brand_logo';

    const string getBrandDesc = 'brand_desc';

    const string getSiteUrl = 'site_url';

    const string getSortOrder = 'sort_order';

    const string getIsShow = 'is_show';

    #[OA\Property(property: 'brandId', description: '', type: 'integer')]
    private int $brandId;

    #[OA\Property(property: 'brandName', description: '', type: 'string')]
    private string $brandName;

    #[OA\Property(property: 'brandLogo', description: '', type: 'string')]
    private string $brandLogo;

    #[OA\Property(property: 'brandDesc', description: '', type: 'string')]
    private string $brandDesc;

    #[OA\Property(property: 'siteUrl', description: '', type: 'string')]
    private string $siteUrl;

    #[OA\Property(property: 'sortOrder', description: '', type: 'integer')]
    private int $sortOrder;

    #[OA\Property(property: 'isShow', description: '', type: 'integer')]
    private int $isShow;

    /**
     * 获取
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }

    /**
     * 设置
     */
    public function setBrandId(int $brandId): void
    {
        $this->brandId = $brandId;
    }

    /**
     * 获取
     */
    public function getBrandName(): string
    {
        return $this->brandName;
    }

    /**
     * 设置
     */
    public function setBrandName(string $brandName): void
    {
        $this->brandName = $brandName;
    }

    /**
     * 获取
     */
    public function getBrandLogo(): string
    {
        return $this->brandLogo;
    }

    /**
     * 设置
     */
    public function setBrandLogo(string $brandLogo): void
    {
        $this->brandLogo = $brandLogo;
    }

    /**
     * 获取
     */
    public function getBrandDesc(): string
    {
        return $this->brandDesc;
    }

    /**
     * 设置
     */
    public function setBrandDesc(string $brandDesc): void
    {
        $this->brandDesc = $brandDesc;
    }

    /**
     * 获取
     */
    public function getSiteUrl(): string
    {
        return $this->siteUrl;
    }

    /**
     * 设置
     */
    public function setSiteUrl(string $siteUrl): void
    {
        $this->siteUrl = $siteUrl;
    }

    /**
     * 获取
     */
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    /**
     * 设置
     */
    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * 获取
     */
    public function getIsShow(): int
    {
        return $this->isShow;
    }

    /**
     * 设置
     */
    public function setIsShow(int $isShow): void
    {
        $this->isShow = $isShow;
    }
}
