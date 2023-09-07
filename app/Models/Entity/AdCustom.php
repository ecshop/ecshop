<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdCustomSchema')]
class AdCustom
{
    use ArrayObject;

    #[OA\Property(property: 'ad_id', description: '', type: 'integer')]
    protected int $adId;

    #[OA\Property(property: 'ad_type', description: '', type: 'integer')]
    protected int $adType;

    #[OA\Property(property: 'ad_name', description: '', type: 'string')]
    protected string $adName;

    #[OA\Property(property: 'add_time', description: '', type: 'integer')]
    protected int $addTime;

    #[OA\Property(property: 'content', description: '', type: 'string')]
    protected string $content;

    #[OA\Property(property: 'url', description: '', type: 'string')]
    protected string $url;

    #[OA\Property(property: 'ad_status', description: '', type: 'integer')]
    protected int $adStatus;

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
