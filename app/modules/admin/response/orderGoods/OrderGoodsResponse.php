<?php

declare(strict_types=1);

namespace app\modules\admin\response\orderGoods;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderGoodsResponse')]
class OrderGoodsResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'orderId', description: '订单ID', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'goodsName', description: '商品名称', type: 'string')]
    private string $goodsName;

    #[OA\Property(property: 'goodsSn', description: '商品编号', type: 'string')]
    private string $goodsSn;

    #[OA\Property(property: 'productId', description: '货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'goodsNumber', description: '商品数量', type: 'integer')]
    private int $goodsNumber;

    #[OA\Property(property: 'marketPrice', description: '市场价', type: 'float')]
    private float $marketPrice;

    #[OA\Property(property: 'goodsPrice', description: '商品价格', type: 'float')]
    private float $goodsPrice;

    #[OA\Property(property: 'goodsAttr', description: '商品属性', type: 'string')]
    private string $goodsAttr;

    #[OA\Property(property: 'sendNumber', description: '发货数量', type: 'integer')]
    private int $sendNumber;

    #[OA\Property(property: 'isReal', description: '是否实物(0否1是)', type: 'integer')]
    private int $isReal;

    #[OA\Property(property: 'extensionCode', description: '扩展代码', type: 'string')]
    private string $extensionCode;

    #[OA\Property(property: 'parentId', description: '父商品ID', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'isGift', description: '是否赠品(0否1是)', type: 'integer')]
    private int $isGift;

    #[OA\Property(property: 'goodsAttrId', description: '商品属性ID', type: 'string')]
    private string $goodsAttrId;

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

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
    }

    public function getGoodsSn(): string
    {
        return $this->goodsSn;
    }

    public function setGoodsSn(string $goodsSn): void
    {
        $this->goodsSn = $goodsSn;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getGoodsNumber(): int
    {
        return $this->goodsNumber;
    }

    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goodsNumber = $goodsNumber;
    }

    public function getMarketPrice(): float
    {
        return $this->marketPrice;
    }

    public function setMarketPrice(float $marketPrice): void
    {
        $this->marketPrice = $marketPrice;
    }

    public function getGoodsPrice(): float
    {
        return $this->goodsPrice;
    }

    public function setGoodsPrice(float $goodsPrice): void
    {
        $this->goodsPrice = $goodsPrice;
    }

    public function getGoodsAttr(): string
    {
        return $this->goodsAttr;
    }

    public function setGoodsAttr(string $goodsAttr): void
    {
        $this->goodsAttr = $goodsAttr;
    }

    public function getSendNumber(): int
    {
        return $this->sendNumber;
    }

    public function setSendNumber(int $sendNumber): void
    {
        $this->sendNumber = $sendNumber;
    }

    public function getIsReal(): int
    {
        return $this->isReal;
    }

    public function setIsReal(int $isReal): void
    {
        $this->isReal = $isReal;
    }

    public function getExtensionCode(): string
    {
        return $this->extensionCode;
    }

    public function setExtensionCode(string $extensionCode): void
    {
        $this->extensionCode = $extensionCode;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    public function getIsGift(): int
    {
        return $this->isGift;
    }

    public function setIsGift(int $isGift): void
    {
        $this->isGift = $isGift;
    }

    public function getGoodsAttrId(): string
    {
        return $this->goodsAttrId;
    }

    public function setGoodsAttrId(string $goodsAttrId): void
    {
        $this->goodsAttrId = $goodsAttrId;
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
