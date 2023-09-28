<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteEntity')]
class VoteEntity
{
    use ArrayObject;

    #[OA\Property(property: 'vote_id', description: '', type: 'integer')]
    protected int $voteId;

    #[OA\Property(property: 'vote_name', description: '', type: 'string')]
    protected string $voteName;

    #[OA\Property(property: 'start_time', description: '', type: 'integer')]
    protected int $startTime;

    #[OA\Property(property: 'end_time', description: '', type: 'integer')]
    protected int $endTime;

    #[OA\Property(property: 'can_multi', description: '', type: 'integer')]
    protected int $canMulti;

    #[OA\Property(property: 'vote_count', description: '', type: 'integer')]
    protected int $voteCount;

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
    public function getVoteName(): string
    {
        return $this->voteName;
    }

    /**
     * 设置
     */
    public function setVoteName(string $voteName): void
    {
        $this->voteName = $voteName;
    }

    /**
     * 获取
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * 设置
     */
    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * 获取
     */
    public function getEndTime(): int
    {
        return $this->endTime;
    }

    /**
     * 设置
     */
    public function setEndTime(int $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * 获取
     */
    public function getCanMulti(): int
    {
        return $this->canMulti;
    }

    /**
     * 设置
     */
    public function setCanMulti(int $canMulti): void
    {
        $this->canMulti = $canMulti;
    }

    /**
     * 获取
     */
    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    /**
     * 设置
     */
    public function setVoteCount(int $voteCount): void
    {
        $this->voteCount = $voteCount;
    }
}
