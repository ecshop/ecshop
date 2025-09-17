<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsAttrEntity')]
class GoodsAttrEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '商品属性关联ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goods_id', description: '商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'attr_id', description: '属性ID', type: 'integer')]
    private int $attr_id;

    #[OA\Property(property: 'attr_value', description: '属性值', type: 'string')]
    private string $attr_value;

    #[OA\Property(property: 'attr_price', description: '属性价格', type: 'string')]
    private string $attr_price;

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

    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goods_id = $goodsId;
    }

    public function getAttrId(): int
    {
        return $this->attr_id;
    }

    public function setAttrId(int $attrId): void
    {
        $this->attr_id = $attrId;
    }

    public function getAttrValue(): string
    {
        return $this->attr_value;
    }

    public function setAttrValue(string $attrValue): void
    {
        $this->attr_value = $attrValue;
    }

    public function getAttrPrice(): string
    {
        return $this->attr_price;
    }

    public function setAttrPrice(string $attrPrice): void
    {
        $this->attr_price = $attrPrice;
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
