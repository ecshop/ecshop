<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ArticleCatEntity')]
class ArticleCatEntity
{
    use DTOHelper;

    const string getCatId = 'cat_id';

    const string getCatName = 'cat_name';

    const string getCatType = 'cat_type';

    const string getKeywords = 'keywords';

    const string getCatDesc = 'cat_desc';

    const string getSortOrder = 'sort_order';

    const string getShowInNav = 'show_in_nav';

    const string getParentId = 'parent_id';

    #[OA\Property(property: 'catId', description: '', type: 'integer')]
    private int $catId;

    #[OA\Property(property: 'catName', description: '', type: 'string')]
    private string $catName;

    #[OA\Property(property: 'catType', description: '', type: 'integer')]
    private int $catType;

    #[OA\Property(property: 'keywords', description: '', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'catDesc', description: '', type: 'string')]
    private string $catDesc;

    #[OA\Property(property: 'sortOrder', description: '', type: 'integer')]
    private int $sortOrder;

    #[OA\Property(property: 'showInNav', description: '', type: 'integer')]
    private int $showInNav;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

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
