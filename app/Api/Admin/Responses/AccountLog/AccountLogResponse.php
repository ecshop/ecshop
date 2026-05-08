<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\AccountLog;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AccountLogResponse')]
class AccountLogResponse
{
    use DTOHelper;

    #[OA\Property(property: 'logId', description: '', type: 'integer')]
    private int $logId;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'userMoney', description: '', type: 'string')]
    private string $userMoney;

    #[OA\Property(property: 'frozenMoney', description: '', type: 'string')]
    private string $frozenMoney;

    #[OA\Property(property: 'rankPoints', description: '', type: 'integer')]
    private int $rankPoints;

    #[OA\Property(property: 'payPoints', description: '', type: 'integer')]
    private int $payPoints;

    #[OA\Property(property: 'changeTime', description: '', type: 'integer')]
    private int $changeTime;

    #[OA\Property(property: 'changeDesc', description: '', type: 'string')]
    private string $changeDesc;

    #[OA\Property(property: 'changeType', description: '', type: 'integer')]
    private int $changeType;

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
    public function getUserMoney(): string
    {
        return $this->userMoney;
    }

    /**
     * 设置
     */
    public function setUserMoney(string $userMoney): void
    {
        $this->userMoney = $userMoney;
    }

    /**
     * 获取
     */
    public function getFrozenMoney(): string
    {
        return $this->frozenMoney;
    }

    /**
     * 设置
     */
    public function setFrozenMoney(string $frozenMoney): void
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
