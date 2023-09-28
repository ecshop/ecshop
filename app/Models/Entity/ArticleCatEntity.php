<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ArticleCatEntity')]
class ArticleCatEntity
{
    use ArrayObject;

    #[OA\Property(property: 'cat_id', description: '', type: 'integer')]
    protected int $catId;

    #[OA\Property(property: 'cat_name', description: '', type: 'string')]
    protected string $catName;

    #[OA\Property(property: 'cat_type', description: '', type: 'integer')]
    protected int $catType;

    #[OA\Property(property: 'keywords', description: '', type: 'string')]
    protected string $keywords;

    #[OA\Property(property: 'cat_desc', description: '', type: 'string')]
    protected string $catDesc;

    #[OA\Property(property: 'sort_order', description: '', type: 'integer')]
    protected int $sortOrder;

    #[OA\Property(property: 'show_in_nav', description: '', type: 'integer')]
    protected int $showInNav;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    /**
     * 获取
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * 设置
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    /**
     * 获取
     */
    public function getCatName(): string
    {
        return $this->catName;
    }

    /**
     * 设置
     */
    public function setCatName(string $catName): void
    {
        $this->catName = $catName;
    }

    /**
     * 获取
     */
    public function getCatType(): int
    {
        return $this->catType;
    }

    /**
     * 设置
     */
    public function setCatType(int $catType): void
    {
        $this->catType = $catType;
    }

    /**
     * 获取
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * 设置
     */
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * 获取
     */
    public function getCatDesc(): string
    {
        return $this->catDesc;
    }

    /**
     * 设置
     */
    public function setCatDesc(string $catDesc): void
    {
        $this->catDesc = $catDesc;
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
    public function getShowInNav(): int
    {
        return $this->showInNav;
    }

    /**
     * 设置
     */
    public function setShowInNav(int $showInNav): void
    {
        $this->showInNav = $showInNav;
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
}
