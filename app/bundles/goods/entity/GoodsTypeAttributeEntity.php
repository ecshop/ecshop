<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsTypeAttributeEntity')]
class GoodsTypeAttributeEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '属性ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cat_id', description: '商品类型ID', type: 'integer')]
    private int $cat_id;

    #[OA\Property(property: 'attr_name', description: '属性名称', type: 'string')]
    private string $attr_name;

    #[OA\Property(property: 'attr_input_type', description: '输入方式', type: 'integer')]
    private int $attr_input_type;

    #[OA\Property(property: 'attr_type', description: '属性类型', type: 'integer')]
    private int $attr_type;

    #[OA\Property(property: 'attr_values', description: '可选值列表', type: 'string')]
    private string $attr_values;

    #[OA\Property(property: 'attr_index', description: '是否索引', type: 'integer')]
    private int $attr_index;

    #[OA\Property(property: 'sort_order', description: '排序', type: 'integer')]
    private int $sort_order;

    #[OA\Property(property: 'is_linked', description: '是否关联', type: 'integer')]
    private int $is_linked;

    #[OA\Property(property: 'attr_group', description: '属性分组', type: 'integer')]
    private int $attr_group;

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

    public function getCatId(): int
    {
        return $this->cat_id;
    }

    public function setCatId(int $catId): void
    {
        $this->cat_id = $catId;
    }

    public function getAttrName(): string
    {
        return $this->attr_name;
    }

    public function setAttrName(string $attrName): void
    {
        $this->attr_name = $attrName;
    }

    public function getAttrInputType(): int
    {
        return $this->attr_input_type;
    }

    public function setAttrInputType(int $attrInputType): void
    {
        $this->attr_input_type = $attrInputType;
    }

    public function getAttrType(): int
    {
        return $this->attr_type;
    }

    public function setAttrType(int $attrType): void
    {
        $this->attr_type = $attrType;
    }

    public function getAttrValues(): string
    {
        return $this->attr_values;
    }

    public function setAttrValues(string $attrValues): void
    {
        $this->attr_values = $attrValues;
    }

    public function getAttrIndex(): int
    {
        return $this->attr_index;
    }

    public function setAttrIndex(int $attrIndex): void
    {
        $this->attr_index = $attrIndex;
    }

    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sort_order = $sortOrder;
    }

    public function getIsLinked(): int
    {
        return $this->is_linked;
    }

    public function setIsLinked(int $isLinked): void
    {
        $this->is_linked = $isLinked;
    }

    public function getAttrGroup(): int
    {
        return $this->attr_group;
    }

    public function setAttrGroup(int $attrGroup): void
    {
        $this->attr_group = $attrGroup;
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
