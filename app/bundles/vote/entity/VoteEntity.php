<?php

declare(strict_types=1);

namespace app\bundles\vote\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteEntity')]
class VoteEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '投票ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'vote_name', description: '投票名称', type: 'string')]
    private string $vote_name;

    #[OA\Property(property: 'start_time', description: '开始时间戳', type: 'integer')]
    private int $start_time;

    #[OA\Property(property: 'end_time', description: '结束时间戳', type: 'integer')]
    private int $end_time;

    #[OA\Property(property: 'can_multi', description: '是否多选(0单选 1多选)', type: 'integer')]
    private int $can_multi;

    #[OA\Property(property: 'vote_count', description: '投票总数', type: 'integer')]
    private int $vote_count;

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

    public function getVoteName(): string
    {
        return $this->vote_name;
    }

    public function setVoteName(string $voteName): void
    {
        $this->vote_name = $voteName;
    }

    public function getStartTime(): int
    {
        return $this->start_time;
    }

    public function setStartTime(int $startTime): void
    {
        $this->start_time = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->end_time;
    }

    public function setEndTime(int $endTime): void
    {
        $this->end_time = $endTime;
    }

    public function getCanMulti(): int
    {
        return $this->can_multi;
    }

    public function setCanMulti(int $canMulti): void
    {
        $this->can_multi = $canMulti;
    }

    public function getVoteCount(): int
    {
        return $this->vote_count;
    }

    public function setVoteCount(int $voteCount): void
    {
        $this->vote_count = $voteCount;
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
