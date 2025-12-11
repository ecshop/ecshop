<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PluginsEntity')]
class PluginsEntity
{
    use DTOHelper;

    const string getId = 'id'; // ID

    const string getCode = 'code';

    const string getVersion = 'version';

    const string getLibrary = 'library';

    const string getAssign = 'assign';

    const string getInstallDate = 'install_date';

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'code', description: '', type: 'string')]
    private string $code;

    #[OA\Property(property: 'version', description: '', type: 'string')]
    private string $version;

    #[OA\Property(property: 'library', description: '', type: 'string')]
    private string $library;

    #[OA\Property(property: 'assign', description: '', type: 'integer')]
    private int $assign;

    #[OA\Property(property: 'installDate', description: '', type: 'integer')]
    private int $installDate;

    /**
     * 获取ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置ID
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
