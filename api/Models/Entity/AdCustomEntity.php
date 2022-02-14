<?php

namespace App\Models\Entity;

/**
 * Class AdCustomEntity
 * @package App\Models\Entity
 */
class AdCustomEntity
{
    /**
     * @var int 
     */
    private int $ad_id;

    /**
     * @var int 
     */
    private int $ad_type;

    /**
     * @var string 
     */
    private string $ad_name;

    /**
     * @var int 
     */
    private int $add_time;

    /**
     * @var string 
     */
    private string $content;

    /**
     * @var string 
     */
    private string $url;

    /**
     * @var int 
     */
    private int $ad_status;

    /**
     * @return int
     */
    public function getAdId(): int
    {
        return $this->ad_id;
    }

    /**
     * @param int $value
     */
    public function setAdId(int $value)
    {
        $this->ad_id = $value;
    }

    /**
     * @return int
     */
    public function getAdType(): int
    {
        return $this->ad_type;
    }

    /**
     * @param int $value
     */
    public function setAdType(int $value)
    {
        $this->ad_type = $value;
    }

    /**
     * @return string
     */
    public function getAdName(): string
    {
        return $this->ad_name;
    }

    /**
     * @param string $value
     */
    public function setAdName(string $value)
    {
        $this->ad_name = $value;
    }

    /**
     * @return int
     */
    public function getAddTime(): int
    {
        return $this->add_time;
    }

    /**
     * @param int $value
     */
    public function setAddTime(int $value)
    {
        $this->add_time = $value;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $value
     */
    public function setContent(string $value)
    {
        $this->content = $value;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $value
     */
    public function setUrl(string $value)
    {
        $this->url = $value;
    }

    /**
     * @return int
     */
    public function getAdStatus(): int
    {
        return $this->ad_status;
    }

    /**
     * @param int $value
     */
    public function setAdStatus(int $value)
    {
        $this->ad_status = $value;
    }

}
