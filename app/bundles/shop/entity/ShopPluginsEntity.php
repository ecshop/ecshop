<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopPluginsEntity')]
class ShopPluginsEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'code', description: '插件代码标识', type: 'string')]
    private string $code;

    #[OA\Property(property: 'version', description: '插件版本号', type: 'string')]
    private string $version;

    #[OA\Property(property: 'library', description: '插件库文件路径', type: 'string')]
    private string $library;

    #[OA\Property(property: 'assign', description: '是否分配(0未分配 1已分配)', type: 'integer')]
    private int $assign;

    #[OA\Property(property: 'install_date', description: '安装时间戳', type: 'integer')]
    private int $install_date;

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

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function getLibrary(): string
    {
        return $this->library;
    }

    public function setLibrary(string $library): void
    {
        $this->library = $library;
    }

    public function getAssign(): int
    {
        return $this->assign;
    }

    public function setAssign(int $assign): void
    {
        $this->assign = $assign;
    }

    public function getInstallDate(): int
    {
        return $this->install_date;
    }

    public function setInstallDate(int $installDate): void
    {
        $this->install_date = $installDate;
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
