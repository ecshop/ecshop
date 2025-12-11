<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdEntity')]
class AdEntity
{
    use DTOHelper;

    const string getAdId = 'ad_id';

    const string getPositionId = 'position_id';

    const string getMediaType = 'media_type';

    const string getAdName = 'ad_name';

    const string getAdLink = 'ad_link';

    const string getAdCode = 'ad_code';

    const string getStartTime = 'start_time';

    const string getEndTime = 'end_time';

    const string getLinkMan = 'link_man';

    const string getLinkEmail = 'link_email';

    const string getLinkPhone = 'link_phone';

    const string getClickCount = 'click_count';

    const string getEnabled = 'enabled';

    #[OA\Property(property: 'adId', description: '', type: 'integer')]
    private int $adId;

    #[OA\Property(property: 'positionId', description: '', type: 'integer')]
    private int $positionId;

    #[OA\Property(property: 'mediaType', description: '', type: 'integer')]
    private int $mediaType;

    #[OA\Property(property: 'adName', description: '', type: 'string')]
    private string $adName;

    #[OA\Property(property: 'adLink', description: '', type: 'string')]
    private string $adLink;

    #[OA\Property(property: 'adCode', description: '', type: 'string')]
    private string $adCode;

    #[OA\Property(property: 'startTime', description: '', type: 'integer')]
    private int $startTime;

    #[OA\Property(property: 'endTime', description: '', type: 'integer')]
    private int $endTime;

    #[OA\Property(property: 'linkMan', description: '', type: 'string')]
    private string $linkMan;

    #[OA\Property(property: 'linkEmail', description: '', type: 'string')]
    private string $linkEmail;

    #[OA\Property(property: 'linkPhone', description: '', type: 'string')]
    private string $linkPhone;

    #[OA\Property(property: 'clickCount', description: '', type: 'integer')]
    private int $clickCount;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    private int $enabled;

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
