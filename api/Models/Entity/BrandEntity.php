<?php

namespace App\Models\Entity;

/**
 * Class BrandEntity
 * @package App\Models\Entity
 */
class BrandEntity
{
    /**
     * @var int 
     */
    private int $brand_id;

    /**
     * @var string 
     */
    private string $brand_name;

    /**
     * @var string 
     */
    private string $brand_logo;

    /**
     * @var string 
     */
    private string $brand_desc;

    /**
     * @var string 
     */
    private string $site_url;

    /**
     * @var int 
     */
    private int $sort_order;

    /**
     * @var int 
     */
    private int $is_show;

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brand_id;
    }

    /**
     * @param int $value
     */
    public function setBrandId(int $value)
    {
        $this->brand_id = $value;
    }

    /**
     * @return string
     */
    public function getBrandName(): string
    {
        return $this->brand_name;
    }

    /**
     * @param string $value
     */
    public function setBrandName(string $value)
    {
        $this->brand_name = $value;
    }

    /**
     * @return string
     */
    public function getBrandLogo(): string
    {
        return $this->brand_logo;
    }

    /**
     * @param string $value
     */
    public function setBrandLogo(string $value)
    {
        $this->brand_logo = $value;
    }

    /**
     * @return string
     */
    public function getBrandDesc(): string
    {
        return $this->brand_desc;
    }

    /**
     * @param string $value
     */
    public function setBrandDesc(string $value)
    {
        $this->brand_desc = $value;
    }

    /**
     * @return string
     */
    public function getSiteUrl(): string
    {
        return $this->site_url;
    }

    /**
     * @param string $value
     */
    public function setSiteUrl(string $value)
    {
        $this->site_url = $value;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    /**
     * @param int $value
     */
    public function setSortOrder(int $value)
    {
        $this->sort_order = $value;
    }

    /**
     * @return int
     */
    public function getIsShow(): int
    {
        return $this->is_show;
    }

    /**
     * @param int $value
     */
    public function setIsShow(int $value)
    {
        $this->is_show = $value;
    }

}
