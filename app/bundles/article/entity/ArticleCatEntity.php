<?php

declare(strict_types=1);

namespace app\bundles\article\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ArticleCatEntity')]
class ArticleCatEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '分类ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cat_name', description: '分类名称', type: 'string')]
    private string $cat_name;

    #[OA\Property(property: 'cat_type', description: '分类类型', type: 'integer')]
    private int $cat_type;

    #[OA\Property(property: 'keywords', description: '关键词', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'cat_desc', description: '分类描述', type: 'string')]
    private string $cat_desc;

    #[OA\Property(property: 'sort_order', description: '排序', type: 'integer')]
    private int $sort_order;

    #[OA\Property(property: 'show_in_nav', description: '是否显示在导航', type: 'integer')]
    private int $show_in_nav;

    #[OA\Property(property: 'parent_id', description: '父分类ID', type: 'integer')]
    private int $parent_id;

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

    public function getCatName(): string
    {
        return $this->cat_name;
    }

    public function setCatName(string $catName): void
    {
        $this->cat_name = $catName;
    }

    public function getCatType(): int
    {
        return $this->cat_type;
    }

    public function setCatType(int $catType): void
    {
        $this->cat_type = $catType;
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
        return $this->cat_desc;
    }

    public function setCatDesc(string $catDesc): void
    {
        $this->cat_desc = $catDesc;
    }

    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sort_order = $sortOrder;
    }

    public function getShowInNav(): int
    {
        return $this->show_in_nav;
    }

    public function setShowInNav(int $showInNav): void
    {
        $this->show_in_nav = $showInNav;
    }

    public function getParentId(): int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parentId): void
    {
        $this->parent_id = $parentId;
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
