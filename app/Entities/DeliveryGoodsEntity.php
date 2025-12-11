<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'DeliveryGoodsEntity')]
class DeliveryGoodsEntity
{
    use DTOHelper;

    const string getRecId = 'rec_id';

    const string getDeliveryId = 'delivery_id';

    const string getGoodsId = 'goods_id';

    const string getProductId = 'product_id';

    const string getProductSn = 'product_sn';

    const string getGoodsName = 'goods_name';

    const string getBrandName = 'brand_name';

    const string getGoodsSn = 'goods_sn';

    const string getIsReal = 'is_real';

    const string getExtensionCode = 'extension_code';

    const string getParentId = 'parent_id';

    const string getSendNumber = 'send_number';

    const string getGoodsAttr = 'goods_attr';

    #[OA\Property(property: 'recId', description: '', type: 'integer')]
    private int $recId;

    #[OA\Property(property: 'deliveryId', description: '', type: 'integer')]
    private int $deliveryId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'productSn', description: '', type: 'string')]
    private string $productSn;

    #[OA\Property(property: 'goodsName', description: '', type: 'string')]
    private string $goodsName;

    #[OA\Property(property: 'brandName', description: '', type: 'string')]
    private string $brandName;

    #[OA\Property(property: 'goodsSn', description: '', type: 'string')]
    private string $goodsSn;

    #[OA\Property(property: 'isReal', description: '', type: 'integer')]
    private int $isReal;

    #[OA\Property(property: 'extensionCode', description: '', type: 'string')]
    private string $extensionCode;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'sendNumber', description: '', type: 'integer')]
    private int $sendNumber;

    #[OA\Property(property: 'goodsAttr', description: '', type: 'string')]
    private string $goodsAttr;

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
    public function getDeliveryId(): int
    {
        return $this->deliveryId;
    }

    /**
     * 设置
     */
    public function setDeliveryId(int $deliveryId): void
    {
        $this->deliveryId = $deliveryId;
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
