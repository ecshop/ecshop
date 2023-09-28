<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'SessionsDatumSchema')]
class SessionsDatum
{
    use ArrayObject;

    #[OA\Property(property: 'sesskey', description: '', type: 'string')]
    protected string $sesskey;

    #[OA\Property(property: 'expiry', description: '', type: 'integer')]
    protected int $expiry;

    #[OA\Property(property: 'data', description: '', type: 'string')]
    protected string $data;

    /**
     * 获取
     */
    public function getSesskey(): string
    {
        return $this->sesskey;
    }

    /**
     * 设置
     */
    public function setSesskey(string $sesskey): void
    {
        $this->sesskey = $sesskey;
    }

    /**
     * 获取
     */
    public function getExpiry(): int
    {
        return $this->expiry;
    }

    /**
     * 设置
     */
    public function setExpiry(int $expiry): void
    {
        $this->expiry = $expiry;
    }

    /**
     * 获取
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * 设置
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }
}
