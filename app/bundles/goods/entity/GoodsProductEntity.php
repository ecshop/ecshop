<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsProductEntity')]
class GoodsProductEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '货品ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goods_id', description: '关联商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'goods_attr', description: '商品属性组合', type: 'string')]
    private string $goods_attr;

    #[OA\Property(property: 'product_sn', description: '货品编号', type: 'string')]
    private string $product_sn;

    #[OA\Property(property: 'product_number', description: '货品库存数量', type: 'integer')]
    private int $product_number;

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

    public function getGoodsAttr(): string
    {
        return $this->goods_attr;
    }

    public function setGoodsAttr(string $goodsAttr): void
    {
        $this->goods_attr = $goodsAttr;
    }

    public function getProductSn(): string
    {
        return $this->product_sn;
    }

    public function setProductSn(string $productSn): void
    {
        $this->product_sn = $productSn;
    }

    public function getProductNumber(): int
    {
        return $this->product_number;
    }

    public function setProductNumber(int $productNumber): void
    {
        $this->product_number = $productNumber;
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
