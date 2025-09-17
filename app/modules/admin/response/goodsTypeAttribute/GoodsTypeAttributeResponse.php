<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsTypeAttribute;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsTypeAttributeResponse')]
class GoodsTypeAttributeResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '属性ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'catId', description: '商品类型ID', type: 'integer')]
    private int $catId;

    #[OA\Property(property: 'attrName', description: '属性名称', type: 'string')]
    private string $attrName;

    #[OA\Property(property: 'attrInputType', description: '输入方式', type: 'integer')]
    private int $attrInputType;

    #[OA\Property(property: 'attrType', description: '属性类型', type: 'integer')]
    private int $attrType;

    #[OA\Property(property: 'attrValues', description: '可选值列表', type: 'string')]
    private string $attrValues;

    #[OA\Property(property: 'attrIndex', description: '是否索引', type: 'integer')]
    private int $attrIndex;

    #[OA\Property(property: 'sortOrder', description: '排序', type: 'integer')]
    private int $sortOrder;

    #[OA\Property(property: 'isLinked', description: '是否关联', type: 'integer')]
    private int $isLinked;

    #[OA\Property(property: 'attrGroup', description: '属性分组', type: 'integer')]
    private int $attrGroup;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCatId(): int
    {
        return $this->catId;
    }

    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    public function getAttrName(): string
    {
        return $this->attrName;
    }

    public function setAttrName(string $attrName): void
    {
        $this->attrName = $attrName;
    }

    public function getAttrInputType(): int
    {
        return $this->attrInputType;
    }

    public function setAttrInputType(int $attrInputType): void
    {
        $this->attrInputType = $attrInputType;
    }

    public function getAttrType(): int
    {
        return $this->attrType;
    }

    public function setAttrType(int $attrType): void
    {
        $this->attrType = $attrType;
    }

    public function getAttrValues(): string
    {
        return $this->attrValues;
    }

    public function setAttrValues(string $attrValues): void
    {
        $this->attrValues = $attrValues;
    }

    public function getAttrIndex(): int
    {
        return $this->attrIndex;
    }

    public function setAttrIndex(int $attrIndex): void
    {
        $this->attrIndex = $attrIndex;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    public function getIsLinked(): int
    {
        return $this->isLinked;
    }

    public function setIsLinked(int $isLinked): void
    {
        $this->isLinked = $isLinked;
    }

    public function getAttrGroup(): int
    {
        return $this->attrGroup;
    }

    public function setAttrGroup(int $attrGroup): void
    {
        $this->attrGroup = $attrGroup;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}
