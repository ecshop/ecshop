<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ProductsEntity')]
class ProductsEntity
{
    use DTOHelper;

    const string getProductId = 'product_id';

    const string getGoodsId = 'goods_id';

    const string getGoodsAttr = 'goods_attr';

    const string getProductSn = 'product_sn';

    const string getProductNumber = 'product_number';

    #[OA\Property(property: 'productId', description: '', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'goodsAttr', description: '', type: 'string')]
    private string $goodsAttr;

    #[OA\Property(property: 'productSn', description: '', type: 'string')]
    private string $productSn;

    #[OA\Property(property: 'productNumber', description: '', type: 'integer')]
    private int $productNumber;

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
