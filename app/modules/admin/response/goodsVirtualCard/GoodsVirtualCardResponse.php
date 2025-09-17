<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsVirtualCard;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsVirtualCardResponse')]
class GoodsVirtualCardResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '虚拟卡ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '关联商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '关联货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'cardSn', description: '卡序列号', type: 'string')]
    private string $cardSn;

    #[OA\Property(property: 'cardPassword', description: '卡密码', type: 'string')]
    private string $cardPassword;

    #[OA\Property(property: 'addDate', description: '添加时间戳', type: 'integer')]
    private int $addDate;

    #[OA\Property(property: 'endDate', description: '过期时间戳', type: 'integer')]
    private int $endDate;

    #[OA\Property(property: 'isSaled', description: '是否已售(0未售 1已售)', type: 'integer')]
    private int $isSaled;

    #[OA\Property(property: 'orderSn', description: '关联订单号', type: 'string')]
    private string $orderSn;

    #[OA\Property(property: 'crc32', description: 'CRC32校验值', type: 'string')]
    private string $crc32;

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

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getCardSn(): string
    {
        return $this->cardSn;
    }

    public function setCardSn(string $cardSn): void
    {
        $this->cardSn = $cardSn;
    }

    public function getCardPassword(): string
    {
        return $this->cardPassword;
    }

    public function setCardPassword(string $cardPassword): void
    {
        $this->cardPassword = $cardPassword;
    }

    public function getAddDate(): int
    {
        return $this->addDate;
    }

    public function setAddDate(int $addDate): void
    {
        $this->addDate = $addDate;
    }

    public function getEndDate(): int
    {
        return $this->endDate;
    }

    public function setEndDate(int $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getIsSaled(): int
    {
        return $this->isSaled;
    }

    public function setIsSaled(int $isSaled): void
    {
        $this->isSaled = $isSaled;
    }

    public function getOrderSn(): string
    {
        return $this->orderSn;
    }

    public function setOrderSn(string $orderSn): void
    {
        $this->orderSn = $orderSn;
    }

    public function getCrc32(): string
    {
        return $this->crc32;
    }

    public function setCrc32(string $crc32): void
    {
        $this->crc32 = $crc32;
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
