<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopNavEntity')]
class ShopNavEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '导航ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'ctype', description: '关联内容类型', type: 'string')]
    private string $ctype;

    #[OA\Property(property: 'cid', description: '关联内容ID', type: 'integer')]
    private int $cid;

    #[OA\Property(property: 'name', description: '导航名称', type: 'string')]
    private string $name;

    #[OA\Property(property: 'ifshow', description: '是否显示(0否1是)', type: 'integer')]
    private int $ifshow;

    #[OA\Property(property: 'vieworder', description: '排序权重', type: 'integer')]
    private int $vieworder;

    #[OA\Property(property: 'opennew', description: '是否新窗口打开(0否1是)', type: 'integer')]
    private int $opennew;

    #[OA\Property(property: 'url', description: '导航链接', type: 'string')]
    private string $url;

    #[OA\Property(property: 'type', description: '导航类型', type: 'string')]
    private string $type;

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

    public function getCtype(): string
    {
        return $this->ctype;
    }

    public function setCtype(string $ctype): void
    {
        $this->ctype = $ctype;
    }

    public function getCid(): int
    {
        return $this->cid;
    }

    public function setCid(int $cid): void
    {
        $this->cid = $cid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIfshow(): int
    {
        return $this->ifshow;
    }

    public function setIfshow(int $ifshow): void
    {
        $this->ifshow = $ifshow;
    }

    public function getVieworder(): int
    {
        return $this->vieworder;
    }

    public function setVieworder(int $vieworder): void
    {
        $this->vieworder = $vieworder;
    }

    public function getOpennew(): int
    {
        return $this->opennew;
    }

    public function setOpennew(int $opennew): void
    {
        $this->opennew = $opennew;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
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
