<?php

declare(strict_types=1);

namespace app\bundles\order\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderPayEntity')]
class OrderPayEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '支付日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'order_id', description: '关联订单ID', type: 'integer')]
    private int $order_id;

    #[OA\Property(property: 'order_amount', description: '订单金额', type: 'float')]
    private float $order_amount;

    #[OA\Property(property: 'order_type', description: '订单类型(0普通订单 1团购订单 2拍卖订单 3积分商城订单)', type: 'integer')]
    private int $order_type;

    #[OA\Property(property: 'is_paid', description: '是否已支付(0未支付 1已支付)', type: 'integer')]
    private int $is_paid;

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

    public function getOrderId(): int
    {
        return $this->order_id;
    }

    public function setOrderId(int $orderId): void
    {
        $this->order_id = $orderId;
    }

    public function getOrderAmount(): float
    {
        return $this->order_amount;
    }

    public function setOrderAmount(float $orderAmount): void
    {
        $this->order_amount = $orderAmount;
    }

    public function getOrderType(): int
    {
        return $this->order_type;
    }

    public function setOrderType(int $orderType): void
    {
        $this->order_type = $orderType;
    }

    public function getIsPaid(): int
    {
        return $this->is_paid;
    }

    public function setIsPaid(int $isPaid): void
    {
        $this->is_paid = $isPaid;
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
