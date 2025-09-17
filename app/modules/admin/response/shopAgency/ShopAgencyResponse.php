<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopAgency;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopAgencyResponse')]
class ShopAgencyResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '代理商ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'agencyName', description: '代理商名称', type: 'string')]
    private string $agencyName;

    #[OA\Property(property: 'agencyDesc', description: '代理商描述', type: 'string')]
    private string $agencyDesc;

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

    public function getAgencyName(): string
    {
        return $this->agencyName;
    }

    public function setAgencyName(string $agencyName): void
    {
        $this->agencyName = $agencyName;
    }

    public function getAgencyDesc(): string
    {
        return $this->agencyDesc;
    }

    public function setAgencyDesc(string $agencyDesc): void
    {
        $this->agencyDesc = $agencyDesc;
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
