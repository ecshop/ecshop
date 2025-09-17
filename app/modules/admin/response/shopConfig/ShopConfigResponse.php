<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopConfig;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopConfigResponse')]
class ShopConfigResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '配置ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'parentId', description: '父配置ID', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'code', description: '配置代码', type: 'string')]
    private string $code;

    #[OA\Property(property: 'type', description: '配置类型', type: 'string')]
    private string $type;

    #[OA\Property(property: 'storeRange', description: '存储范围', type: 'string')]
    private string $storeRange;

    #[OA\Property(property: 'storeDir', description: '存储目录', type: 'string')]
    private string $storeDir;

    #[OA\Property(property: 'value', description: '配置值', type: 'string')]
    private string $value;

    #[OA\Property(property: 'sortOrder', description: '排序权重', type: 'integer')]
    private int $sortOrder;

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

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getStoreRange(): string
    {
        return $this->storeRange;
    }

    public function setStoreRange(string $storeRange): void
    {
        $this->storeRange = $storeRange;
    }

    public function getStoreDir(): string
    {
        return $this->storeDir;
    }

    public function setStoreDir(string $storeDir): void
    {
        $this->storeDir = $storeDir;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
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
