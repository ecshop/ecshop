<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteOptionEntity')]
class VoteOptionEntity
{
    use ArrayObject;

    #[OA\Property(property: 'option_id', description: '', type: 'integer')]
    protected int $optionId;

    #[OA\Property(property: 'vote_id', description: '', type: 'integer')]
    protected int $voteId;

    #[OA\Property(property: 'option_name', description: '', type: 'string')]
    protected string $optionName;

    #[OA\Property(property: 'option_count', description: '', type: 'integer')]
    protected int $optionCount;

    #[OA\Property(property: 'option_order', description: '', type: 'integer')]
    protected int $optionOrder;

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
