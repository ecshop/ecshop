<?php

declare(strict_types=1);

namespace app\modules\admin\response\userBonus;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserBonusResponse')]
class UserBonusResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '优惠券ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'bonusTypeId', description: '优惠券类型ID', type: 'integer')]
    private int $bonusTypeId;

    #[OA\Property(property: 'bonusSn', description: '优惠券序列号', type: 'integer')]
    private int $bonusSn;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'usedTime', description: '使用时间戳', type: 'integer')]
    private int $usedTime;

    #[OA\Property(property: 'orderId', description: '订单ID', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'emailed', description: '是否已邮件通知', type: 'integer')]
    private int $emailed;

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

    public function getBonusTypeId(): int
    {
        return $this->bonusTypeId;
    }

    public function setBonusTypeId(int $bonusTypeId): void
    {
        $this->bonusTypeId = $bonusTypeId;
    }

    public function getBonusSn(): int
    {
        return $this->bonusSn;
    }

    public function setBonusSn(int $bonusSn): void
    {
        $this->bonusSn = $bonusSn;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getUsedTime(): int
    {
        return $this->usedTime;
    }

    public function setUsedTime(int $usedTime): void
    {
        $this->usedTime = $usedTime;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
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
