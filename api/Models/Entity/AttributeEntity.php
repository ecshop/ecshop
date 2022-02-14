<?php

namespace App\Models\Entity;

/**
 * Class AttributeEntity
 * @package App\Models\Entity
 */
class AttributeEntity
{
    /**
     * @var int 
     */
    private int $attr_id;

    /**
     * @var int 
     */
    private int $cat_id;

    /**
     * @var string 
     */
    private string $attr_name;

    /**
     * @var int 
     */
    private int $attr_input_type;

    /**
     * @var int 
     */
    private int $attr_type;

    /**
     * @var string 
     */
    private string $attr_values;

    /**
     * @var int 
     */
    private int $attr_index;

    /**
     * @var int 
     */
    private int $sort_order;

    /**
     * @var int 
     */
    private int $is_linked;

    /**
     * @var int 
     */
    private int $attr_group;

    /**
     * @return int
     */
    public function getAttrId(): int
    {
        return $this->attr_id;
    }

    /**
     * @param int $value
     */
    public function setAttrId(int $value)
    {
        $this->attr_id = $value;
    }

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
    public function getAttrName(): string
    {
        return $this->attr_name;
    }

    /**
     * @param string $value
     */
    public function setAttrName(string $value)
    {
        $this->attr_name = $value;
    }

    /**
     * @return int
     */
    public function getAttrInputType(): int
    {
        return $this->attr_input_type;
    }

    /**
     * @param int $value
     */
    public function setAttrInputType(int $value)
    {
        $this->attr_input_type = $value;
    }

    /**
     * @return int
     */
    public function getAttrType(): int
    {
        return $this->attr_type;
    }

    /**
     * @param int $value
     */
    public function setAttrType(int $value)
    {
        $this->attr_type = $value;
    }

    /**
     * @return string
     */
    public function getAttrValues(): string
    {
        return $this->attr_values;
    }

    /**
     * @param string $value
     */
    public function setAttrValues(string $value)
    {
        $this->attr_values = $value;
    }

    /**
     * @return int
     */
    public function getAttrIndex(): int
    {
        return $this->attr_index;
    }

    /**
     * @param int $value
     */
    public function setAttrIndex(int $value)
    {
        $this->attr_index = $value;
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
    public function getIsLinked(): int
    {
        return $this->is_linked;
    }

    /**
     * @param int $value
     */
    public function setIsLinked(int $value)
    {
        $this->is_linked = $value;
    }

    /**
     * @return int
     */
    public function getAttrGroup(): int
    {
        return $this->attr_group;
    }

    /**
     * @param int $value
     */
    public function setAttrGroup(int $value)
    {
        $this->attr_group = $value;
    }

}
