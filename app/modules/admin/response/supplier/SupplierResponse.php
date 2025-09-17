<?php

declare(strict_types=1);

namespace app\modules\admin\response\supplier;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'SupplierResponse')]
class SupplierResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '供应商ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'supplierName', description: '供应商名称', type: 'string')]
    private string $supplierName;

    #[OA\Property(property: 'supplierDesc', description: '供应商描述', type: 'string')]
    private string $supplierDesc;

    #[OA\Property(property: 'isCheck', description: '是否审核(0未审核 1已审核)', type: 'integer')]
    private int $isCheck;

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

    public function getSupplierName(): string
    {
        return $this->supplierName;
    }

    public function setSupplierName(string $supplierName): void
    {
        $this->supplierName = $supplierName;
    }

    public function getSupplierDesc(): string
    {
        return $this->supplierDesc;
    }

    public function setSupplierDesc(string $supplierDesc): void
    {
        $this->supplierDesc = $supplierDesc;
    }

    public function getIsCheck(): int
    {
        return $this->isCheck;
    }

    public function setIsCheck(int $isCheck): void
    {
        $this->isCheck = $isCheck;
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
