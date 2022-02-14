<?php

namespace App\Models\Entity;

/**
 * Class RegionEntity
 * @package App\Models\Entity
 */
class RegionEntity
{
    /**
     * @var int 
     */
    private int $region_id;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var string 
     */
    private string $region_name;

    /**
     * @var int 
     */
    private int $region_type;

    /**
     * @var int 
     */
    private int $agency_id;

    /**
     * @return int
     */
    public function getRegionId(): int
    {
        return $this->region_id;
    }

    /**
     * @param int $value
     */
    public function setRegionId(int $value)
    {
        $this->region_id = $value;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @param int $value
     */
    public function setParentId(int $value)
    {
        $this->parent_id = $value;
    }

    /**
     * @return string
     */
    public function getRegionName(): string
    {
        return $this->region_name;
    }

    /**
     * @param string $value
     */
    public function setRegionName(string $value)
    {
        $this->region_name = $value;
    }

    /**
     * @return int
     */
    public function getRegionType(): int
    {
        return $this->region_type;
    }

    /**
     * @param int $value
     */
    public function setRegionType(int $value)
    {
        $this->region_type = $value;
    }

    /**
     * @return int
     */
    public function getAgencyId(): int
    {
        return $this->agency_id;
    }

    /**
     * @param int $value
     */
    public function setAgencyId(int $value)
    {
        $this->agency_id = $value;
    }

}
