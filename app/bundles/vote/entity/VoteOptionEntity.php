<?php

declare(strict_types=1);

namespace app\bundles\vote\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteOptionEntity')]
class VoteOptionEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '选项ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'vote_id', description: '关联投票ID', type: 'integer')]
    private int $vote_id;

    #[OA\Property(property: 'option_name', description: '选项名称', type: 'string')]
    private string $option_name;

    #[OA\Property(property: 'option_count', description: '投票计数', type: 'integer')]
    private int $option_count;

    #[OA\Property(property: 'option_order', description: '选项排序', type: 'integer')]
    private int $option_order;

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

    public function getOptionName(): string
    {
        return $this->option_name;
    }

    public function setOptionName(string $optionName): void
    {
        $this->option_name = $optionName;
    }

    public function getOptionCount(): int
    {
        return $this->option_count;
    }

    public function setOptionCount(int $optionCount): void
    {
        $this->option_count = $optionCount;
    }

    public function getOptionOrder(): int
    {
        return $this->option_order;
    }

    public function setOptionOrder(int $optionOrder): void
    {
        $this->option_order = $optionOrder;
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
