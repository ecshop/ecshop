<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsAttrEntity')]
class GoodsAttrEntity
{
    use ArrayObject;

    #[OA\Property(property: 'goods_attr_id', description: '', type: 'integer')]
    protected int $goodsAttrId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'attr_id', description: '', type: 'integer')]
    protected int $attrId;

    #[OA\Property(property: 'attr_value', description: '', type: 'string')]
    protected string $attrValue;

    #[OA\Property(property: 'attr_price', description: '', type: 'string')]
    protected string $attrPrice;

    /**
     * 获取
     */
    public function getGoodsAttrId(): int
    {
        return $this->goodsAttrId;
    }

    /**
     * 设置
     */
    public function setGoodsAttrId(int $goodsAttrId): void
    {
        $this->goodsAttrId = $goodsAttrId;
    }

    /**
     * 获取
     */
    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    /**
     * 设置
     */
    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

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
    public function getAttrValue(): string
    {
        return $this->attrValue;
    }

    /**
     * 设置
     */
    public function setAttrValue(string $attrValue): void
    {
        $this->attrValue = $attrValue;
    }

    /**
     * 获取
     */
    public function getAttrPrice(): string
    {
        return $this->attrPrice;
    }

    /**
     * 设置
     */
    public function setAttrPrice(string $attrPrice): void
    {
        $this->attrPrice = $attrPrice;
    }
}
