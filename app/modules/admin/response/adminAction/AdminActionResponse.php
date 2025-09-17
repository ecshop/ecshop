<?php

declare(strict_types=1);

namespace app\modules\admin\response\adminAction;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminActionResponse')]
class AdminActionResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '操作ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'parentId', description: '父操作ID', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'actionCode', description: '操作权限代码', type: 'string')]
    private string $actionCode;

    #[OA\Property(property: 'relevance', description: '关联操作', type: 'string')]
    private string $relevance;

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

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    public function getActionCode(): string
    {
        return $this->actionCode;
    }

    public function setActionCode(string $actionCode): void
    {
        $this->actionCode = $actionCode;
    }

    public function getRelevance(): string
    {
        return $this->relevance;
    }

    public function setRelevance(string $relevance): void
    {
        $this->relevance = $relevance;
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
