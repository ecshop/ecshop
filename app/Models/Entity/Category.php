<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CategorySchema')]
class Category
{
    use ArrayObject;

    #[OA\Property(property: 'cat_id', description: '', type: 'integer')]
    protected int $catId;

    #[OA\Property(property: 'cat_name', description: '', type: 'string')]
    protected string $catName;

    #[OA\Property(property: 'keywords', description: '', type: 'string')]
    protected string $keywords;

    #[OA\Property(property: 'cat_desc', description: '', type: 'string')]
    protected string $catDesc;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    #[OA\Property(property: 'sort_order', description: '', type: 'integer')]
    protected int $sortOrder;

    #[OA\Property(property: 'template_file', description: '', type: 'string')]
    protected string $templateFile;

    #[OA\Property(property: 'measure_unit', description: '', type: 'string')]
    protected string $measureUnit;

    #[OA\Property(property: 'show_in_nav', description: '', type: 'integer')]
    protected int $showInNav;

    #[OA\Property(property: 'style', description: '', type: 'string')]
    protected string $style;

    #[OA\Property(property: 'is_show', description: '', type: 'integer')]
    protected int $isShow;

    #[OA\Property(property: 'grade', description: '', type: 'integer')]
    protected int $grade;

    #[OA\Property(property: 'filter_attr', description: '', type: 'string')]
    protected string $filterAttr;

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
    public function getTemplateFile(): string
    {
        return $this->templateFile;
    }

    /**
     * 设置
     */
    public function setTemplateFile(string $templateFile): void
    {
        $this->templateFile = $templateFile;
    }

    /**
     * 获取
     */
    public function getMeasureUnit(): string
    {
        return $this->measureUnit;
    }

    /**
     * 设置
     */
    public function setMeasureUnit(string $measureUnit): void
    {
        $this->measureUnit = $measureUnit;
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
    public function getStyle(): string
    {
        return $this->style;
    }

    /**
     * 设置
     */
    public function setStyle(string $style): void
    {
        $this->style = $style;
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

    /**
     * 获取
     */
    public function getGrade(): int
    {
        return $this->grade;
    }

    /**
     * 设置
     */
    public function setGrade(int $grade): void
    {
        $this->grade = $grade;
    }

    /**
     * 获取
     */
    public function getFilterAttr(): string
    {
        return $this->filterAttr;
    }

    /**
     * 设置
     */
    public function setFilterAttr(string $filterAttr): void
    {
        $this->filterAttr = $filterAttr;
    }
}
