<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CartSchema')]
class Cart
{
    use ArrayObject;

    #[OA\Property(property: 'rec_id', description: '', type: 'integer')]
    protected int $recId;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'session_id', description: '', type: 'string')]
    protected string $sessionId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'goods_sn', description: '', type: 'string')]
    protected string $goodsSn;

    #[OA\Property(property: 'product_id', description: '', type: 'integer')]
    protected int $productId;

    #[OA\Property(property: 'goods_name', description: '', type: 'string')]
    protected string $goodsName;

    #[OA\Property(property: 'market_price', description: '', type: 'float')]
    protected float $marketPrice;

    #[OA\Property(property: 'goods_price', description: '', type: 'float')]
    protected float $goodsPrice;

    #[OA\Property(property: 'goods_number', description: '', type: 'integer')]
    protected int $goodsNumber;

    #[OA\Property(property: 'goods_attr', description: '', type: 'string')]
    protected string $goodsAttr;

    #[OA\Property(property: 'is_real', description: '', type: 'integer')]
    protected int $isReal;

    #[OA\Property(property: 'extension_code', description: '', type: 'string')]
    protected string $extensionCode;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    #[OA\Property(property: 'rec_type', description: '', type: 'integer')]
    protected int $recType;

    #[OA\Property(property: 'is_gift', description: '', type: 'integer')]
    protected int $isGift;

    #[OA\Property(property: 'is_shipping', description: '', type: 'integer')]
    protected int $isShipping;

    #[OA\Property(property: 'can_handsel', description: '', type: 'integer')]
    protected int $canHandsel;

    #[OA\Property(property: 'goods_attr_id', description: '', type: 'string')]
    protected string $goodsAttrId;

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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 设置
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * 获取
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * 设置
     */
    public function setSessionId(string $sessionId): void
    {
        $this->sessionId = $sessionId;
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
    public function getMarketPrice(): float
    {
        return $this->marketPrice;
    }

    /**
     * 设置
     */
    public function setMarketPrice(float $marketPrice): void
    {
        $this->marketPrice = $marketPrice;
    }

    /**
     * 获取
     */
    public function getGoodsPrice(): float
    {
        return $this->goodsPrice;
    }

    /**
     * 设置
     */
    public function setGoodsPrice(float $goodsPrice): void
    {
        $this->goodsPrice = $goodsPrice;
    }

    /**
     * 获取
     */
    public function getGoodsNumber(): int
    {
        return $this->goodsNumber;
    }

    /**
     * 设置
     */
    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goodsNumber = $goodsNumber;
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
    public function getExtensionCode(): string
    {
        return $this->extensionCode;
    }

    /**
     * 设置
     */
    public function setExtensionCode(string $extensionCode): void
    {
        $this->extensionCode = $extensionCode;
    }

    /**
     * 获取
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * 设置
     */
    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * 获取
     */
    public function getRecType(): int
    {
        return $this->recType;
    }

    /**
     * 设置
     */
    public function setRecType(int $recType): void
    {
        $this->recType = $recType;
    }

    /**
     * 获取
     */
    public function getIsGift(): int
    {
        return $this->isGift;
    }

    /**
     * 设置
     */
    public function setIsGift(int $isGift): void
    {
        $this->isGift = $isGift;
    }

    /**
     * 获取
     */
    public function getIsShipping(): int
    {
        return $this->isShipping;
    }

    /**
     * 设置
     */
    public function setIsShipping(int $isShipping): void
    {
        $this->isShipping = $isShipping;
    }

    /**
     * 获取
     */
    public function getCanHandsel(): int
    {
        return $this->canHandsel;
    }

    /**
     * 设置
     */
    public function setCanHandsel(int $canHandsel): void
    {
        $this->canHandsel = $canHandsel;
    }

    /**
     * 获取
     */
    public function getGoodsAttrId(): string
    {
        return $this->goodsAttrId;
    }

    /**
     * 设置
     */
    public function setGoodsAttrId(string $goodsAttrId): void
    {
        $this->goodsAttrId = $goodsAttrId;
    }
}
