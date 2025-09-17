<?php

declare(strict_types=1);

namespace app\modules\admin\response\ad;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdResponse')]
class AdResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '广告ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'positionId', description: '广告位ID', type: 'integer')]
    private int $positionId;

    #[OA\Property(property: 'mediaType', description: '媒体类型', type: 'integer')]
    private int $mediaType;

    #[OA\Property(property: 'adName', description: '广告名称', type: 'string')]
    private string $adName;

    #[OA\Property(property: 'adLink', description: '广告链接', type: 'string')]
    private string $adLink;

    #[OA\Property(property: 'adCode', description: '广告代码', type: 'string')]
    private string $adCode;

    #[OA\Property(property: 'startTime', description: '开始时间', type: 'integer')]
    private int $startTime;

    #[OA\Property(property: 'endTime', description: '结束时间', type: 'integer')]
    private int $endTime;

    #[OA\Property(property: 'linkMan', description: '联系人', type: 'string')]
    private string $linkMan;

    #[OA\Property(property: 'linkEmail', description: '联系邮箱', type: 'string')]
    private string $linkEmail;

    #[OA\Property(property: 'linkPhone', description: '联系电话', type: 'string')]
    private string $linkPhone;

    #[OA\Property(property: 'clickCount', description: '点击次数', type: 'integer')]
    private int $clickCount;

    #[OA\Property(property: 'enabled', description: '是否启用', type: 'integer')]
    private int $enabled;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPositionId(): int
    {
        return $this->positionId;
    }

    public function setPositionId(int $positionId): void
    {
        $this->positionId = $positionId;
    }

    public function getMediaType(): int
    {
        return $this->mediaType;
    }

    public function setMediaType(int $mediaType): void
    {
        $this->mediaType = $mediaType;
    }

    public function getAdName(): string
    {
        return $this->adName;
    }

    public function setAdName(string $adName): void
    {
        $this->adName = $adName;
    }

    public function getAdLink(): string
    {
        return $this->adLink;
    }

    public function setAdLink(string $adLink): void
    {
        $this->adLink = $adLink;
    }

    public function getAdCode(): string
    {
        return $this->adCode;
    }

    public function setAdCode(string $adCode): void
    {
        $this->adCode = $adCode;
    }

    public function getStartTime(): int
    {
        return $this->startTime;
    }

    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->endTime;
    }

    public function setEndTime(int $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function getLinkMan(): string
    {
        return $this->linkMan;
    }

    public function setLinkMan(string $linkMan): void
    {
        $this->linkMan = $linkMan;
    }

    public function getLinkEmail(): string
    {
        return $this->linkEmail;
    }

    public function setLinkEmail(string $linkEmail): void
    {
        $this->linkEmail = $linkEmail;
    }

    public function getLinkPhone(): string
    {
        return $this->linkPhone;
    }

    public function setLinkPhone(string $linkPhone): void
    {
        $this->linkPhone = $linkPhone;
    }

    public function getClickCount(): int
    {
        return $this->clickCount;
    }

    public function setClickCount(int $clickCount): void
    {
        $this->clickCount = $clickCount;
    }

    public function getEnabled(): int
    {
        return $this->enabled;
    }

    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}
