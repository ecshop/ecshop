<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminLogEntity')]
class AdminLogEntity
{
    use DTOHelper;

    const string getLogId = 'log_id';

    const string getLogTime = 'log_time';

    const string getUserId = 'user_id';

    const string getLogInfo = 'log_info';

    const string getIpAddress = 'ip_address';

    #[OA\Property(property: 'logId', description: '', type: 'integer')]
    private int $logId;

    #[OA\Property(property: 'logTime', description: '', type: 'integer')]
    private int $logTime;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'logInfo', description: '', type: 'string')]
    private string $logInfo;

    #[OA\Property(property: 'ipAddress', description: '', type: 'string')]
    private string $ipAddress;

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
