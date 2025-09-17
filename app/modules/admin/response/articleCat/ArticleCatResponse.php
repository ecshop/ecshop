<?php

declare(strict_types=1);

namespace app\modules\admin\response\articleCat;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ArticleCatResponse')]
class ArticleCatResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '分类ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'catName', description: '分类名称', type: 'string')]
    private string $catName;

    #[OA\Property(property: 'catType', description: '分类类型', type: 'integer')]
    private int $catType;

    #[OA\Property(property: 'keywords', description: '关键词', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'catDesc', description: '分类描述', type: 'string')]
    private string $catDesc;

    #[OA\Property(property: 'sortOrder', description: '排序', type: 'integer')]
    private int $sortOrder;

    #[OA\Property(property: 'showInNav', description: '是否显示在导航', type: 'integer')]
    private int $showInNav;

    #[OA\Property(property: 'parentId', description: '父分类ID', type: 'integer')]
    private int $parentId;

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

    public function getCatName(): string
    {
        return $this->catName;
    }

    public function setCatName(string $catName): void
    {
        $this->catName = $catName;
    }

    public function getCatType(): int
    {
        return $this->catType;
    }

    public function setCatType(int $catType): void
    {
        $this->catType = $catType;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function getCatDesc(): string
    {
        return $this->catDesc;
    }

    public function setCatDesc(string $catDesc): void
    {
        $this->catDesc = $catDesc;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    public function getShowInNav(): int
    {
        return $this->showInNav;
    }

    public function setShowInNav(int $showInNav): void
    {
        $this->showInNav = $showInNav;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
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
