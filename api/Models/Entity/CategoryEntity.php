<?php

namespace App\Models\Entity;

/**
 * Class CategoryEntity
 * @package App\Models\Entity
 */
class CategoryEntity
{
    /**
     * @var int 
     */
    private int $cat_id;

    /**
     * @var string 
     */
    private string $cat_name;

    /**
     * @var string 
     */
    private string $keywords;

    /**
     * @var string 
     */
    private string $cat_desc;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var int 
     */
    private int $sort_order;

    /**
     * @var string 
     */
    private string $template_file;

    /**
     * @var string 
     */
    private string $measure_unit;

    /**
     * @var int 
     */
    private int $show_in_nav;

    /**
     * @var string 
     */
    private string $style;

    /**
     * @var int 
     */
    private int $is_show;

    /**
     * @var int 
     */
    private int $grade;

    /**
     * @var string 
     */
    private string $filter_attr;

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }

    /**
     * @param int $value
     */
    public function setCatId(int $value)
    {
        $this->cat_id = $value;
    }

    /**
     * @return string
     */
    public function getCatName(): string
    {
        return $this->cat_name;
    }

    /**
     * @param string $value
     */
    public function setCatName(string $value)
    {
        $this->cat_name = $value;
    }

    /**
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * @param string $value
     */
    public function setKeywords(string $value)
    {
        $this->keywords = $value;
    }

    /**
     * @return string
     */
    public function getCatDesc(): string
    {
        return $this->cat_desc;
    }

    /**
     * @param string $value
     */
    public function setCatDesc(string $value)
    {
        $this->cat_desc = $value;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @param int $value
     */
    public function setParentId(int $value)
    {
        $this->parent_id = $value;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    /**
     * @param int $value
     */
    public function setSortOrder(int $value)
    {
        $this->sort_order = $value;
    }

    /**
     * @return string
     */
    public function getTemplateFile(): string
    {
        return $this->template_file;
    }

    /**
     * @param string $value
     */
    public function setTemplateFile(string $value)
    {
        $this->template_file = $value;
    }

    /**
     * @return string
     */
    public function getMeasureUnit(): string
    {
        return $this->measure_unit;
    }

    /**
     * @param string $value
     */
    public function setMeasureUnit(string $value)
    {
        $this->measure_unit = $value;
    }

    /**
     * @return int
     */
    public function getShowInNav(): int
    {
        return $this->show_in_nav;
    }

    /**
     * @param int $value
     */
    public function setShowInNav(int $value)
    {
        $this->show_in_nav = $value;
    }

    /**
     * @return string
     */
    public function getStyle(): string
    {
        return $this->style;
    }

    /**
     * @param string $value
     */
    public function setStyle(string $value)
    {
        $this->style = $value;
    }

    /**
     * @return int
     */
    public function getIsShow(): int
    {
        return $this->is_show;
    }

    /**
     * @param int $value
     */
    public function setIsShow(int $value)
    {
        $this->is_show = $value;
    }

    /**
     * @return int
     */
    public function getGrade(): int
    {
        return $this->grade;
    }

    /**
     * @param int $value
     */
    public function setGrade(int $value)
    {
        $this->grade = $value;
    }

    /**
     * @return string
     */
    public function getFilterAttr(): string
    {
        return $this->filter_attr;
    }

    /**
     * @param string $value
     */
    public function setFilterAttr(string $value)
    {
        $this->filter_attr = $value;
    }

}
