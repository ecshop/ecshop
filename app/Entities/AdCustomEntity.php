<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdCustomEntity')]
class AdCustomEntity
{
    use DTOHelper;

    const string getAdId = 'ad_id';

    const string getAdType = 'ad_type';

    const string getAdName = 'ad_name';

    const string getAddTime = 'add_time';

    const string getContent = 'content';

    const string getUrl = 'url';

    const string getAdStatus = 'ad_status';

    #[OA\Property(property: 'adId', description: '', type: 'integer')]
    private int $adId;

    #[OA\Property(property: 'adType', description: '', type: 'integer')]
    private int $adType;

    #[OA\Property(property: 'adName', description: '', type: 'string')]
    private string $adName;

    #[OA\Property(property: 'addTime', description: '', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'content', description: '', type: 'string')]
    private string $content;

    #[OA\Property(property: 'url', description: '', type: 'string')]
    private string $url;

    #[OA\Property(property: 'adStatus', description: '', type: 'integer')]
    private int $adStatus;

    /**
     * 获取
     */
    public function getAdId(): int
    {
        return $this->adId;
    }

    /**
     * 设置
     */
    public function setAdId(int $adId): void
    {
        $this->adId = $adId;
    }

    /**
     * 获取
     */
    public function getAdType(): int
    {
        return $this->adType;
    }

    /**
     * 设置
     */
    public function setAdType(int $adType): void
    {
        $this->adType = $adType;
    }

    /**
     * 获取
     */
    public function getAdName(): string
    {
        return $this->adName;
    }

    /**
     * 设置
     */
    public function setAdName(string $adName): void
    {
        $this->adName = $adName;
    }

    /**
     * 获取
     */
    public function getAddTime(): int
    {
        return $this->addTime;
    }

    /**
     * 设置
     */
    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    /**
     * 获取
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * 设置
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * 获取
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * 设置
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * 获取
     */
    public function getAdStatus(): int
    {
        return $this->adStatus;
    }

    /**
     * 设置
     */
    public function setAdStatus(int $adStatus): void
    {
        $this->adStatus = $adStatus;
    }
}
