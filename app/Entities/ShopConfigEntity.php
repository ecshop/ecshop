<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopConfigEntity')]
class ShopConfigEntity
{
    use DTOHelper;

    const string getId = 'id'; // ID

    const string getParentId = 'parent_id';

    const string getCode = 'code';

    const string getType = 'type';

    const string getStoreRange = 'store_range';

    const string getStoreDir = 'store_dir';

    const string getValue = 'value';

    const string getSortOrder = 'sort_order';

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'parentId', description: '', type: 'integer')]
    private int $parentId;

    #[OA\Property(property: 'code', description: '', type: 'string')]
    private string $code;

    #[OA\Property(property: 'type', description: '', type: 'string')]
    private string $type;

    #[OA\Property(property: 'storeRange', description: '', type: 'string')]
    private string $storeRange;

    #[OA\Property(property: 'storeDir', description: '', type: 'string')]
    private string $storeDir;

    #[OA\Property(property: 'value', description: '', type: 'string')]
    private string $value;

    #[OA\Property(property: 'sortOrder', description: '', type: 'integer')]
    private int $sortOrder;

    /**
     * 获取ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置ID
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
