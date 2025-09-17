<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopStatsEntity')]
class ShopStatsEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'access_time', description: '访问时间戳', type: 'integer')]
    private int $access_time;

    #[OA\Property(property: 'ip_address', description: '访问者IP地址', type: 'string')]
    private string $ip_address;

    #[OA\Property(property: 'visit_times', description: '访问次数', type: 'integer')]
    private int $visit_times;

    #[OA\Property(property: 'browser', description: '浏览器类型', type: 'string')]
    private string $browser;

    #[OA\Property(property: 'system', description: '操作系统', type: 'string')]
    private string $system;

    #[OA\Property(property: 'language', description: '语言设置', type: 'string')]
    private string $language;

    #[OA\Property(property: 'area', description: '地区信息', type: 'string')]
    private string $area;

    #[OA\Property(property: 'referer_domain', description: '来源域名', type: 'string')]
    private string $referer_domain;

    #[OA\Property(property: 'referer_path', description: '来源路径', type: 'string')]
    private string $referer_path;

    #[OA\Property(property: 'access_url', description: '访问URL', type: 'string')]
    private string $access_url;

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

    public function getAccessTime(): int
    {
        return $this->access_time;
    }

    public function setAccessTime(int $accessTime): void
    {
        $this->access_time = $accessTime;
    }

    public function getIpAddress(): string
    {
        return $this->ip_address;
    }

    public function setIpAddress(string $ipAddress): void
    {
        $this->ip_address = $ipAddress;
    }

    public function getVisitTimes(): int
    {
        return $this->visit_times;
    }

    public function setVisitTimes(int $visitTimes): void
    {
        $this->visit_times = $visitTimes;
    }

    public function getBrowser(): string
    {
        return $this->browser;
    }

    public function setBrowser(string $browser): void
    {
        $this->browser = $browser;
    }

    public function getSystem(): string
    {
        return $this->system;
    }

    public function setSystem(string $system): void
    {
        $this->system = $system;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getArea(): string
    {
        return $this->area;
    }

    public function setArea(string $area): void
    {
        $this->area = $area;
    }

    public function getRefererDomain(): string
    {
        return $this->referer_domain;
    }

    public function setRefererDomain(string $refererDomain): void
    {
        $this->referer_domain = $refererDomain;
    }

    public function getRefererPath(): string
    {
        return $this->referer_path;
    }

    public function setRefererPath(string $refererPath): void
    {
        $this->referer_path = $refererPath;
    }

    public function getAccessUrl(): string
    {
        return $this->access_url;
    }

    public function setAccessUrl(string $accessUrl): void
    {
        $this->access_url = $accessUrl;
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
