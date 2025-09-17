<?php

declare(strict_types=1);

namespace app\bundles\ad\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdEntity')]
class AdEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '广告ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'position_id', description: '广告位ID', type: 'integer')]
    private int $position_id;

    #[OA\Property(property: 'media_type', description: '媒体类型', type: 'integer')]
    private int $media_type;

    #[OA\Property(property: 'ad_name', description: '广告名称', type: 'string')]
    private string $ad_name;

    #[OA\Property(property: 'ad_link', description: '广告链接', type: 'string')]
    private string $ad_link;

    #[OA\Property(property: 'ad_code', description: '广告代码', type: 'string')]
    private string $ad_code;

    #[OA\Property(property: 'start_time', description: '开始时间', type: 'integer')]
    private int $start_time;

    #[OA\Property(property: 'end_time', description: '结束时间', type: 'integer')]
    private int $end_time;

    #[OA\Property(property: 'link_man', description: '联系人', type: 'string')]
    private string $link_man;

    #[OA\Property(property: 'link_email', description: '联系邮箱', type: 'string')]
    private string $link_email;

    #[OA\Property(property: 'link_phone', description: '联系电话', type: 'string')]
    private string $link_phone;

    #[OA\Property(property: 'click_count', description: '点击次数', type: 'integer')]
    private int $click_count;

    #[OA\Property(property: 'enabled', description: '是否启用', type: 'integer')]
    private int $enabled;

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

    public function getPositionId(): int
    {
        return $this->position_id;
    }

    public function setPositionId(int $positionId): void
    {
        $this->position_id = $positionId;
    }

    public function getMediaType(): int
    {
        return $this->media_type;
    }

    public function setMediaType(int $mediaType): void
    {
        $this->media_type = $mediaType;
    }

    public function getAdName(): string
    {
        return $this->ad_name;
    }

    public function setAdName(string $adName): void
    {
        $this->ad_name = $adName;
    }

    public function getAdLink(): string
    {
        return $this->ad_link;
    }

    public function setAdLink(string $adLink): void
    {
        $this->ad_link = $adLink;
    }

    public function getAdCode(): string
    {
        return $this->ad_code;
    }

    public function setAdCode(string $adCode): void
    {
        $this->ad_code = $adCode;
    }

    public function getStartTime(): int
    {
        return $this->start_time;
    }

    public function setStartTime(int $startTime): void
    {
        $this->start_time = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->end_time;
    }

    public function setEndTime(int $endTime): void
    {
        $this->end_time = $endTime;
    }

    public function getLinkMan(): string
    {
        return $this->link_man;
    }

    public function setLinkMan(string $linkMan): void
    {
        $this->link_man = $linkMan;
    }

    public function getLinkEmail(): string
    {
        return $this->link_email;
    }

    public function setLinkEmail(string $linkEmail): void
    {
        $this->link_email = $linkEmail;
    }

    public function getLinkPhone(): string
    {
        return $this->link_phone;
    }

    public function setLinkPhone(string $linkPhone): void
    {
        $this->link_phone = $linkPhone;
    }

    public function getClickCount(): int
    {
        return $this->click_count;
    }

    public function setClickCount(int $clickCount): void
    {
        $this->click_count = $clickCount;
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
