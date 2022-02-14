<?php

namespace App\Models\Entity;

/**
 * Class AreaRegionEntity
 * @package App\Models\Entity
 */
class AreaRegionEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $shipping_area_id;

    /**
     * @var int 
     */
    private int $region_id;

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
    public function getShippingAreaId(): int
    {
        return $this->shipping_area_id;
    }

    /**
     * @param int $value
     */
    public function setShippingAreaId(int $value)
    {
        $this->shipping_area_id = $value;
    }

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

}
