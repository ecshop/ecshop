<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderActionSchema')]
class OrderAction
{
    use ArrayObject;

    #[OA\Property(property: 'action_id', description: '', type: 'integer')]
    protected int $actionId;

    #[OA\Property(property: 'order_id', description: '', type: 'integer')]
    protected int $orderId;

    #[OA\Property(property: 'action_user', description: '', type: 'string')]
    protected string $actionUser;

    #[OA\Property(property: 'order_status', description: '', type: 'integer')]
    protected int $orderStatus;

    #[OA\Property(property: 'shipping_status', description: '', type: 'integer')]
    protected int $shippingStatus;

    #[OA\Property(property: 'pay_status', description: '', type: 'integer')]
    protected int $payStatus;

    #[OA\Property(property: 'action_place', description: '', type: 'integer')]
    protected int $actionPlace;

    #[OA\Property(property: 'action_note', description: '', type: 'string')]
    protected string $actionNote;

    #[OA\Property(property: 'log_time', description: '', type: 'integer')]
    protected int $logTime;

    /**
     * 获取
     */
    public function getActionId(): int
    {
        return $this->actionId;
    }

    /**
     * 设置
     */
    public function setActionId(int $actionId): void
    {
        $this->actionId = $actionId;
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
    public function getActionUser(): string
    {
        return $this->actionUser;
    }

    /**
     * 设置
     */
    public function setActionUser(string $actionUser): void
    {
        $this->actionUser = $actionUser;
    }

    /**
     * 获取
     */
    public function getOrderStatus(): int
    {
        return $this->orderStatus;
    }

    /**
     * 设置
     */
    public function setOrderStatus(int $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * 获取
     */
    public function getShippingStatus(): int
    {
        return $this->shippingStatus;
    }

    /**
     * 设置
     */
    public function setShippingStatus(int $shippingStatus): void
    {
        $this->shippingStatus = $shippingStatus;
    }

    /**
     * 获取
     */
    public function getPayStatus(): int
    {
        return $this->payStatus;
    }

    /**
     * 设置
     */
    public function setPayStatus(int $payStatus): void
    {
        $this->payStatus = $payStatus;
    }

    /**
     * 获取
     */
    public function getActionPlace(): int
    {
        return $this->actionPlace;
    }

    /**
     * 设置
     */
    public function setActionPlace(int $actionPlace): void
    {
        $this->actionPlace = $actionPlace;
    }

    /**
     * 获取
     */
    public function getActionNote(): string
    {
        return $this->actionNote;
    }

    /**
     * 设置
     */
    public function setActionNote(string $actionNote): void
    {
        $this->actionNote = $actionNote;
    }

    /**
     * 获取
     */
    public function getLogTime(): int
    {
        return $this->logTime;
    }

    /**
     * 设置
     */
    public function setLogTime(int $logTime): void
    {
        $this->logTime = $logTime;
    }
}
