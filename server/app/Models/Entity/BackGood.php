<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'BackGoodSchema')]
class BackGood
{
    use ArrayObject;

    #[OA\Property(property: 'rec_id', description: '', type: 'integer')]
    protected int $recId;

    #[OA\Property(property: 'back_id', description: '', type: 'integer')]
    protected int $backId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'product_id', description: '', type: 'integer')]
    protected int $productId;

    #[OA\Property(property: 'product_sn', description: '', type: 'string')]
    protected string $productSn;

    #[OA\Property(property: 'goods_name', description: '', type: 'string')]
    protected string $goodsName;

    #[OA\Property(property: 'brand_name', description: '', type: 'string')]
    protected string $brandName;

    #[OA\Property(property: 'goods_sn', description: '', type: 'string')]
    protected string $goodsSn;

    #[OA\Property(property: 'is_real', description: '', type: 'integer')]
    protected int $isReal;

    #[OA\Property(property: 'send_number', description: '', type: 'integer')]
    protected int $sendNumber;

    #[OA\Property(property: 'goods_attr', description: '', type: 'string')]
    protected string $goodsAttr;

    /**
     * 获取
     */
    public function getRecId(): int
    {
        return $this->recId;
    }

    /**
     * 设置
     */
    public function setRecId(int $recId): void
    {
        $this->recId = $recId;
    }

    /**
     * 获取
     */
    public function getBackId(): int
    {
        return $this->backId;
    }

    /**
     * 设置
     */
    public function setBackId(int $backId): void
    {
        $this->backId = $backId;
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
    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    /**
     * 设置
     */
    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
    }

    /**
     * 获取
     */
    public function getBrandName(): string
    {
        return $this->brandName;
    }

    /**
     * 设置
     */
    public function setBrandName(string $brandName): void
    {
        $this->brandName = $brandName;
    }

    /**
     * 获取
     */
    public function getGoodsSn(): string
    {
        return $this->goodsSn;
    }

    /**
     * 设置
     */
    public function setGoodsSn(string $goodsSn): void
    {
        $this->goodsSn = $goodsSn;
    }

    /**
     * 获取
     */
    public function getIsReal(): int
    {
        return $this->isReal;
    }

    /**
     * 设置
     */
    public function setIsReal(int $isReal): void
    {
        $this->isReal = $isReal;
    }

    /**
     * 获取
     */
    public function getSendNumber(): int
    {
        return $this->sendNumber;
    }

    /**
     * 设置
     */
    public function setSendNumber(int $sendNumber): void
    {
        $this->sendNumber = $sendNumber;
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
}
