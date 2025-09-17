<?php

declare(strict_types=1);

namespace app\modules\admin\response\adCustom;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdCustomResponse')]
class AdCustomResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '广告ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'adType', description: '广告类型', type: 'integer')]
    private int $adType;

    #[OA\Property(property: 'adName', description: '广告名称', type: 'string')]
    private string $adName;

    #[OA\Property(property: 'addTime', description: '添加时间', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'content', description: '广告内容', type: 'string')]
    private string $content;

    #[OA\Property(property: 'url', description: '广告链接', type: 'string')]
    private string $url;

    #[OA\Property(property: 'adStatus', description: '广告状态', type: 'integer')]
    private int $adStatus;

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

    public function getAdType(): int
    {
        return $this->adType;
    }

    public function setAdType(int $adType): void
    {
        $this->adType = $adType;
    }

    public function getAdName(): string
    {
        return $this->adName;
    }

    public function setAdName(string $adName): void
    {
        $this->adName = $adName;
    }

    public function getAddTime(): int
    {
        return $this->addTime;
    }

    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
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
        return $this->adStatus;
    }

    public function setAdStatus(int $adStatus): void
    {
        $this->adStatus = $adStatus;
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
