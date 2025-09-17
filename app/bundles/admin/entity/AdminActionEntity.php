<?php

declare(strict_types=1);

namespace app\bundles\admin\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminActionEntity')]
class AdminActionEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '操作ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'parent_id', description: '父操作ID', type: 'integer')]
    private int $parent_id;

    #[OA\Property(property: 'action_code', description: '操作权限代码', type: 'string')]
    private string $action_code;

    #[OA\Property(property: 'relevance', description: '关联操作', type: 'string')]
    private string $relevance;

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

    public function getParentId(): int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parentId): void
    {
        $this->parent_id = $parentId;
    }

    public function getActionCode(): string
    {
        return $this->action_code;
    }

    public function setActionCode(string $actionCode): void
    {
        $this->action_code = $actionCode;
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
