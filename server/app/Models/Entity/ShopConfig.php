<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopConfigSchema')]
class ShopConfig
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'parent_id', description: '', type: 'integer')]
    protected int $parentId;

    #[OA\Property(property: 'code', description: '', type: 'string')]
    protected string $code;

    #[OA\Property(property: 'type', description: '', type: 'string')]
    protected string $type;

    #[OA\Property(property: 'store_range', description: '', type: 'string')]
    protected string $storeRange;

    #[OA\Property(property: 'store_dir', description: '', type: 'string')]
    protected string $storeDir;

    #[OA\Property(property: 'value', description: '', type: 'string')]
    protected string $value;

    #[OA\Property(property: 'sort_order', description: '', type: 'integer')]
    protected int $sortOrder;

    /**
     * 获取
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * 设置
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * 获取
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * 设置
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * 获取
     */
    public function getStoreRange(): string
    {
        return $this->storeRange;
    }

    /**
     * 设置
     */
    public function setStoreRange(string $storeRange): void
    {
        $this->storeRange = $storeRange;
    }

    /**
     * 获取
     */
    public function getStoreDir(): string
    {
        return $this->storeDir;
    }

    /**
     * 设置
     */
    public function setStoreDir(string $storeDir): void
    {
        $this->storeDir = $storeDir;
    }

    /**
     * 获取
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * 设置
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * 获取
     */
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    /**
     * 设置
     */
    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }
}
