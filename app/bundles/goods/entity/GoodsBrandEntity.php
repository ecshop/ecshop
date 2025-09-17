<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsBrandEntity')]
class GoodsBrandEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '品牌ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'brand_name', description: '品牌名称', type: 'string')]
    private string $brand_name;

    #[OA\Property(property: 'brand_logo', description: '品牌logo路径', type: 'string')]
    private string $brand_logo;

    #[OA\Property(property: 'brand_desc', description: '品牌描述', type: 'string')]
    private string $brand_desc;

    #[OA\Property(property: 'site_url', description: '品牌官网', type: 'string')]
    private string $site_url;

    #[OA\Property(property: 'sort_order', description: '排序权重', type: 'integer')]
    private int $sort_order;

    #[OA\Property(property: 'is_show', description: '是否显示(1显示 0隐藏)', type: 'integer')]
    private int $is_show;

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

    public function getBrandName(): string
    {
        return $this->brand_name;
    }

    public function setBrandName(string $brandName): void
    {
        $this->brand_name = $brandName;
    }

    public function getBrandLogo(): string
    {
        return $this->brand_logo;
    }

    public function setBrandLogo(string $brandLogo): void
    {
        $this->brand_logo = $brandLogo;
    }

    public function getBrandDesc(): string
    {
        return $this->brand_desc;
    }

    public function setBrandDesc(string $brandDesc): void
    {
        $this->brand_desc = $brandDesc;
    }

    public function getSiteUrl(): string
    {
        return $this->site_url;
    }

    public function setSiteUrl(string $siteUrl): void
    {
        $this->site_url = $siteUrl;
    }

    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sort_order = $sortOrder;
    }

    public function getIsShow(): int
    {
        return $this->is_show;
    }

    public function setIsShow(int $isShow): void
    {
        $this->is_show = $isShow;
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
