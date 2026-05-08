<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\SessionsData;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'SessionsDataResponse')]
class SessionsDataResponse
{
    use DTOHelper;

    #[OA\Property(property: 'sesskey', description: '', type: 'string')]
    private string $sesskey;

    #[OA\Property(property: 'expiry', description: '', type: 'integer')]
    private int $expiry;

    #[OA\Property(property: 'data', description: '', type: 'string')]
    private string $data;

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
