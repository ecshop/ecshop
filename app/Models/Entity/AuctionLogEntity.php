<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AuctionLogEntity')]
class AuctionLogEntity
{
    use ArrayObject;

    #[OA\Property(property: 'log_id', description: '', type: 'integer')]
    protected int $logId;

    #[OA\Property(property: 'act_id', description: '', type: 'integer')]
    protected int $actId;

    #[OA\Property(property: 'bid_user', description: '', type: 'integer')]
    protected int $bidUser;

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
    public function getActId(): int
    {
        return $this->actId;
    }

    /**
     * 设置
     */
    public function setActId(int $actId): void
    {
        $this->actId = $actId;
    }

    /**
     * 获取
     */
    public function getBidUser(): int
    {
        return $this->bidUser;
    }

    /**
     * 设置
     */
    public function setBidUser(int $bidUser): void
    {
        $this->bidUser = $bidUser;
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
