<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopPlugins;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopPluginsResponse')]
class ShopPluginsResponse
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

    #[OA\Property(property: 'installDate', description: '安装时间戳', type: 'integer')]
    private int $installDate;

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
        return $this->installDate;
    }

    public function setInstallDate(int $installDate): void
    {
        $this->installDate = $installDate;
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
