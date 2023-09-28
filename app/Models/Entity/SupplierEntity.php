<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'SupplierEntity')]
class SupplierEntity
{
    use ArrayObject;

    #[OA\Property(property: 'suppliers_id', description: '', type: 'integer')]
    protected int $suppliersId;

    #[OA\Property(property: 'suppliers_name', description: '', type: 'string')]
    protected string $suppliersName;

    #[OA\Property(property: 'suppliers_desc', description: '', type: 'string')]
    protected string $suppliersDesc;

    #[OA\Property(property: 'is_check', description: '', type: 'integer')]
    protected int $isCheck;

    /**
     * 获取
     */
    public function getSuppliersId(): int
    {
        return $this->suppliersId;
    }

    /**
     * 设置
     */
    public function setSuppliersId(int $suppliersId): void
    {
        $this->suppliersId = $suppliersId;
    }

    /**
     * 获取
     */
    public function getSuppliersName(): string
    {
        return $this->suppliersName;
    }

    /**
     * 设置
     */
    public function setSuppliersName(string $suppliersName): void
    {
        $this->suppliersName = $suppliersName;
    }

    /**
     * 获取
     */
    public function getSuppliersDesc(): string
    {
        return $this->suppliersDesc;
    }

    /**
     * 设置
     */
    public function setSuppliersDesc(string $suppliersDesc): void
    {
        $this->suppliersDesc = $suppliersDesc;
    }

    /**
     * 获取
     */
    public function getIsCheck(): int
    {
        return $this->isCheck;
    }

    /**
     * 设置
     */
    public function setIsCheck(int $isCheck): void
    {
        $this->isCheck = $isCheck;
    }
}
