<?php

namespace App\Models\Entity;

/**
 * Class StatsEntity
 * @package App\Models\Entity
 */
class StatsEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $access_time;

    /**
     * @var string 
     */
    private string $ip_address;

    /**
     * @var int 
     */
    private int $visit_times;

    /**
     * @var string 
     */
    private string $browser;

    /**
     * @var string 
     */
    private string $system;

    /**
     * @var string 
     */
    private string $language;

    /**
     * @var string 
     */
    private string $area;

    /**
     * @var string 
     */
    private string $referer_domain;

    /**
     * @var string 
     */
    private string $referer_path;

    /**
     * @var string 
     */
    private string $access_url;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value)
    {
        $this->id = $value;
    }

    /**
     * @return int
     */
    public function getAccessTime(): int
    {
        return $this->access_time;
    }

    /**
     * @param int $value
     */
    public function setAccessTime(int $value)
    {
        $this->access_time = $value;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ip_address;
    }

    /**
     * @param string $value
     */
    public function setIpAddress(string $value)
    {
        $this->ip_address = $value;
    }

    /**
     * @return int
     */
    public function getVisitTimes(): int
    {
        return $this->visit_times;
    }

    /**
     * @param int $value
     */
    public function setVisitTimes(int $value)
    {
        $this->visit_times = $value;
    }

    /**
     * @return string
     */
    public function getBrowser(): string
    {
        return $this->browser;
    }

    /**
     * @param string $value
     */
    public function setBrowser(string $value)
    {
        $this->browser = $value;
    }

    /**
     * @return string
     */
    public function getSystem(): string
    {
        return $this->system;
    }

    /**
     * @param string $value
     */
    public function setSystem(string $value)
    {
        $this->system = $value;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $value
     */
    public function setLanguage(string $value)
    {
        $this->language = $value;
    }

    /**
     * @return string
     */
    public function getArea(): string
    {
        return $this->area;
    }

    /**
     * @param string $value
     */
    public function setArea(string $value)
    {
        $this->area = $value;
    }

    /**
     * @return string
     */
    public function getRefererDomain(): string
    {
        return $this->referer_domain;
    }

    /**
     * @param string $value
     */
    public function setRefererDomain(string $value)
    {
        $this->referer_domain = $value;
    }

    /**
     * @return string
     */
    public function getRefererPath(): string
    {
        return $this->referer_path;
    }

    /**
     * @param string $value
     */
    public function setRefererPath(string $value)
    {
        $this->referer_path = $value;
    }

    /**
     * @return string
     */
    public function getAccessUrl(): string
    {
        return $this->access_url;
    }

    /**
     * @param string $value
     */
    public function setAccessUrl(string $value)
    {
        $this->access_url = $value;
    }

}
