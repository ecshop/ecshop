<?php

declare(strict_types=1);

namespace app\modules\admin\response\orderDeliveryGoods;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderDeliveryGoodsResponse')]
class OrderDeliveryGoodsResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'deliveryId', description: '发货单ID', type: 'integer')]
    private int $deliveryId;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'productSn', description: '货品编号', type: 'string')]
    private string $productSn;

    #[OA\Property(property: 'goodsName', description: '商品名称', type: 'string')]
    private string $goodsName;

    #[OA\Property(property: 'brandName', description: '品牌名称', type: 'string')]
    private string $brandName;

    #[OA\Property(property: 'goodsSn', description: '商品编号', type: 'string')]
    private string $goodsSn;

    #[OA\Property(property: 'isReal', description: '是否实物商品', type: 'integer')]
    private int $isReal;

    #[OA\Property(property: 'extensionCode', description: '扩展代码', type: 'string')]
    private string $extensionCode;

    #[OA\Property(property: 'parentId', description: '父商品ID', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'sendNumber', description: '发货数量', type: 'integer')]
    private int $sendNumber;

    #[OA\Property(property: 'goodsAttr', description: '商品属性', type: 'string')]
    private string $goodsAttr;

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

    public function getDeliveryId(): int
    {
        return $this->deliveryId;
    }

    public function setDeliveryId(int $deliveryId): void
    {
        $this->deliveryId = $deliveryId;
    }

    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getProductSn(): string
    {
        return $this->productSn;
    }

    public function setProductSn(string $productSn): void
    {
        $this->productSn = $productSn;
    }

    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
    }

    public function getBrandName(): string
    {
        return $this->brandName;
    }

    public function setBrandName(string $brandName): void
    {
        $this->brandName = $brandName;
    }

    public function getGoodsSn(): string
    {
        return $this->goodsSn;
    }

    public function setGoodsSn(string $goodsSn): void
    {
        $this->goodsSn = $goodsSn;
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

    public function getSendNumber(): int
    {
        return $this->sendNumber;
    }

    public function setSendNumber(int $sendNumber): void
    {
        $this->sendNumber = $sendNumber;
    }

    public function getGoodsAttr(): string
    {
        return $this->goodsAttr;
    }

    public function setGoodsAttr(string $goodsAttr): void
    {
        $this->goodsAttr = $goodsAttr;
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
