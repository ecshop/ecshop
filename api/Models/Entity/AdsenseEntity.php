<?php

namespace App\Models\Entity;

/**
 * Class AdsenseEntity
 * @package App\Models\Entity
 */
class AdsenseEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $from_ad;

    /**
     * @var string 
     */
    private string $referer;

    /**
     * @var int 
     */
    private int $clicks;

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
    public function getFromAd(): int
    {
        return $this->from_ad;
    }

    /**
     * @param int $value
     */
    public function setFromAd(int $value)
    {
        $this->from_ad = $value;
    }

    /**
     * @return string
     */
    public function getReferer(): string
    {
        return $this->referer;
    }

    /**
     * @param string $value
     */
    public function setReferer(string $value)
    {
        $this->referer = $value;
    }

    /**
     * @return int
     */
    public function getClicks(): int
    {
        return $this->clicks;
    }

    /**
     * @param int $value
     */
    public function setClicks(int $value)
    {
        $this->clicks = $value;
    }

}
