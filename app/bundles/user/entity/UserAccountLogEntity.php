<?php

declare(strict_types=1);

namespace app\bundles\user\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAccountLogEntity')]
class UserAccountLogEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'user_money', description: '用户资金变动', type: 'float')]
    private float $user_money;

    #[OA\Property(property: 'frozen_money', description: '冻结资金变动', type: 'float')]
    private float $frozen_money;

    #[OA\Property(property: 'rank_points', description: '等级积分变动', type: 'integer')]
    private int $rank_points;

    #[OA\Property(property: 'pay_points', description: '消费积分变动', type: 'integer')]
    private int $pay_points;

    #[OA\Property(property: 'change_time', description: '变动时间', type: 'integer')]
    private int $change_time;

    #[OA\Property(property: 'change_desc', description: '变动描述', type: 'string')]
    private string $change_desc;

    #[OA\Property(property: 'change_type', description: '变动类型', type: 'integer')]
    private int $change_type;

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

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getUserMoney(): float
    {
        return $this->user_money;
    }

    public function setUserMoney(float $userMoney): void
    {
        $this->user_money = $userMoney;
    }

    public function getFrozenMoney(): float
    {
        return $this->frozen_money;
    }

    public function setFrozenMoney(float $frozenMoney): void
    {
        $this->frozen_money = $frozenMoney;
    }

    public function getRankPoints(): int
    {
        return $this->rank_points;
    }

    public function setRankPoints(int $rankPoints): void
    {
        $this->rank_points = $rankPoints;
    }

    public function getPayPoints(): int
    {
        return $this->pay_points;
    }

    public function setPayPoints(int $payPoints): void
    {
        $this->pay_points = $payPoints;
    }

    public function getChangeTime(): int
    {
        return $this->change_time;
    }

    public function setChangeTime(int $changeTime): void
    {
        $this->change_time = $changeTime;
    }

    public function getChangeDesc(): string
    {
        return $this->change_desc;
    }

    public function setChangeDesc(string $changeDesc): void
    {
        $this->change_desc = $changeDesc;
    }

    public function getChangeType(): int
    {
        return $this->change_type;
    }

    public function setChangeType(int $changeType): void
    {
        $this->change_type = $changeType;
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
