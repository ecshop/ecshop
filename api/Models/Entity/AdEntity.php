<?php

namespace App\Models\Entity;

/**
 * Class AdEntity
 * @package App\Models\Entity
 */
class AdEntity
{
    /**
     * @var int 
     */
    private int $ad_id;

    /**
     * @var int 
     */
    private int $position_id;

    /**
     * @var int 
     */
    private int $media_type;

    /**
     * @var string 
     */
    private string $ad_name;

    /**
     * @var string 
     */
    private string $ad_link;

    /**
     * @var string 
     */
    private string $ad_code;

    /**
     * @var int 
     */
    private int $start_time;

    /**
     * @var int 
     */
    private int $end_time;

    /**
     * @var string 
     */
    private string $link_man;

    /**
     * @var string 
     */
    private string $link_email;

    /**
     * @var string 
     */
    private string $link_phone;

    /**
     * @var int 
     */
    private int $click_count;

    /**
     * @var int 
     */
    private int $enabled;

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
    public function getPositionId(): int
    {
        return $this->position_id;
    }

    /**
     * @param int $value
     */
    public function setPositionId(int $value)
    {
        $this->position_id = $value;
    }

    /**
     * @return int
     */
    public function getMediaType(): int
    {
        return $this->media_type;
    }

    /**
     * @param int $value
     */
    public function setMediaType(int $value)
    {
        $this->media_type = $value;
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
     * @return string
     */
    public function getAdLink(): string
    {
        return $this->ad_link;
    }

    /**
     * @param string $value
     */
    public function setAdLink(string $value)
    {
        $this->ad_link = $value;
    }

    /**
     * @return string
     */
    public function getAdCode(): string
    {
        return $this->ad_code;
    }

    /**
     * @param string $value
     */
    public function setAdCode(string $value)
    {
        $this->ad_code = $value;
    }

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->start_time;
    }

    /**
     * @param int $value
     */
    public function setStartTime(int $value)
    {
        $this->start_time = $value;
    }

    /**
     * @return int
     */
    public function getEndTime(): int
    {
        return $this->end_time;
    }

    /**
     * @param int $value
     */
    public function setEndTime(int $value)
    {
        $this->end_time = $value;
    }

    /**
     * @return string
     */
    public function getLinkMan(): string
    {
        return $this->link_man;
    }

    /**
     * @param string $value
     */
    public function setLinkMan(string $value)
    {
        $this->link_man = $value;
    }

    /**
     * @return string
     */
    public function getLinkEmail(): string
    {
        return $this->link_email;
    }

    /**
     * @param string $value
     */
    public function setLinkEmail(string $value)
    {
        $this->link_email = $value;
    }

    /**
     * @return string
     */
    public function getLinkPhone(): string
    {
        return $this->link_phone;
    }

    /**
     * @param string $value
     */
    public function setLinkPhone(string $value)
    {
        $this->link_phone = $value;
    }

    /**
     * @return int
     */
    public function getClickCount(): int
    {
        return $this->click_count;
    }

    /**
     * @param int $value
     */
    public function setClickCount(int $value)
    {
        $this->click_count = $value;
    }

    /**
     * @return int
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * @param int $value
     */
    public function setEnabled(int $value)
    {
        $this->enabled = $value;
    }

}
