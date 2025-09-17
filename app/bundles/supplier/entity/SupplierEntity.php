<?php

declare(strict_types=1);

namespace app\bundles\supplier\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'SupplierEntity')]
class SupplierEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '供应商ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'supplier_name', description: '供应商名称', type: 'string')]
    private string $supplier_name;

    #[OA\Property(property: 'supplier_desc', description: '供应商描述', type: 'string')]
    private string $supplier_desc;

    #[OA\Property(property: 'is_check', description: '是否审核(0未审核 1已审核)', type: 'integer')]
    private int $is_check;

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

    public function getSupplierName(): string
    {
        return $this->supplier_name;
    }

    public function setSupplierName(string $supplierName): void
    {
        $this->supplier_name = $supplierName;
    }

    public function getSupplierDesc(): string
    {
        return $this->supplier_desc;
    }

    public function setSupplierDesc(string $supplierDesc): void
    {
        $this->supplier_desc = $supplierDesc;
    }

    public function getIsCheck(): int
    {
        return $this->is_check;
    }

    public function setIsCheck(int $isCheck): void
    {
        $this->is_check = $isCheck;
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
