<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsCategoryEntity')]
class GoodsCategoryEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '分类ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cat_name', description: '分类名称', type: 'string')]
    private string $cat_name;

    #[OA\Property(property: 'keywords', description: '关键词', type: 'string')]
    private string $keywords;

    #[OA\Property(property: 'cat_desc', description: '分类描述', type: 'string')]
    private string $cat_desc;

    #[OA\Property(property: 'parent_id', description: '父分类ID', type: 'integer')]
    private int $parent_id;

    #[OA\Property(property: 'sort_order', description: '排序权重', type: 'integer')]
    private int $sort_order;

    #[OA\Property(property: 'template_file', description: '模板文件', type: 'string')]
    private string $template_file;

    #[OA\Property(property: 'measure_unit', description: '计量单位', type: 'string')]
    private string $measure_unit;

    #[OA\Property(property: 'show_in_nav', description: '是否显示在导航栏', type: 'integer')]
    private int $show_in_nav;

    #[OA\Property(property: 'style', description: '样式', type: 'string')]
    private string $style;

    #[OA\Property(property: 'is_show', description: '是否显示', type: 'integer')]
    private int $is_show;

    #[OA\Property(property: 'grade', description: '分类等级', type: 'integer')]
    private int $grade;

    #[OA\Property(property: 'filter_attr', description: '筛选属性', type: 'string')]
    private string $filter_attr;

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

    public function getParentId(): int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parentId): void
    {
        $this->parent_id = $parentId;
    }

    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sort_order = $sortOrder;
    }

    public function getTemplateFile(): string
    {
        return $this->template_file;
    }

    public function setTemplateFile(string $templateFile): void
    {
        $this->template_file = $templateFile;
    }

    public function getMeasureUnit(): string
    {
        return $this->measure_unit;
    }

    public function setMeasureUnit(string $measureUnit): void
    {
        $this->measure_unit = $measureUnit;
    }

    public function getShowInNav(): int
    {
        return $this->show_in_nav;
    }

    public function setShowInNav(int $showInNav): void
    {
        $this->show_in_nav = $showInNav;
    }

    public function getStyle(): string
    {
        return $this->style;
    }

    public function setStyle(string $style): void
    {
        $this->style = $style;
    }

    public function getIsShow(): int
    {
        return $this->is_show;
    }

    public function setIsShow(int $isShow): void
    {
        $this->is_show = $isShow;
    }

    public function getGrade(): int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): void
    {
        $this->grade = $grade;
    }

    public function getFilterAttr(): string
    {
        return $this->filter_attr;
    }

    public function setFilterAttr(string $filterAttr): void
    {
        $this->filter_attr = $filterAttr;
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
