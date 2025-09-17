<?php

declare(strict_types=1);

namespace app\modules\admin\response\voteOption;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'VoteOptionResponse')]
class VoteOptionResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '选项ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'voteId', description: '关联投票ID', type: 'integer')]
    private int $voteId;

    #[OA\Property(property: 'optionName', description: '选项名称', type: 'string')]
    private string $optionName;

    #[OA\Property(property: 'optionCount', description: '投票计数', type: 'integer')]
    private int $optionCount;

    #[OA\Property(property: 'optionOrder', description: '选项排序', type: 'integer')]
    private int $optionOrder;

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

    public function getOptionName(): string
    {
        return $this->optionName;
    }

    public function setOptionName(string $optionName): void
    {
        $this->optionName = $optionName;
    }

    public function getOptionCount(): int
    {
        return $this->optionCount;
    }

    public function setOptionCount(int $optionCount): void
    {
        $this->optionCount = $optionCount;
    }

    public function getOptionOrder(): int
    {
        return $this->optionOrder;
    }

    public function setOptionOrder(int $optionOrder): void
    {
        $this->optionOrder = $optionOrder;
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
