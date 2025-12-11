<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'StatsEntity')]
class StatsEntity
{
    use DTOHelper;

    const string getId = 'id'; // ID

    const string getAccessTime = 'access_time';

    const string getIpAddress = 'ip_address';

    const string getVisitTimes = 'visit_times';

    const string getBrowser = 'browser';

    const string getSystem = 'system';

    const string getLanguage = 'language';

    const string getArea = 'area';

    const string getRefererDomain = 'referer_domain';

    const string getRefererPath = 'referer_path';

    const string getAccessUrl = 'access_url';

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'accessTime', description: '', type: 'integer')]
    private int $accessTime;

    #[OA\Property(property: 'ipAddress', description: '', type: 'string')]
    private string $ipAddress;

    #[OA\Property(property: 'visitTimes', description: '', type: 'integer')]
    private int $visitTimes;

    #[OA\Property(property: 'browser', description: '', type: 'string')]
    private string $browser;

    #[OA\Property(property: 'system', description: '', type: 'string')]
    private string $system;

    #[OA\Property(property: 'language', description: '', type: 'string')]
    private string $language;

    #[OA\Property(property: 'area', description: '', type: 'string')]
    private string $area;

    #[OA\Property(property: 'refererDomain', description: '', type: 'string')]
    private string $refererDomain;

    #[OA\Property(property: 'refererPath', description: '', type: 'string')]
    private string $refererPath;

    #[OA\Property(property: 'accessUrl', description: '', type: 'string')]
    private string $accessUrl;

    /**
     * 获取ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置ID
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * 获取
     */
    public function getAccessTime(): int
    {
        return $this->accessTime;
    }

    /**
     * 设置
     */
    public function setAccessTime(int $accessTime): void
    {
        $this->accessTime = $accessTime;
    }

    /**
     * 获取
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * 设置
     */
    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * 获取
     */
    public function getVisitTimes(): int
    {
        return $this->visitTimes;
    }

    /**
     * 设置
     */
    public function setVisitTimes(int $visitTimes): void
    {
        $this->visitTimes = $visitTimes;
    }

    /**
     * 获取
     */
    public function getBrowser(): string
    {
        return $this->browser;
    }

    /**
     * 设置
     */
    public function setBrowser(string $browser): void
    {
        $this->browser = $browser;
    }

    /**
     * 获取
     */
    public function getSystem(): string
    {
        return $this->system;
    }

    /**
     * 设置
     */
    public function setSystem(string $system): void
    {
        $this->system = $system;
    }

    /**
     * 获取
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * 设置
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * 获取
     */
    public function getArea(): string
    {
        return $this->area;
    }

    /**
     * 设置
     */
    public function setArea(string $area): void
    {
        $this->area = $area;
    }

    /**
     * 获取
     */
    public function getRefererDomain(): string
    {
        return $this->refererDomain;
    }

    /**
     * 设置
     */
    public function setRefererDomain(string $refererDomain): void
    {
        $this->refererDomain = $refererDomain;
    }

    /**
     * 获取
     */
    public function getRefererPath(): string
    {
        return $this->refererPath;
    }

    /**
     * 设置
     */
    public function setRefererPath(string $refererPath): void
    {
        $this->refererPath = $refererPath;
    }

    /**
     * 获取
     */
    public function getAccessUrl(): string
    {
        return $this->accessUrl;
    }

    /**
     * 设置
     */
    public function setAccessUrl(string $accessUrl): void
    {
        $this->accessUrl = $accessUrl;
    }
}
