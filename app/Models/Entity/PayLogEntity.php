<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PayLogEntity')]
class PayLogEntity
{
    use ArrayObject;

    #[OA\Property(property: 'log_id', description: '', type: 'integer')]
    protected int $logId;

    #[OA\Property(property: 'order_id', description: '', type: 'integer')]
    protected int $orderId;

    #[OA\Property(property: 'order_amount', description: '', type: 'float')]
    protected float $orderAmount;

    #[OA\Property(property: 'order_type', description: '', type: 'integer')]
    protected int $orderType;

    #[OA\Property(property: 'is_paid', description: '', type: 'integer')]
    protected int $isPaid;

    /**
     * 获取
     */
    public function getLogId(): int
    {
        return $this->logId;
    }

    /**
     * 设置
     */
    public function setLogId(int $logId): void
    {
        $this->logId = $logId;
    }

    /**
     * 获取
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * 设置
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * 获取
     */
    public function getOrderAmount(): float
    {
        return $this->orderAmount;
    }

    /**
     * 设置
     */
    public function setOrderAmount(float $orderAmount): void
    {
        $this->orderAmount = $orderAmount;
    }

    /**
     * 获取
     */
    public function getOrderType(): int
    {
        return $this->orderType;
    }

    /**
     * 设置
     */
    public function setOrderType(int $orderType): void
    {
        $this->orderType = $orderType;
    }

    /**
     * 获取
     */
    public function getIsPaid(): int
    {
        return $this->isPaid;
    }

    /**
     * 设置
     */
    public function setIsPaid(int $isPaid): void
    {
        $this->isPaid = $isPaid;
    }
}
