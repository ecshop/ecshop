<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\AuctionLog;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AuctionLogResponse')]
class AuctionLogResponse
{
    use DTOHelper;

    #[OA\Property(property: 'logId', description: '', type: 'integer')]
    private int $logId;

    #[OA\Property(property: 'actId', description: '', type: 'integer')]
    private int $actId;

    #[OA\Property(property: 'bidUser', description: '', type: 'integer')]
    private int $bidUser;

    #[OA\Property(property: 'bidPrice', description: '', type: 'string')]
    private string $bidPrice;

    #[OA\Property(property: 'bidTime', description: '', type: 'integer')]
    private int $bidTime;

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
    public function getBidPrice(): string
    {
        return $this->bidPrice;
    }

    /**
     * 设置
     */
    public function setBidPrice(string $bidPrice): void
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
