<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopStats;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopStatsResponse')]
class ShopStatsResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'accessTime', description: '访问时间戳', type: 'integer')]
    private int $accessTime;

    #[OA\Property(property: 'ipAddress', description: '访问者IP地址', type: 'string')]
    private string $ipAddress;

    #[OA\Property(property: 'visitTimes', description: '访问次数', type: 'integer')]
    private int $visitTimes;

    #[OA\Property(property: 'browser', description: '浏览器类型', type: 'string')]
    private string $browser;

    #[OA\Property(property: 'system', description: '操作系统', type: 'string')]
    private string $system;

    #[OA\Property(property: 'language', description: '语言设置', type: 'string')]
    private string $language;

    #[OA\Property(property: 'area', description: '地区信息', type: 'string')]
    private string $area;

    #[OA\Property(property: 'refererDomain', description: '来源域名', type: 'string')]
    private string $refererDomain;

    #[OA\Property(property: 'refererPath', description: '来源路径', type: 'string')]
    private string $refererPath;

    #[OA\Property(property: 'accessUrl', description: '访问URL', type: 'string')]
    private string $accessUrl;

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

    public function getAccessTime(): int
    {
        return $this->accessTime;
    }

    public function setAccessTime(int $accessTime): void
    {
        $this->accessTime = $accessTime;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    public function getVisitTimes(): int
    {
        return $this->visitTimes;
    }

    public function setVisitTimes(int $visitTimes): void
    {
        $this->visitTimes = $visitTimes;
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
        return $this->refererDomain;
    }

    public function setRefererDomain(string $refererDomain): void
    {
        $this->refererDomain = $refererDomain;
    }

    public function getRefererPath(): string
    {
        return $this->refererPath;
    }

    public function setRefererPath(string $refererPath): void
    {
        $this->refererPath = $refererPath;
    }

    public function getAccessUrl(): string
    {
        return $this->accessUrl;
    }

    public function setAccessUrl(string $accessUrl): void
    {
        $this->accessUrl = $accessUrl;
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
