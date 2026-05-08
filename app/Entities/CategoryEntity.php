<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CategoryEntity')]
class CategoryEntity
{
    use DTOHelper;

    const string getCatId = 'cat_id';

    const string getCatName = 'cat_name';

    const string getKeywords = 'keywords';

    const string getCatDesc = 'cat_desc';

    const string getParentId = 'parent_id';

    const string getSortOrder = 'sort_order';

    const string getTemplateFile = 'template_file';

    const string getMeasureUnit = 'measure_unit';

    const string getShowInNav = 'show_in_nav';

    const string getStyle = 'style';

    const string getIsShow = 'is_show';

    const string getGrade = 'grade';

    const string getFilterAttr = 'filter_attr';

    #[OA\Property(property: 'catId', description: '', type: 'integer')]
    private int $catId;

    #[OA\Property(property: 'catName', description: '', type: 'string')]
    private string $catName;

    #[OA\Property(property: 'keywords', description: '', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'catDesc', description: '', type: 'string')]
    private string $catDesc;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'sortOrder', description: '', type: 'integer')]
    private int $sortOrder;

    #[OA\Property(property: 'templateFile', description: '', type: 'string')]
    private string $templateFile;

    #[OA\Property(property: 'measureUnit', description: '', type: 'string')]
    private string $measureUnit;

    #[OA\Property(property: 'showInNav', description: '', type: 'integer')]
    private int $showInNav;

    #[OA\Property(property: 'style', description: '', type: 'string')]
    private string $style;

    #[OA\Property(property: 'isShow', description: '', type: 'integer')]
    private int $isShow;

    #[OA\Property(property: 'grade', description: '', type: 'integer')]
    private int $grade;

    #[OA\Property(property: 'filterAttr', description: '', type: 'string')]
    private string $filterAttr;

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
