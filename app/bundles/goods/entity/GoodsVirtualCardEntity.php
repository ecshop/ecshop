<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsVirtualCardEntity')]
class GoodsVirtualCardEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '虚拟卡ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goods_id', description: '关联商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'product_id', description: '关联货品ID', type: 'integer')]
    private int $product_id;

    #[OA\Property(property: 'card_sn', description: '卡序列号', type: 'string')]
    private string $card_sn;

    #[OA\Property(property: 'card_password', description: '卡密码', type: 'string')]
    private string $card_password;

    #[OA\Property(property: 'add_date', description: '添加时间戳', type: 'integer')]
    private int $add_date;

    #[OA\Property(property: 'end_date', description: '过期时间戳', type: 'integer')]
    private int $end_date;

    #[OA\Property(property: 'is_saled', description: '是否已售(0未售 1已售)', type: 'integer')]
    private int $is_saled;

    #[OA\Property(property: 'order_sn', description: '关联订单号', type: 'string')]
    private string $order_sn;

    #[OA\Property(property: 'crc32', description: 'CRC32校验值', type: 'string')]
    private string $crc32;

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

    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goods_id = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function getCardSn(): string
    {
        return $this->card_sn;
    }

    public function setCardSn(string $cardSn): void
    {
        $this->card_sn = $cardSn;
    }

    public function getCardPassword(): string
    {
        return $this->card_password;
    }

    public function setCardPassword(string $cardPassword): void
    {
        $this->card_password = $cardPassword;
    }

    public function getAddDate(): int
    {
        return $this->add_date;
    }

    public function setAddDate(int $addDate): void
    {
        $this->add_date = $addDate;
    }

    public function getEndDate(): int
    {
        return $this->end_date;
    }

    public function setEndDate(int $endDate): void
    {
        $this->end_date = $endDate;
    }

    public function getIsSaled(): int
    {
        return $this->is_saled;
    }

    public function setIsSaled(int $isSaled): void
    {
        $this->is_saled = $isSaled;
    }

    public function getOrderSn(): string
    {
        return $this->order_sn;
    }

    public function setOrderSn(string $orderSn): void
    {
        $this->order_sn = $orderSn;
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
