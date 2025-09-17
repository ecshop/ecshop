<?php

declare(strict_types=1);

namespace app\bundles\order\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderBackGoodsEntity')]
class OrderBackGoodsEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '退货记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'back_id', description: '关联退货单ID', type: 'integer')]
    private int $back_id;

    #[OA\Property(property: 'goods_id', description: '商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'product_id', description: '货品ID', type: 'integer')]
    private int $product_id;

    #[OA\Property(property: 'product_sn', description: '货品编号', type: 'string')]
    private string $product_sn;

    #[OA\Property(property: 'goods_name', description: '商品名称', type: 'string')]
    private string $goods_name;

    #[OA\Property(property: 'brand_name', description: '品牌名称', type: 'string')]
    private string $brand_name;

    #[OA\Property(property: 'goods_sn', description: '商品编号', type: 'string')]
    private string $goods_sn;

    #[OA\Property(property: 'is_real', description: '是否实物', type: 'integer')]
    private int $is_real;

    #[OA\Property(property: 'send_number', description: '发货数量', type: 'integer')]
    private int $send_number;

    #[OA\Property(property: 'goods_attr', description: '商品属性', type: 'string')]
    private string $goods_attr;

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

    public function getBackId(): int
    {
        return $this->back_id;
    }

    public function setBackId(int $backId): void
    {
        $this->back_id = $backId;
    }

    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goods_id = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function getProductSn(): string
    {
        return $this->product_sn;
    }

    public function setProductSn(string $productSn): void
    {
        $this->product_sn = $productSn;
    }

    public function getGoodsName(): string
    {
        return $this->goods_name;
    }

    public function setGoodsName(string $goodsName): void
    {
        $this->goods_name = $goodsName;
    }

    public function getBrandName(): string
    {
        return $this->brand_name;
    }

    public function setBrandName(string $brandName): void
    {
        $this->brand_name = $brandName;
    }

    public function getGoodsSn(): string
    {
        return $this->goods_sn;
    }

    public function setGoodsSn(string $goodsSn): void
    {
        $this->goods_sn = $goodsSn;
    }

    public function getIsReal(): int
    {
        return $this->is_real;
    }

    public function setIsReal(int $isReal): void
    {
        $this->is_real = $isReal;
    }

    public function getSendNumber(): int
    {
        return $this->send_number;
    }

    public function setSendNumber(int $sendNumber): void
    {
        $this->send_number = $sendNumber;
    }

    public function getGoodsAttr(): string
    {
        return $this->goods_attr;
    }

    public function setGoodsAttr(string $goodsAttr): void
    {
        $this->goods_attr = $goodsAttr;
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
