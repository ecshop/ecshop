<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsProduct;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsProductResponse')]
class GoodsProductResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '货品ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '关联商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'goodsAttr', description: '商品属性组合', type: 'string')]
    private string $goodsAttr;

    #[OA\Property(property: 'productSn', description: '货品编号', type: 'string')]
    private string $productSn;

    #[OA\Property(property: 'productNumber', description: '货品库存数量', type: 'integer')]
    private int $productNumber;

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

    public function getGoodsAttr(): string
    {
        return $this->goodsAttr;
    }

    public function setGoodsAttr(string $goodsAttr): void
    {
        $this->goodsAttr = $goodsAttr;
    }

    public function getProductSn(): string
    {
        return $this->productSn;
    }

    public function setProductSn(string $productSn): void
    {
        $this->productSn = $productSn;
    }

    public function getProductNumber(): int
    {
        return $this->productNumber;
    }

    public function setProductNumber(int $productNumber): void
    {
        $this->productNumber = $productNumber;
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
