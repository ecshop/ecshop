<?php

namespace App\Models\Entity;

/**
 * Class ArticleCatEntity
 * @package App\Models\Entity
 */
class ArticleCatEntity
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
     * @var int 
     */
    private int $cat_type;

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
    private int $sort_order;

    /**
     * @var int 
     */
    private int $show_in_nav;

    /**
     * @var int 
     */
    private int $parent_id;

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
     * @return int
     */
    public function getCatType(): int
    {
        return $this->cat_type;
    }

    /**
     * @param int $value
     */
    public function setCatType(int $value)
    {
        $this->cat_type = $value;
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

}
