<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'StatEntity')]
class StatEntity
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'access_time', description: '', type: 'integer')]
    protected int $accessTime;

    #[OA\Property(property: 'ip_address', description: '', type: 'string')]
    protected string $ipAddress;

    #[OA\Property(property: 'visit_times', description: '', type: 'integer')]
    protected int $visitTimes;

    #[OA\Property(property: 'browser', description: '', type: 'string')]
    protected string $browser;

    #[OA\Property(property: 'system', description: '', type: 'string')]
    protected string $system;

    #[OA\Property(property: 'language', description: '', type: 'string')]
    protected string $language;

    #[OA\Property(property: 'area', description: '', type: 'string')]
    protected string $area;

    #[OA\Property(property: 'referer_domain', description: '', type: 'string')]
    protected string $refererDomain;

    #[OA\Property(property: 'referer_path', description: '', type: 'string')]
    protected string $refererPath;

    #[OA\Property(property: 'access_url', description: '', type: 'string')]
    protected string $accessUrl;

    /**
     * 获取
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置
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
