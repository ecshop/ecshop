<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderActionEntity')]
class OrderActionEntity
{
    use DTOHelper;

    const string getActionId = 'action_id';

    const string getOrderId = 'order_id';

    const string getActionUser = 'action_user';

    const string getOrderStatus = 'order_status';

    const string getShippingStatus = 'shipping_status';

    const string getPayStatus = 'pay_status';

    const string getActionPlace = 'action_place';

    const string getActionNote = 'action_note';

    const string getLogTime = 'log_time';

    #[OA\Property(property: 'actionId', description: '', type: 'integer')]
    private int $actionId;

    #[OA\Property(property: 'orderId', description: '', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'actionUser', description: '', type: 'string')]
    private string $actionUser;

    #[OA\Property(property: 'orderStatus', description: '', type: 'integer')]
    private int $orderStatus;

    #[OA\Property(property: 'shippingStatus', description: '', type: 'integer')]
    private int $shippingStatus;

    #[OA\Property(property: 'payStatus', description: '', type: 'integer')]
    private int $payStatus;

    #[OA\Property(property: 'actionPlace', description: '', type: 'integer')]
    private int $actionPlace;

    #[OA\Property(property: 'actionNote', description: '', type: 'string')]
    private string $actionNote;

    #[OA\Property(property: 'logTime', description: '', type: 'integer')]
    private int $logTime;

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
