<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdSchema')]
class Ad
{
    use ArrayObject;

    #[OA\Property(property: 'ad_id', description: '', type: 'integer')]
    protected int $adId;

    #[OA\Property(property: 'position_id', description: '', type: 'integer')]
    protected int $positionId;

    #[OA\Property(property: 'media_type', description: '', type: 'integer')]
    protected int $mediaType;

    #[OA\Property(property: 'ad_name', description: '', type: 'string')]
    protected string $adName;

    #[OA\Property(property: 'ad_link', description: '', type: 'string')]
    protected string $adLink;

    #[OA\Property(property: 'ad_code', description: '', type: 'string')]
    protected string $adCode;

    #[OA\Property(property: 'start_time', description: '', type: 'integer')]
    protected int $startTime;

    #[OA\Property(property: 'end_time', description: '', type: 'integer')]
    protected int $endTime;

    #[OA\Property(property: 'link_man', description: '', type: 'string')]
    protected string $linkMan;

    #[OA\Property(property: 'link_email', description: '', type: 'string')]
    protected string $linkEmail;

    #[OA\Property(property: 'link_phone', description: '', type: 'string')]
    protected string $linkPhone;

    #[OA\Property(property: 'click_count', description: '', type: 'integer')]
    protected int $clickCount;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    protected int $enabled;

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
    public function getPositionId(): int
    {
        return $this->positionId;
    }

    /**
     * 设置
     */
    public function setPositionId(int $positionId): void
    {
        $this->positionId = $positionId;
    }

    /**
     * 获取
     */
    public function getMediaType(): int
    {
        return $this->mediaType;
    }

    /**
     * 设置
     */
    public function setMediaType(int $mediaType): void
    {
        $this->mediaType = $mediaType;
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
    public function getAdLink(): string
    {
        return $this->adLink;
    }

    /**
     * 设置
     */
    public function setAdLink(string $adLink): void
    {
        $this->adLink = $adLink;
    }

    /**
     * 获取
     */
    public function getAdCode(): string
    {
        return $this->adCode;
    }

    /**
     * 设置
     */
    public function setAdCode(string $adCode): void
    {
        $this->adCode = $adCode;
    }

    /**
     * 获取
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * 设置
     */
    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * 获取
     */
    public function getEndTime(): int
    {
        return $this->endTime;
    }

    /**
     * 设置
     */
    public function setEndTime(int $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * 获取
     */
    public function getLinkMan(): string
    {
        return $this->linkMan;
    }

    /**
     * 设置
     */
    public function setLinkMan(string $linkMan): void
    {
        $this->linkMan = $linkMan;
    }

    /**
     * 获取
     */
    public function getLinkEmail(): string
    {
        return $this->linkEmail;
    }

    /**
     * 设置
     */
    public function setLinkEmail(string $linkEmail): void
    {
        $this->linkEmail = $linkEmail;
    }

    /**
     * 获取
     */
    public function getLinkPhone(): string
    {
        return $this->linkPhone;
    }

    /**
     * 设置
     */
    public function setLinkPhone(string $linkPhone): void
    {
        $this->linkPhone = $linkPhone;
    }

    /**
     * 获取
     */
    public function getClickCount(): int
    {
        return $this->clickCount;
    }

    /**
     * 设置
     */
    public function setClickCount(int $clickCount): void
    {
        $this->clickCount = $clickCount;
    }

    /**
     * 获取
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * 设置
     */
    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
    }
}
