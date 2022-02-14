<?php

namespace App\Models\Entity;

/**
 * Class AgencyEntity
 * @package App\Models\Entity
 */
class AgencyEntity
{
    /**
     * @var int 
     */
    private int $agency_id;

    /**
     * @var string 
     */
    private string $agency_name;

    /**
     * @var string 
     */
    private string $agency_desc;

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

    /**
     * @return string
     */
    public function getAgencyName(): string
    {
        return $this->agency_name;
    }

    /**
     * @param string $value
     */
    public function setAgencyName(string $value)
    {
        $this->agency_name = $value;
    }

    /**
     * @return string
     */
    public function getAgencyDesc(): string
    {
        return $this->agency_desc;
    }

    /**
     * @param string $value
     */
    public function setAgencyDesc(string $value)
    {
        $this->agency_desc = $value;
    }

}
