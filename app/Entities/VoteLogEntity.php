<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteLogEntity')]
class VoteLogEntity
{
    use DTOHelper;

    const string getLogId = 'log_id';

    const string getVoteId = 'vote_id';

    const string getIpAddress = 'ip_address';

    const string getVoteTime = 'vote_time';

    #[OA\Property(property: 'logId', description: '', type: 'integer')]
    private int $logId;

    #[OA\Property(property: 'voteId', description: '', type: 'integer')]
    private int $voteId;

    #[OA\Property(property: 'ipAddress', description: '', type: 'string')]
    private string $ipAddress;

    #[OA\Property(property: 'voteTime', description: '', type: 'integer')]
    private int $voteTime;

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
    public function getVoteId(): int
    {
        return $this->voteId;
    }

    /**
     * 设置
     */
    public function setVoteId(int $voteId): void
    {
        $this->voteId = $voteId;
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

    /**
     * 获取
     */
    public function getVoteTime(): int
    {
        return $this->voteTime;
    }

    /**
     * 设置
     */
    public function setVoteTime(int $voteTime): void
    {
        $this->voteTime = $voteTime;
    }
}
