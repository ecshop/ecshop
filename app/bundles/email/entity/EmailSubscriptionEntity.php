<?php

declare(strict_types=1);

namespace app\bundles\email\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'EmailSubscriptionEntity')]
class EmailSubscriptionEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '记录ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'email', description: '邮箱地址', type: 'string')]
    private string $email;

    #[OA\Property(property: 'stat', description: '状态(0未验证 1已验证)', type: 'integer')]
    private int $stat;

    #[OA\Property(property: 'hash', description: '验证哈希值', type: 'string')]
    private string $hash;

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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getStat(): int
    {
        return $this->stat;
    }

    public function setStat(int $stat): void
    {
        $this->stat = $stat;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
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
