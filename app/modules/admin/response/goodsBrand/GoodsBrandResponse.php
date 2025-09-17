<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsBrand;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsBrandResponse')]
class GoodsBrandResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '品牌ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'brandName', description: '品牌名称', type: 'string')]
    private string $brandName;

    #[OA\Property(property: 'brandLogo', description: '品牌logo路径', type: 'string')]
    private string $brandLogo;

    #[OA\Property(property: 'brandDesc', description: '品牌描述', type: 'string')]
    private string $brandDesc;

    #[OA\Property(property: 'siteUrl', description: '品牌官网', type: 'string')]
    private string $siteUrl;

    #[OA\Property(property: 'sortOrder', description: '排序权重', type: 'integer')]
    private int $sortOrder;

    #[OA\Property(property: 'isShow', description: '是否显示(1显示 0隐藏)', type: 'integer')]
    private int $isShow;

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

    public function getBrandName(): string
    {
        return $this->brandName;
    }

    public function setBrandName(string $brandName): void
    {
        $this->brandName = $brandName;
    }

    public function getBrandLogo(): string
    {
        return $this->brandLogo;
    }

    public function setBrandLogo(string $brandLogo): void
    {
        $this->brandLogo = $brandLogo;
    }

    public function getBrandDesc(): string
    {
        return $this->brandDesc;
    }

    public function setBrandDesc(string $brandDesc): void
    {
        $this->brandDesc = $brandDesc;
    }

    public function getSiteUrl(): string
    {
        return $this->siteUrl;
    }

    public function setSiteUrl(string $siteUrl): void
    {
        $this->siteUrl = $siteUrl;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    public function getIsShow(): int
    {
        return $this->isShow;
    }

    public function setIsShow(int $isShow): void
    {
        $this->isShow = $isShow;
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
