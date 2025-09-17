<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsAttr;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsAttrResponse')]
class GoodsAttrResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '商品属性关联ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'attrId', description: '属性ID', type: 'integer')]
    private int $attrId;

    #[OA\Property(property: 'attrValue', description: '属性值', type: 'string')]
    private string $attrValue;

    #[OA\Property(property: 'attrPrice', description: '属性价格', type: 'string')]
    private string $attrPrice;

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

    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    public function getAttrId(): int
    {
        return $this->attrId;
    }

    public function setAttrId(int $attrId): void
    {
        $this->attrId = $attrId;
    }

    public function getAttrValue(): string
    {
        return $this->attrValue;
    }

    public function setAttrValue(string $attrValue): void
    {
        $this->attrValue = $attrValue;
    }

    public function getAttrPrice(): string
    {
        return $this->attrPrice;
    }

    public function setAttrPrice(string $attrPrice): void
    {
        $this->attrPrice = $attrPrice;
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
