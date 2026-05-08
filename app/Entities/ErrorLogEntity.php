<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ErrorLogEntity')]
class ErrorLogEntity
{
    use DTOHelper;

    const string getId = 'id'; // ID

    const string getInfo = 'info';

    const string getFile = 'file';

    const string getTime = 'time';

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'info', description: '', type: 'string')]
    private string $info;

    #[OA\Property(property: 'file', description: '', type: 'string')]
    private string $file;

    #[OA\Property(property: 'time', description: '', type: 'integer')]
    private int $time;

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
    public function getInfo(): string
    {
        return $this->info;
    }

    /**
     * 设置
     */
    public function setInfo(string $info): void
    {
        $this->info = $info;
    }

    /**
     * 获取
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * 设置
     */
    public function setFile(string $file): void
    {
        $this->file = $file;
    }

    /**
     * 获取
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * 设置
     */
    public function setTime(int $time): void
    {
        $this->time = $time;
    }
}
