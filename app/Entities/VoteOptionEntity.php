<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteOptionEntity')]
class VoteOptionEntity
{
    use DTOHelper;

    const string getOptionId = 'option_id';

    const string getVoteId = 'vote_id';

    const string getOptionName = 'option_name';

    const string getOptionCount = 'option_count';

    const string getOptionOrder = 'option_order';

    #[OA\Property(property: 'optionId', description: '', type: 'integer')]
    private int $optionId;

    #[OA\Property(property: 'voteId', description: '', type: 'integer')]
    private int $voteId;

    #[OA\Property(property: 'optionName', description: '', type: 'string')]
    private string $optionName;

    #[OA\Property(property: 'optionCount', description: '', type: 'integer')]
    private int $optionCount;

    #[OA\Property(property: 'optionOrder', description: '', type: 'integer')]
    private int $optionOrder;

    /**
     * 获取
     */
    public function getOptionId(): int
    {
        return $this->optionId;
    }

    /**
     * 设置
     */
    public function setOptionId(int $optionId): void
    {
        $this->optionId = $optionId;
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
    public function getOptionName(): string
    {
        return $this->optionName;
    }

    /**
     * 设置
     */
    public function setOptionName(string $optionName): void
    {
        $this->optionName = $optionName;
    }

    /**
     * 获取
     */
    public function getOptionCount(): int
    {
        return $this->optionCount;
    }

    /**
     * 设置
     */
    public function setOptionCount(int $optionCount): void
    {
        $this->optionCount = $optionCount;
    }

    /**
     * 获取
     */
    public function getOptionOrder(): int
    {
        return $this->optionOrder;
    }

    /**
     * 设置
     */
    public function setOptionOrder(int $optionOrder): void
    {
        $this->optionOrder = $optionOrder;
    }
}
