<?php

declare(strict_types=1);

namespace app\bundles\vote\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteLogEntity')]
class VoteLogEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'vote_id', description: '关联投票ID', type: 'integer')]
    private int $vote_id;

    #[OA\Property(property: 'ip_address', description: '投票IP地址', type: 'string')]
    private string $ip_address;

    #[OA\Property(property: 'vote_time', description: '投票时间戳', type: 'integer')]
    private int $vote_time;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $created_time;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updated_time;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deleted_time;

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
        return $this->vote_id;
    }

    public function setVoteId(int $voteId): void
    {
        $this->vote_id = $voteId;
    }

    public function getIpAddress(): string
    {
        return $this->ip_address;
    }

    public function setIpAddress(string $ipAddress): void
    {
        $this->ip_address = $ipAddress;
    }

    public function getVoteTime(): int
    {
        return $this->vote_time;
    }

    public function setVoteTime(int $voteTime): void
    {
        $this->vote_time = $voteTime;
    }

    public function getCreatedTime(): string
    {
        return $this->created_time;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->created_time = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updated_time = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deleted_time;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deleted_time = $deletedTime;
    }
}
