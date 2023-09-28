<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminLogEntity')]
class AdminLogEntity
{
    use ArrayObject;

    #[OA\Property(property: 'log_id', description: '', type: 'integer')]
    protected int $logId;

    #[OA\Property(property: 'log_time', description: '', type: 'integer')]
    protected int $logTime;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'log_info', description: '', type: 'string')]
    protected string $logInfo;

    #[OA\Property(property: 'ip_address', description: '', type: 'string')]
    protected string $ipAddress;

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
    public function getLogTime(): int
    {
        return $this->logTime;
    }

    /**
     * 设置
     */
    public function setLogTime(int $logTime): void
    {
        $this->logTime = $logTime;
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
    public function getLogInfo(): string
    {
        return $this->logInfo;
    }

    /**
     * 设置
     */
    public function setLogInfo(string $logInfo): void
    {
        $this->logInfo = $logInfo;
    }

    /**
     * 获取
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * 设置
     */
    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }
}
