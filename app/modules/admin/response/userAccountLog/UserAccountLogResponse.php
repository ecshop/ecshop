<?php

declare(strict_types=1);

namespace app\modules\admin\response\userAccountLog;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserAccountLogResponse')]
class UserAccountLogResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'userMoney', description: '用户资金变动', type: 'float')]
    private float $userMoney;

    #[OA\Property(property: 'frozenMoney', description: '冻结资金变动', type: 'float')]
    private float $frozenMoney;

    #[OA\Property(property: 'rankPoints', description: '等级积分变动', type: 'integer')]
    private int $rankPoints;

    #[OA\Property(property: 'payPoints', description: '消费积分变动', type: 'integer')]
    private int $payPoints;

    #[OA\Property(property: 'changeTime', description: '变动时间', type: 'integer')]
    private int $changeTime;

    #[OA\Property(property: 'changeDesc', description: '变动描述', type: 'string')]
    private string $changeDesc;

    #[OA\Property(property: 'changeType', description: '变动类型', type: 'integer')]
    private int $changeType;

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

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getUserMoney(): float
    {
        return $this->userMoney;
    }

    public function setUserMoney(float $userMoney): void
    {
        $this->userMoney = $userMoney;
    }

    public function getFrozenMoney(): float
    {
        return $this->frozenMoney;
    }

    public function setFrozenMoney(float $frozenMoney): void
    {
        $this->frozenMoney = $frozenMoney;
    }

    public function getRankPoints(): int
    {
        return $this->rankPoints;
    }

    public function setRankPoints(int $rankPoints): void
    {
        $this->rankPoints = $rankPoints;
    }

    public function getPayPoints(): int
    {
        return $this->payPoints;
    }

    public function setPayPoints(int $payPoints): void
    {
        $this->payPoints = $payPoints;
    }

    public function getChangeTime(): int
    {
        return $this->changeTime;
    }

    public function setChangeTime(int $changeTime): void
    {
        $this->changeTime = $changeTime;
    }

    public function getChangeDesc(): string
    {
        return $this->changeDesc;
    }

    public function setChangeDesc(string $changeDesc): void
    {
        $this->changeDesc = $changeDesc;
    }

    public function getChangeType(): int
    {
        return $this->changeType;
    }

    public function setChangeType(int $changeType): void
    {
        $this->changeType = $changeType;
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
