<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'EmailListSchema')]
class EmailList
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    protected string $email;

    #[OA\Property(property: 'stat', description: '', type: 'integer')]
    protected int $stat;

    #[OA\Property(property: 'hash', description: '', type: 'string')]
    protected string $hash;

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * 设置
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * 获取
     */
    public function getStat(): int
    {
        return $this->stat;
    }

    /**
     * 设置
     */
    public function setStat(int $stat): void
    {
        $this->stat = $stat;
    }

    /**
     * 获取
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * 设置
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }
}
