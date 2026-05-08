<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminActionEntity')]
class AdminActionEntity
{
    use DTOHelper;

    const string getActionId = 'action_id';

    const string getParentId = 'parent_id';

    const string getActionCode = 'action_code';

    const string getRelevance = 'relevance';

    #[OA\Property(property: 'actionId', description: '', type: 'integer')]
    private int $actionId;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'actionCode', description: '', type: 'string')]
    private string $actionCode;

    #[OA\Property(property: 'relevance', description: '', type: 'string')]
    private string $relevance;

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
