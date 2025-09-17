<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserCartEntity')]
class UserCartEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '购物车记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'session_id', description: '会话ID', type: 'string')]
    private string $session_id;

    #[OA\Property(property: 'goods_id', description: '商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'goods_sn', description: '商品货号', type: 'string')]
    private string $goods_sn;

    #[OA\Property(property: 'product_id', description: '货品ID', type: 'integer')]
    private int $product_id;

    #[OA\Property(property: 'goods_name', description: '商品名称', type: 'string')]
    private string $goods_name;

    #[OA\Property(property: 'market_price', description: '市场价', type: 'float')]
    private float $market_price;

    #[OA\Property(property: 'goods_price', description: '商品价格', type: 'float')]
    private float $goods_price;

    #[OA\Property(property: 'goods_number', description: '购买数量', type: 'integer')]
    private int $goods_number;

    #[OA\Property(property: 'goods_attr', description: '商品属性', type: 'string')]
    private string $goods_attr;

    #[OA\Property(property: 'is_real', description: '是否实物', type: 'integer')]
    private int $is_real;

    #[OA\Property(property: 'extension_code', description: '扩展代码', type: 'string')]
    private string $extension_code;

    #[OA\Property(property: 'parent_id', description: '父商品ID', type: 'integer')]
    private int $parent_id;

    #[OA\Property(property: 'rec_type', description: '记录类型', type: 'integer')]
    private int $rec_type;

    #[OA\Property(property: 'is_gift', description: '是否赠品', type: 'integer')]
    private int $is_gift;

    #[OA\Property(property: 'is_shipping', description: '是否需要配送', type: 'integer')]
    private int $is_shipping;

    #[OA\Property(property: 'can_handsel', description: '能否处理', type: 'integer')]
    private int $can_handsel;

    #[OA\Property(property: 'goods_attr_id', description: '商品属性ID', type: 'string')]
    private string $goods_attr_id;

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

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getSessionId(): string
    {
        return $this->session_id;
    }

    public function setSessionId(string $sessionId): void
    {
        $this->session_id = $sessionId;
    }

    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goods_id = $goodsId;
    }

    public function getGoodsSn(): string
    {
        return $this->goods_sn;
    }

    public function setGoodsSn(string $goodsSn): void
    {
        $this->goods_sn = $goodsSn;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function getGoodsName(): string
    {
        return $this->goods_name;
    }

    public function setGoodsName(string $goodsName): void
    {
        $this->goods_name = $goodsName;
    }

    public function getMarketPrice(): float
    {
        return $this->market_price;
    }

    public function setMarketPrice(float $marketPrice): void
    {
        $this->market_price = $marketPrice;
    }

    public function getGoodsPrice(): float
    {
        return $this->goods_price;
    }

    public function setGoodsPrice(float $goodsPrice): void
    {
        $this->goods_price = $goodsPrice;
    }

    public function getGoodsNumber(): int
    {
        return $this->goods_number;
    }

    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goods_number = $goodsNumber;
    }

    public function getGoodsAttr(): string
    {
        return $this->goods_attr;
    }

    public function setGoodsAttr(string $goodsAttr): void
    {
        $this->goods_attr = $goodsAttr;
    }

    public function getIsReal(): int
    {
        return $this->is_real;
    }

    public function setIsReal(int $isReal): void
    {
        $this->is_real = $isReal;
    }

    public function getExtensionCode(): string
    {
        return $this->extension_code;
    }

    public function setExtensionCode(string $extensionCode): void
    {
        $this->extension_code = $extensionCode;
    }

    public function getParentId(): int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parentId): void
    {
        $this->parent_id = $parentId;
    }

    public function getRecType(): int
    {
        return $this->rec_type;
    }

    public function setRecType(int $recType): void
    {
        $this->rec_type = $recType;
    }

    public function getIsGift(): int
    {
        return $this->is_gift;
    }

    public function setIsGift(int $isGift): void
    {
        $this->is_gift = $isGift;
    }

    public function getIsShipping(): int
    {
        return $this->is_shipping;
    }

    public function setIsShipping(int $isShipping): void
    {
        $this->is_shipping = $isShipping;
    }

    public function getCanHandsel(): int
    {
        return $this->can_handsel;
    }

    public function setCanHandsel(int $canHandsel): void
    {
        $this->can_handsel = $canHandsel;
    }

    public function getGoodsAttrId(): string
    {
        return $this->goods_attr_id;
    }

    public function setGoodsAttrId(string $goodsAttrId): void
    {
        $this->goods_attr_id = $goodsAttrId;
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
