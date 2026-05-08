<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'EmailListEntity')]
class EmailListEntity
{
    use DTOHelper;

    const string getId = 'id'; // ID

    const string getEmail = 'email';

    const string getStat = 'stat';

    const string getHash = 'hash';

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    private string $email;

    #[OA\Property(property: 'stat', description: '', type: 'integer')]
    private int $stat;

    #[OA\Property(property: 'hash', description: '', type: 'string')]
    private string $hash;

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
