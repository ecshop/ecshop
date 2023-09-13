<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteLogSchema')]
class VoteLog
{
    use ArrayObject;

    #[OA\Property(property: 'log_id', description: '', type: 'integer')]
    protected int $logId;

    #[OA\Property(property: 'vote_id', description: '', type: 'integer')]
    protected int $voteId;

    #[OA\Property(property: 'ip_address', description: '', type: 'string')]
    protected string $ipAddress;

    #[OA\Property(property: 'vote_time', description: '', type: 'integer')]
    protected int $voteTime;

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
