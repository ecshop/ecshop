<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PayLogEntity')]
class PayLogEntity
{
    use DTOHelper;

    const string getLogId = 'log_id';

    const string getOrderId = 'order_id';

    const string getOrderAmount = 'order_amount';

    const string getOrderType = 'order_type';

    const string getIsPaid = 'is_paid';

    #[OA\Property(property: 'logId', description: '', type: 'integer')]
    private int $logId;

    #[OA\Property(property: 'orderId', description: '', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'orderAmount', description: '', type: 'string')]
    private string $orderAmount;

    #[OA\Property(property: 'orderType', description: '', type: 'integer')]
    private int $orderType;

    #[OA\Property(property: 'isPaid', description: '', type: 'integer')]
    private int $isPaid;

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
    public function getOrderAmount(): string
    {
        return $this->orderAmount;
    }

    /**
     * 设置
     */
    public function setOrderAmount(string $orderAmount): void
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
