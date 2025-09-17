<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsTypeEntity')]
class GoodsTypeEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '类型ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cat_name', description: '类型名称', type: 'string')]
    private string $cat_name;

    #[OA\Property(property: 'enabled', description: '是否启用(1启用 0禁用)', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'attr_group', description: '属性分组', type: 'string')]
    private string $attr_group;

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

    public function getCatName(): string
    {
        return $this->cat_name;
    }

    public function setCatName(string $catName): void
    {
        $this->cat_name = $catName;
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
        return $this->attr_group;
    }

    public function setAttrGroup(string $attrGroup): void
    {
        $this->attr_group = $attrGroup;
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
