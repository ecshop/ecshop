<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\Vote;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteResponse')]
class VoteResponse
{
    use DTOHelper;

    #[OA\Property(property: 'voteId', description: '', type: 'integer')]
    private int $voteId;

    #[OA\Property(property: 'voteName', description: '', type: 'string')]
    private string $voteName;

    #[OA\Property(property: 'startTime', description: '', type: 'integer')]
    private int $startTime;

    #[OA\Property(property: 'endTime', description: '', type: 'integer')]
    private int $endTime;

    #[OA\Property(property: 'canMulti', description: '', type: 'integer')]
    private int $canMulti;

    #[OA\Property(property: 'voteCount', description: '', type: 'integer')]
    private int $voteCount;

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
