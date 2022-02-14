<?php

namespace App\Models\Entity;

/**
 * Class ShopConfigEntity
 * @package App\Models\Entity
 */
class ShopConfigEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var string 
     */
    private string $code;

    /**
     * @var string 
     */
    private string $type;

    /**
     * @var string 
     */
    private string $store_range;

    /**
     * @var string 
     */
    private string $store_dir;

    /**
     * @var string 
     */
    private string $value;

    /**
     * @var int 
     */
    private int $sort_order;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value)
    {
        $this->id = $value;
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
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $value
     */
    public function setCode(string $value)
    {
        $this->code = $value;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value)
    {
        $this->type = $value;
    }

    /**
     * @return string
     */
    public function getStoreRange(): string
    {
        return $this->store_range;
    }

    /**
     * @param string $value
     */
    public function setStoreRange(string $value)
    {
        $this->store_range = $value;
    }

    /**
     * @return string
     */
    public function getStoreDir(): string
    {
        return $this->store_dir;
    }

    /**
     * @param string $value
     */
    public function setStoreDir(string $value)
    {
        $this->store_dir = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
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

}
