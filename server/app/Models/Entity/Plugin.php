<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PluginSchema')]
class Plugin
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'code', description: '', type: 'string')]
    protected string $code;

    #[OA\Property(property: 'version', description: '', type: 'string')]
    protected string $version;

    #[OA\Property(property: 'library', description: '', type: 'string')]
    protected string $library;

    #[OA\Property(property: 'assign', description: '', type: 'integer')]
    protected int $assign;

    #[OA\Property(property: 'install_date', description: '', type: 'integer')]
    protected int $installDate;

    /**
     * 获取
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * 获取
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * 设置
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * 获取
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * 设置
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    /**
     * 获取
     */
    public function getLibrary(): string
    {
        return $this->library;
    }

    /**
     * 设置
     */
    public function setLibrary(string $library): void
    {
        $this->library = $library;
    }

    /**
     * 获取
     */
    public function getAssign(): int
    {
        return $this->assign;
    }

    /**
     * 设置
     */
    public function setAssign(int $assign): void
    {
        $this->assign = $assign;
    }

    /**
     * 获取
     */
    public function getInstallDate(): int
    {
        return $this->installDate;
    }

    /**
     * 设置
     */
    public function setInstallDate(int $installDate): void
    {
        $this->installDate = $installDate;
    }
}
