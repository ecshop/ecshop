<?php

namespace App\Models\Entity;

/**
 * Class GoodsTypeEntity
 * @package App\Models\Entity
 */
class GoodsTypeEntity
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
    private int $enabled;

    /**
     * @var string 
     */
    private string $attr_group;

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
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * @param int $value
     */
    public function setEnabled(int $value)
    {
        $this->enabled = $value;
    }

    /**
     * @return string
     */
    public function getAttrGroup(): string
    {
        return $this->attr_group;
    }

    /**
     * @param string $value
     */
    public function setAttrGroup(string $value)
    {
        $this->attr_group = $value;
    }

}
