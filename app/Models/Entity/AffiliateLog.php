<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AffiliateLogSchema')]
class AffiliateLog
{
    use ArrayObject;

    #[OA\Property(property: 'log_id', description: '', type: 'integer')]
    protected int $logId;

    #[OA\Property(property: 'order_id', description: '', type: 'integer')]
    protected int $orderId;

    #[OA\Property(property: 'time', description: '', type: 'integer')]
    protected int $time;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'user_name', description: '', type: 'string')]
    protected string $userName;

    #[OA\Property(property: 'money', description: '', type: 'float')]
    protected float $money;

    #[OA\Property(property: 'point', description: '', type: 'integer')]
    protected int $point;

    #[OA\Property(property: 'separate_type', description: '', type: 'integer')]
    protected int $separateType;

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
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * 设置
     */
    public function setTime(int $time): void
    {
        $this->time = $time;
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
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * 设置
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * 获取
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * 设置
     */
    public function setMoney(float $money): void
    {
        $this->money = $money;
    }

    /**
     * 获取
     */
    public function getPoint(): int
    {
        return $this->point;
    }

    /**
     * 设置
     */
    public function setPoint(int $point): void
    {
        $this->point = $point;
    }

    /**
     * 获取
     */
    public function getSeparateType(): int
    {
        return $this->separateType;
    }

    /**
     * 设置
     */
    public function setSeparateType(int $separateType): void
    {
        $this->separateType = $separateType;
    }
}
