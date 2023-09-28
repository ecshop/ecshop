<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminActionEntity')]
class AdminActionEntity
{
    use ArrayObject;

    #[OA\Property(property: 'action_id', description: '', type: 'integer')]
    protected int $actionId;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    #[OA\Property(property: 'action_code', description: '', type: 'string')]
    protected string $actionCode;

    #[OA\Property(property: 'relevance', description: '', type: 'string')]
    protected string $relevance;

    /**
     * 获取
     */
    public function getActionId(): int
    {
        return $this->actionId;
    }

    /**
     * 设置
     */
    public function setActionId(int $actionId): void
    {
        $this->actionId = $actionId;
    }

    /**
     * 获取
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * 设置
     */
    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * 获取
     */
    public function getActionCode(): string
    {
        return $this->actionCode;
    }

    /**
     * 设置
     */
    public function setActionCode(string $actionCode): void
    {
        $this->actionCode = $actionCode;
    }

    /**
     * 获取
     */
    public function getRelevance(): string
    {
        return $this->relevance;
    }

    /**
     * 设置
     */
    public function setRelevance(string $relevance): void
    {
        $this->relevance = $relevance;
    }
}
