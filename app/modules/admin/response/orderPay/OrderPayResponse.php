<?php

declare(strict_types=1);

namespace app\modules\admin\response\orderPay;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderPayResponse')]
class OrderPayResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '支付日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'orderId', description: '关联订单ID', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'orderAmount', description: '订单金额', type: 'float')]
    private float $orderAmount;

    #[OA\Property(property: 'orderType', description: '订单类型(0普通订单 1团购订单 2拍卖订单 3积分商城订单)', type: 'integer')]
    private int $orderType;

    #[OA\Property(property: 'isPaid', description: '是否已支付(0未支付 1已支付)', type: 'integer')]
    private int $isPaid;

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

    public function getOrderAmount(): float
    {
        return $this->orderAmount;
    }

    public function setOrderAmount(float $orderAmount): void
    {
        $this->orderAmount = $orderAmount;
    }

    public function getOrderType(): int
    {
        return $this->orderType;
    }

    public function setOrderType(int $orderType): void
    {
        $this->orderType = $orderType;
    }

    public function getIsPaid(): int
    {
        return $this->isPaid;
    }

    public function setIsPaid(int $isPaid): void
    {
        $this->isPaid = $isPaid;
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
