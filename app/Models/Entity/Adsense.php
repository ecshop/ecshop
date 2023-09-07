<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdsenseSchema')]
class Adsense
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'from_ad', description: '', type: 'integer')]
    protected int $fromAd;

    #[OA\Property(property: 'referer', description: '', type: 'string')]
    protected string $referer;

    #[OA\Property(property: 'clicks', description: '', type: 'integer')]
    protected int $clicks;

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
    public function getFromAd(): int
    {
        return $this->fromAd;
    }

    /**
     * 设置
     */
    public function setFromAd(int $fromAd): void
    {
        $this->fromAd = $fromAd;
    }

    /**
     * 获取
     */
    public function getReferer(): string
    {
        return $this->referer;
    }

    /**
     * 设置
     */
    public function setReferer(string $referer): void
    {
        $this->referer = $referer;
    }

    /**
     * 获取
     */
    public function getClicks(): int
    {
        return $this->clicks;
    }

    /**
     * 设置
     */
    public function setClicks(int $clicks): void
    {
        $this->clicks = $clicks;
    }
}
