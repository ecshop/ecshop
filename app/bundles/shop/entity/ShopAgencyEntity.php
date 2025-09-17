<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopAgencyEntity')]
class ShopAgencyEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '代理商ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'agency_name', description: '代理商名称', type: 'string')]
    private string $agency_name;

    #[OA\Property(property: 'agency_desc', description: '代理商描述', type: 'string')]
    private string $agency_desc;

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

    public function getAgencyName(): string
    {
        return $this->agency_name;
    }

    public function setAgencyName(string $agencyName): void
    {
        $this->agency_name = $agencyName;
    }

    public function getAgencyDesc(): string
    {
        return $this->agency_desc;
    }

    public function setAgencyDesc(string $agencyDesc): void
    {
        $this->agency_desc = $agencyDesc;
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
