<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsType;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsTypeResponse')]
class GoodsTypeResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '类型ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'catName', description: '类型名称', type: 'string')]
    private string $catName;

    #[OA\Property(property: 'enabled', description: '是否启用(1启用 0禁用)', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'attrGroup', description: '属性分组', type: 'string')]
    private string $attrGroup;

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

    public function getCatName(): string
    {
        return $this->catName;
    }

    public function setCatName(string $catName): void
    {
        $this->catName = $catName;
    }

    public function getEnabled(): int
    {
        return $this->enabled;
    }

    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getAttrGroup(): string
    {
        return $this->attrGroup;
    }

    public function setAttrGroup(string $attrGroup): void
    {
        $this->attrGroup = $attrGroup;
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
