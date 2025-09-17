<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAffiliateEntity')]
class UserAffiliateEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'order_id', description: '订单ID', type: 'integer')]
    private int $order_id;

    #[OA\Property(property: 'time', description: '时间', type: 'integer')]
    private int $time;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'user_name', description: '用户名', type: 'string')]
    private string $user_name;

    #[OA\Property(property: 'money', description: '金额', type: 'float')]
    private float $money;

    #[OA\Property(property: 'point', description: '积分', type: 'integer')]
    private int $point;

    #[OA\Property(property: 'separate_type', description: '分佣类型', type: 'integer')]
    private int $separate_type;

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

    public function getTime(): int
    {
        return $this->time;
    }

    public function setTime(int $time): void
    {
        $this->time = $time;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getUserName(): string
    {
        return $this->user_name;
    }

    public function setUserName(string $userName): void
    {
        $this->user_name = $userName;
    }

    public function getMoney(): float
    {
        return $this->money;
    }

    public function setMoney(float $money): void
    {
        $this->money = $money;
    }

    public function getPoint(): int
    {
        return $this->point;
    }

    public function setPoint(int $point): void
    {
        $this->point = $point;
    }

    public function getSeparateType(): int
    {
        return $this->separate_type;
    }

    public function setSeparateType(int $separateType): void
    {
        $this->separate_type = $separateType;
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
