<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AttributeEntity')]
class AttributeEntity
{
    use DTOHelper;

    const string getAttrId = 'attr_id';

    const string getCatId = 'cat_id';

    const string getAttrName = 'attr_name';

    const string getAttrInputType = 'attr_input_type';

    const string getAttrType = 'attr_type';

    const string getAttrValues = 'attr_values';

    const string getAttrIndex = 'attr_index';

    const string getSortOrder = 'sort_order';

    const string getIsLinked = 'is_linked';

    const string getAttrGroup = 'attr_group';

    #[OA\Property(property: 'attrId', description: '', type: 'integer')]
    private int $attrId;

    #[OA\Property(property: 'catId', description: '', type: 'integer')]
    private int $catId;

    #[OA\Property(property: 'attrName', description: '', type: 'string')]
    private string $attrName;

    #[OA\Property(property: 'attrInputType', description: '', type: 'integer')]
    private int $attrInputType;

    #[OA\Property(property: 'attrType', description: '', type: 'integer')]
    private int $attrType;

    #[OA\Property(property: 'attrValues', description: '', type: 'string')]
    private string $attrValues;

    #[OA\Property(property: 'attrIndex', description: '', type: 'integer')]
    private int $attrIndex;

    #[OA\Property(property: 'sortOrder', description: '', type: 'integer')]
    private int $sortOrder;

    #[OA\Property(property: 'isLinked', description: '', type: 'integer')]
    private int $isLinked;

    #[OA\Property(property: 'attrGroup', description: '', type: 'integer')]
    private int $attrGroup;

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
