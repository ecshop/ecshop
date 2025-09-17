<?php

declare(strict_types=1);

namespace app\modules\admin\response\vote;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteResponse')]
class VoteResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '投票ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'voteName', description: '投票名称', type: 'string')]
    private string $voteName;

    #[OA\Property(property: 'startTime', description: '开始时间戳', type: 'integer')]
    private int $startTime;

    #[OA\Property(property: 'endTime', description: '结束时间戳', type: 'integer')]
    private int $endTime;

    #[OA\Property(property: 'canMulti', description: '是否多选(0单选 1多选)', type: 'integer')]
    private int $canMulti;

    #[OA\Property(property: 'voteCount', description: '投票总数', type: 'integer')]
    private int $voteCount;

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

    public function getVoteName(): string
    {
        return $this->voteName;
    }

    public function setVoteName(string $voteName): void
    {
        $this->voteName = $voteName;
    }

    public function getStartTime(): int
    {
        return $this->startTime;
    }

    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->endTime;
    }

    public function setEndTime(int $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function getCanMulti(): int
    {
        return $this->canMulti;
    }

    public function setCanMulti(int $canMulti): void
    {
        $this->canMulti = $canMulti;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function setVoteCount(int $voteCount): void
    {
        $this->voteCount = $voteCount;
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
