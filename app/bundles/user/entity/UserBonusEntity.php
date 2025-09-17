<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserBonusEntity')]
class UserBonusEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '优惠券ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'bonus_type_id', description: '优惠券类型ID', type: 'integer')]
    private int $bonus_type_id;

    #[OA\Property(property: 'bonus_sn', description: '优惠券序列号', type: 'integer')]
    private int $bonus_sn;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'used_time', description: '使用时间戳', type: 'integer')]
    private int $used_time;

    #[OA\Property(property: 'order_id', description: '订单ID', type: 'integer')]
    private int $order_id;

    #[OA\Property(property: 'emailed', description: '是否已邮件通知', type: 'integer')]
    private int $emailed;

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

    public function getBonusTypeId(): int
    {
        return $this->bonus_type_id;
    }

    public function setBonusTypeId(int $bonusTypeId): void
    {
        $this->bonus_type_id = $bonusTypeId;
    }

    public function getBonusSn(): int
    {
        return $this->bonus_sn;
    }

    public function setBonusSn(int $bonusSn): void
    {
        $this->bonus_sn = $bonusSn;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getUsedTime(): int
    {
        return $this->used_time;
    }

    public function setUsedTime(int $usedTime): void
    {
        $this->used_time = $usedTime;
    }

    public function getOrderId(): int
    {
        return $this->order_id;
    }

    public function setOrderId(int $orderId): void
    {
        $this->order_id = $orderId;
    }

    public function getEmailed(): int
    {
        return $this->emailed;
    }

    public function setEmailed(int $emailed): void
    {
        $this->emailed = $emailed;
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
