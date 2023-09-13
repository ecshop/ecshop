<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'SnatchLogSchema')]
class SnatchLog
{
    use ArrayObject;

    #[OA\Property(property: 'log_id', description: '', type: 'integer')]
    protected int $logId;

    #[OA\Property(property: 'snatch_id', description: '', type: 'integer')]
    protected int $snatchId;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'bid_price', description: '', type: 'float')]
    protected float $bidPrice;

    #[OA\Property(property: 'bid_time', description: '', type: 'integer')]
    protected int $bidTime;

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
    public function getSnatchId(): int
    {
        return $this->snatchId;
    }

    /**
     * 设置
     */
    public function setSnatchId(int $snatchId): void
    {
        $this->snatchId = $snatchId;
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
    public function getBidPrice(): float
    {
        return $this->bidPrice;
    }

    /**
     * 设置
     */
    public function setBidPrice(float $bidPrice): void
    {
        $this->bidPrice = $bidPrice;
    }

    /**
     * 获取
     */
    public function getBidTime(): int
    {
        return $this->bidTime;
    }

    /**
     * 设置
     */
    public function setBidTime(int $bidTime): void
    {
        $this->bidTime = $bidTime;
    }
}
