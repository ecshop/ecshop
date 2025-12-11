<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdsenseEntity')]
class AdsenseEntity
{
    use DTOHelper;

    const string getId = 'id'; // ID

    const string getFromAd = 'from_ad';

    const string getReferer = 'referer';

    const string getClicks = 'clicks';

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'fromAd', description: '', type: 'integer')]
    private int $fromAd;

    #[OA\Property(property: 'referer', description: '', type: 'string')]
    private string $referer;

    #[OA\Property(property: 'clicks', description: '', type: 'integer')]
    private int $clicks;

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
