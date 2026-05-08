<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'SuppliersEntity')]
class SuppliersEntity
{
    use DTOHelper;

    const string getSuppliersId = 'suppliers_id';

    const string getSuppliersName = 'suppliers_name';

    const string getSuppliersDesc = 'suppliers_desc';

    const string getIsCheck = 'is_check';

    #[OA\Property(property: 'suppliersId', description: '', type: 'integer')]
    private int $suppliersId;

    #[OA\Property(property: 'suppliersName', description: '', type: 'string')]
    private string $suppliersName;

    #[OA\Property(property: 'suppliersDesc', description: '', type: 'string')]
    private string $suppliersDesc;

    #[OA\Property(property: 'isCheck', description: '', type: 'integer')]
    private int $isCheck;

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
