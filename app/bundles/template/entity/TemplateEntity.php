<?php

declare(strict_types=1);

namespace app\bundles\template\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'TemplateEntity')]
class TemplateEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'filename', description: '模板文件名', type: 'string')]
    private string $filename;

    #[OA\Property(property: 'region', description: '模板区域', type: 'string')]
    private string $region;

    #[OA\Property(property: 'library', description: '模板库', type: 'string')]
    private string $library;

    #[OA\Property(property: 'sort_order', description: '排序权重', type: 'integer')]
    private int $sort_order;

    #[OA\Property(property: 'target_id', description: '关联ID', type: 'integer')]
    private int $target_id;

    #[OA\Property(property: 'number', description: '显示数量', type: 'integer')]
    private int $number;

    #[OA\Property(property: 'type', description: '模板类型', type: 'integer')]
    private int $type;

    #[OA\Property(property: 'theme', description: '主题名称', type: 'string')]
    private string $theme;

    #[OA\Property(property: 'remarks', description: '备注信息', type: 'string')]
    private string $remarks;

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

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function getLibrary(): string
    {
        return $this->library;
    }

    public function setLibrary(string $library): void
    {
        $this->library = $library;
    }

    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sort_order = $sortOrder;
    }

    public function getTargetId(): int
    {
        return $this->target_id;
    }

    public function setTargetId(int $targetId): void
    {
        $this->target_id = $targetId;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): void
    {
        $this->theme = $theme;
    }

    public function getRemarks(): string
    {
        return $this->remarks;
    }

    public function setRemarks(string $remarks): void
    {
        $this->remarks = $remarks;
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
