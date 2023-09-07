<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'BrandSchema')]
class Brand
{
    use ArrayObject;

    #[OA\Property(property: 'brand_id', description: '', type: 'integer')]
    protected int $brandId;

    #[OA\Property(property: 'brand_name', description: '', type: 'string')]
    protected string $brandName;

    #[OA\Property(property: 'brand_logo', description: '', type: 'string')]
    protected string $brandLogo;

    #[OA\Property(property: 'brand_desc', description: '', type: 'string')]
    protected string $brandDesc;

    #[OA\Property(property: 'site_url', description: '', type: 'string')]
    protected string $siteUrl;

    #[OA\Property(property: 'sort_order', description: '', type: 'integer')]
    protected int $sortOrder;

    #[OA\Property(property: 'is_show', description: '', type: 'integer')]
    protected int $isShow;

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
