<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopConfigEntity')]
class ShopConfigEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '配置ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'parent_id', description: '父配置ID', type: 'integer')]
    private int $parent_id;

    #[OA\Property(property: 'code', description: '配置代码', type: 'string')]
    private string $code;

    #[OA\Property(property: 'type', description: '配置类型', type: 'string')]
    private string $type;

    #[OA\Property(property: 'store_range', description: '存储范围', type: 'string')]
    private string $store_range;

    #[OA\Property(property: 'store_dir', description: '存储目录', type: 'string')]
    private string $store_dir;

    #[OA\Property(property: 'value', description: '配置值', type: 'string')]
    private string $value;

    #[OA\Property(property: 'sort_order', description: '排序权重', type: 'integer')]
    private int $sort_order;

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
        return $this->store_range;
    }

    public function setStoreRange(string $storeRange): void
    {
        $this->store_range = $storeRange;
    }

    public function getStoreDir(): string
    {
        return $this->store_dir;
    }

    public function setStoreDir(string $storeDir): void
    {
        $this->store_dir = $storeDir;
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
        return $this->sort_order;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sort_order = $sortOrder;
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
