<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ErrorLogSchema')]
class ErrorLog
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'info', description: '', type: 'string')]
    protected string $info;

    #[OA\Property(property: 'file', description: '', type: 'string')]
    protected string $file;

    #[OA\Property(property: 'time', description: '', type: 'integer')]
    protected int $time;

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
