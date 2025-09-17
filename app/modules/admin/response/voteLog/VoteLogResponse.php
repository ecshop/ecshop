<?php

declare(strict_types=1);

namespace app\modules\admin\response\voteLog;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteLogResponse')]
class VoteLogResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'voteId', description: '关联投票ID', type: 'integer')]
    private int $voteId;

    #[OA\Property(property: 'ipAddress', description: '投票IP地址', type: 'string')]
    private string $ipAddress;

    #[OA\Property(property: 'voteTime', description: '投票时间戳', type: 'integer')]
    private int $voteTime;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getVoteId(): int
    {
        return $this->voteId;
    }

    public function setVoteId(int $voteId): void
    {
        $this->voteId = $voteId;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    public function getVoteTime(): int
    {
        return $this->voteTime;
    }

    public function setVoteTime(int $voteTime): void
    {
        $this->voteTime = $voteTime;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}
