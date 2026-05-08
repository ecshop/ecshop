<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\AffiliateLog;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AffiliateLogResponse')]
class AffiliateLogResponse
{
    use DTOHelper;

    #[OA\Property(property: 'logId', description: '', type: 'integer')]
    private int $logId;

    #[OA\Property(property: 'orderId', description: '', type: 'integer')]
    private int $orderId;

    #[OA\Property(property: 'time', description: '', type: 'integer')]
    private int $time;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'userName', description: '', type: 'string')]
    private string $userName;

    #[OA\Property(property: 'money', description: '', type: 'string')]
    private string $money;

    #[OA\Property(property: 'point', description: '', type: 'integer')]
    private int $point;

    #[OA\Property(property: 'separateType', description: '', type: 'integer')]
    private int $separateType;

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
    public function getMoney(): string
    {
        return $this->money;
    }

    /**
     * 设置
     */
    public function setMoney(string $money): void
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
