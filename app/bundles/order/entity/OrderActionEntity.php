<?php

declare(strict_types=1);

namespace app\bundles\order\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'OrderActionEntity')]
class OrderActionEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '操作记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'order_id', description: '订单ID', type: 'integer')]
    private int $order_id;

    #[OA\Property(property: 'action_user', description: '操作用户', type: 'string')]
    private string $action_user;

    #[OA\Property(property: 'order_status', description: '订单状态', type: 'integer')]
    private int $order_status;

    #[OA\Property(property: 'shipping_status', description: '配送状态', type: 'integer')]
    private int $shipping_status;

    #[OA\Property(property: 'pay_status', description: '支付状态', type: 'integer')]
    private int $pay_status;

    #[OA\Property(property: 'action_place', description: '操作位置(0后台1前台)', type: 'integer')]
    private int $action_place;

    #[OA\Property(property: 'action_note', description: '操作备注', type: 'string')]
    private string $action_note;

    #[OA\Property(property: 'log_time', description: '记录时间', type: 'integer')]
    private int $log_time;

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

    public function getActionUser(): string
    {
        return $this->action_user;
    }

    public function setActionUser(string $actionUser): void
    {
        $this->action_user = $actionUser;
    }

    public function getOrderStatus(): int
    {
        return $this->order_status;
    }

    public function setOrderStatus(int $orderStatus): void
    {
        $this->order_status = $orderStatus;
    }

    public function getShippingStatus(): int
    {
        return $this->shipping_status;
    }

    public function setShippingStatus(int $shippingStatus): void
    {
        $this->shipping_status = $shippingStatus;
    }

    public function getPayStatus(): int
    {
        return $this->pay_status;
    }

    public function setPayStatus(int $payStatus): void
    {
        $this->pay_status = $payStatus;
    }

    public function getActionPlace(): int
    {
        return $this->action_place;
    }

    public function setActionPlace(int $actionPlace): void
    {
        $this->action_place = $actionPlace;
    }

    public function getActionNote(): string
    {
        return $this->action_note;
    }

    public function setActionNote(string $actionNote): void
    {
        $this->action_note = $actionNote;
    }

    public function getLogTime(): int
    {
        return $this->log_time;
    }

    public function setLogTime(int $logTime): void
    {
        $this->log_time = $logTime;
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
