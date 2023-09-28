<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'SessionEntity')]
class SessionEntity
{
    use ArrayObject;

    #[OA\Property(property: 'sesskey', description: '', type: 'string')]
    protected string $sesskey;

    #[OA\Property(property: 'expiry', description: '', type: 'integer')]
    protected int $expiry;

    #[OA\Property(property: 'userid', description: '', type: 'integer')]
    protected int $userid;

    #[OA\Property(property: 'adminid', description: '', type: 'integer')]
    protected int $adminid;

    #[OA\Property(property: 'ip', description: '', type: 'string')]
    protected string $ip;

    #[OA\Property(property: 'user_name', description: '', type: 'string')]
    protected string $userName;

    #[OA\Property(property: 'user_rank', description: '', type: 'integer')]
    protected int $userRank;

    #[OA\Property(property: 'discount', description: '', type: 'float')]
    protected float $discount;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    protected string $email;

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
    public function getUserid(): int
    {
        return $this->userid;
    }

    /**
     * 设置
     */
    public function setUserid(int $userid): void
    {
        $this->userid = $userid;
    }

    /**
     * 获取
     */
    public function getAdminid(): int
    {
        return $this->adminid;
    }

    /**
     * 设置
     */
    public function setAdminid(int $adminid): void
    {
        $this->adminid = $adminid;
    }

    /**
     * 获取
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * 设置
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * 获取
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * 设置
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * 获取
     */
    public function getUserRank(): int
    {
        return $this->userRank;
    }

    /**
     * 设置
     */
    public function setUserRank(int $userRank): void
    {
        $this->userRank = $userRank;
    }

    /**
     * 获取
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * 设置
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
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
