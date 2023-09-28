<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AttributeSchema')]
class Attribute
{
    use ArrayObject;

    #[OA\Property(property: 'attr_id', description: '', type: 'integer')]
    protected int $attrId;

    #[OA\Property(property: 'cat_id', description: '', type: 'integer')]
    protected int $catId;

    #[OA\Property(property: 'attr_name', description: '', type: 'string')]
    protected string $attrName;

    #[OA\Property(property: 'attr_input_type', description: '', type: 'integer')]
    protected int $attrInputType;

    #[OA\Property(property: 'attr_type', description: '', type: 'integer')]
    protected int $attrType;

    #[OA\Property(property: 'attr_values', description: '', type: 'string')]
    protected string $attrValues;

    #[OA\Property(property: 'attr_index', description: '', type: 'integer')]
    protected int $attrIndex;

    #[OA\Property(property: 'sort_order', description: '', type: 'integer')]
    protected int $sortOrder;

    #[OA\Property(property: 'is_linked', description: '', type: 'integer')]
    protected int $isLinked;

    #[OA\Property(property: 'attr_group', description: '', type: 'integer')]
    protected int $attrGroup;

    /**
     * 获取
     */
    public function getAttrId(): int
    {
        return $this->attrId;
    }

    /**
     * 设置
     */
    public function setAttrId(int $attrId): void
    {
        $this->attrId = $attrId;
    }

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
    public function getAttrName(): string
    {
        return $this->attrName;
    }

    /**
     * 设置
     */
    public function setAttrName(string $attrName): void
    {
        $this->attrName = $attrName;
    }

    /**
     * 获取
     */
    public function getAttrInputType(): int
    {
        return $this->attrInputType;
    }

    /**
     * 设置
     */
    public function setAttrInputType(int $attrInputType): void
    {
        $this->attrInputType = $attrInputType;
    }

    /**
     * 获取
     */
    public function getAttrType(): int
    {
        return $this->attrType;
    }

    /**
     * 设置
     */
    public function setAttrType(int $attrType): void
    {
        $this->attrType = $attrType;
    }

    /**
     * 获取
     */
    public function getAttrValues(): string
    {
        return $this->attrValues;
    }

    /**
     * 设置
     */
    public function setAttrValues(string $attrValues): void
    {
        $this->attrValues = $attrValues;
    }

    /**
     * 获取
     */
    public function getAttrIndex(): int
    {
        return $this->attrIndex;
    }

    /**
     * 设置
     */
    public function setAttrIndex(int $attrIndex): void
    {
        $this->attrIndex = $attrIndex;
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
    public function getIsLinked(): int
    {
        return $this->isLinked;
    }

    /**
     * 设置
     */
    public function setIsLinked(int $isLinked): void
    {
        $this->isLinked = $isLinked;
    }

    /**
     * 获取
     */
    public function getAttrGroup(): int
    {
        return $this->attrGroup;
    }

    /**
     * 设置
     */
    public function setAttrGroup(int $attrGroup): void
    {
        $this->attrGroup = $attrGroup;
    }
}
