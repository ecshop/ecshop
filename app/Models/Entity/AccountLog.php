<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AccountLogSchema')]
class AccountLog
{
    use ArrayObject;

    #[OA\Property(property: 'log_id', description: '', type: 'integer')]
    protected int $logId;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'user_money', description: '', type: 'float')]
    protected float $userMoney;

    #[OA\Property(property: 'frozen_money', description: '', type: 'float')]
    protected float $frozenMoney;

    #[OA\Property(property: 'rank_points', description: '', type: 'integer')]
    protected int $rankPoints;

    #[OA\Property(property: 'pay_points', description: '', type: 'integer')]
    protected int $payPoints;

    #[OA\Property(property: 'change_time', description: '', type: 'integer')]
    protected int $changeTime;

    #[OA\Property(property: 'change_desc', description: '', type: 'string')]
    protected string $changeDesc;

    #[OA\Property(property: 'change_type', description: '', type: 'integer')]
    protected int $changeType;

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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 设置
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * 获取
     */
    public function getUserMoney(): float
    {
        return $this->userMoney;
    }

    /**
     * 设置
     */
    public function setUserMoney(float $userMoney): void
    {
        $this->userMoney = $userMoney;
    }

    /**
     * 获取
     */
    public function getFrozenMoney(): float
    {
        return $this->frozenMoney;
    }

    /**
     * 设置
     */
    public function setFrozenMoney(float $frozenMoney): void
    {
        $this->frozenMoney = $frozenMoney;
    }

    /**
     * 获取
     */
    public function getRankPoints(): int
    {
        return $this->rankPoints;
    }

    /**
     * 设置
     */
    public function setRankPoints(int $rankPoints): void
    {
        $this->rankPoints = $rankPoints;
    }

    /**
     * 获取
     */
    public function getPayPoints(): int
    {
        return $this->payPoints;
    }

    /**
     * 设置
     */
    public function setPayPoints(int $payPoints): void
    {
        $this->payPoints = $payPoints;
    }

    /**
     * 获取
     */
    public function getChangeTime(): int
    {
        return $this->changeTime;
    }

    /**
     * 设置
     */
    public function setChangeTime(int $changeTime): void
    {
        $this->changeTime = $changeTime;
    }

    /**
     * 获取
     */
    public function getChangeDesc(): string
    {
        return $this->changeDesc;
    }

    /**
     * 设置
     */
    public function setChangeDesc(string $changeDesc): void
    {
        $this->changeDesc = $changeDesc;
    }

    /**
     * 获取
     */
    public function getChangeType(): int
    {
        return $this->changeType;
    }

    /**
     * 设置
     */
    public function setChangeType(int $changeType): void
    {
        $this->changeType = $changeType;
    }
}
