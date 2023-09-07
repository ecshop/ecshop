<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ProductSchema')]
class Product
{
    use ArrayObject;

    #[OA\Property(property: 'product_id', description: '', type: 'integer')]
    protected int $productId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'goods_attr', description: '', type: 'string')]
    protected string $goodsAttr;

    #[OA\Property(property: 'product_sn', description: '', type: 'string')]
    protected string $productSn;

    #[OA\Property(property: 'product_number', description: '', type: 'integer')]
    protected int $productNumber;

    /**
     * 获取
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * 设置
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
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
    public function getGoodsAttr(): string
    {
        return $this->goodsAttr;
    }

    /**
     * 设置
     */
    public function setGoodsAttr(string $goodsAttr): void
    {
        $this->goodsAttr = $goodsAttr;
    }

    /**
     * 获取
     */
    public function getProductSn(): string
    {
        return $this->productSn;
    }

    /**
     * 设置
     */
    public function setProductSn(string $productSn): void
    {
        $this->productSn = $productSn;
    }

    /**
     * 获取
     */
    public function getProductNumber(): int
    {
        return $this->productNumber;
    }

    /**
     * 设置
     */
    public function setProductNumber(int $productNumber): void
    {
        $this->productNumber = $productNumber;
    }
}
