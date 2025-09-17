<?php

declare(strict_types=1);

namespace app\modules\admin\response\orderAction;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderActionResponse')]
class OrderActionResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '操作记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'orderId', description: '订单ID', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'actionUser', description: '操作用户', type: 'string')]
    private string $actionUser;

    #[OA\Property(property: 'orderStatus', description: '订单状态', type: 'integer')]
    private int $orderStatus;

    #[OA\Property(property: 'shippingStatus', description: '配送状态', type: 'integer')]
    private int $shippingStatus;

    #[OA\Property(property: 'payStatus', description: '支付状态', type: 'integer')]
    private int $payStatus;

    #[OA\Property(property: 'actionPlace', description: '操作位置(0后台1前台)', type: 'integer')]
    private int $actionPlace;

    #[OA\Property(property: 'actionNote', description: '操作备注', type: 'string')]
    private string $actionNote;

    #[OA\Property(property: 'logTime', description: '记录时间', type: 'integer')]
    private int $logTime;

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

    public function getActionUser(): string
    {
        return $this->actionUser;
    }

    public function setActionUser(string $actionUser): void
    {
        $this->actionUser = $actionUser;
    }

    public function getOrderStatus(): int
    {
        return $this->orderStatus;
    }

    public function setOrderStatus(int $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    public function getShippingStatus(): int
    {
        return $this->shippingStatus;
    }

    public function setShippingStatus(int $shippingStatus): void
    {
        $this->shippingStatus = $shippingStatus;
    }

    public function getPayStatus(): int
    {
        return $this->payStatus;
    }

    public function setPayStatus(int $payStatus): void
    {
        $this->payStatus = $payStatus;
    }

    public function getActionPlace(): int
    {
        return $this->actionPlace;
    }

    public function setActionPlace(int $actionPlace): void
    {
        $this->actionPlace = $actionPlace;
    }

    public function getActionNote(): string
    {
        return $this->actionNote;
    }

    public function setActionNote(string $actionNote): void
    {
        $this->actionNote = $actionNote;
    }

    public function getLogTime(): int
    {
        return $this->logTime;
    }

    public function setLogTime(int $logTime): void
    {
        $this->logTime = $logTime;
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
