<?php

declare(strict_types=1);

namespace app\bundles\ad\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdCustomEntity')]
class AdCustomEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '广告ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'ad_type', description: '广告类型', type: 'integer')]
    private int $ad_type;

    #[OA\Property(property: 'ad_name', description: '广告名称', type: 'string')]
    private string $ad_name;

    #[OA\Property(property: 'add_time', description: '添加时间', type: 'integer')]
    private int $add_time;

    #[OA\Property(property: 'content', description: '广告内容', type: 'string')]
    private string $content;

    #[OA\Property(property: 'url', description: '广告链接', type: 'string')]
    private string $url;

    #[OA\Property(property: 'ad_status', description: '广告状态', type: 'integer')]
    private int $ad_status;

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

    public function getAdType(): int
    {
        return $this->ad_type;
    }

    public function setAdType(int $adType): void
    {
        $this->ad_type = $adType;
    }

    public function getAdName(): string
    {
        return $this->ad_name;
    }

    public function setAdName(string $adName): void
    {
        $this->ad_name = $adName;
    }

    public function getAddTime(): int
    {
        return $this->add_time;
    }

    public function setAddTime(int $addTime): void
    {
        $this->add_time = $addTime;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getAdStatus(): int
    {
        return $this->ad_status;
    }

    public function setAdStatus(int $adStatus): void
    {
        $this->ad_status = $adStatus;
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
