<?php

namespace App\Models\Entity;

/**
 * Class ShippingAreaEntity
 * @package App\Models\Entity
 */
class ShippingAreaEntity
{
    /**
     * @var int 
     */
    private int $shipping_area_id;

    /**
     * @var string 
     */
    private string $shipping_area_name;

    /**
     * @var int 
     */
    private int $shipping_id;

    /**
     * @var string 
     */
    private string $configure;

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
     * @return string
     */
    public function getShippingAreaName(): string
    {
        return $this->shipping_area_name;
    }

    /**
     * @param string $value
     */
    public function setShippingAreaName(string $value)
    {
        $this->shipping_area_name = $value;
    }

    /**
     * @return int
     */
    public function getShippingId(): int
    {
        return $this->shipping_id;
    }

    /**
     * @param int $value
     */
    public function setShippingId(int $value)
    {
        $this->shipping_id = $value;
    }

    /**
     * @return string
     */
    public function getConfigure(): string
    {
        return $this->configure;
    }

    /**
     * @param string $value
     */
    public function setConfigure(string $value)
    {
        $this->configure = $value;
    }

}
