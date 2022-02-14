<?php

namespace App\Models\Entity;

/**
 * Class AdPositionEntity
 * @package App\Models\Entity
 */
class AdPositionEntity
{
    /**
     * @var int 
     */
    private int $position_id;

    /**
     * @var string 
     */
    private string $position_name;

    /**
     * @var int 
     */
    private int $ad_width;

    /**
     * @var int 
     */
    private int $ad_height;

    /**
     * @var string 
     */
    private string $position_desc;

    /**
     * @var string 
     */
    private string $position_style;

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
     * @return string
     */
    public function getPositionName(): string
    {
        return $this->position_name;
    }

    /**
     * @param string $value
     */
    public function setPositionName(string $value)
    {
        $this->position_name = $value;
    }

    /**
     * @return int
     */
    public function getAdWidth(): int
    {
        return $this->ad_width;
    }

    /**
     * @param int $value
     */
    public function setAdWidth(int $value)
    {
        $this->ad_width = $value;
    }

    /**
     * @return int
     */
    public function getAdHeight(): int
    {
        return $this->ad_height;
    }

    /**
     * @param int $value
     */
    public function setAdHeight(int $value)
    {
        $this->ad_height = $value;
    }

    /**
     * @return string
     */
    public function getPositionDesc(): string
    {
        return $this->position_desc;
    }

    /**
     * @param string $value
     */
    public function setPositionDesc(string $value)
    {
        $this->position_desc = $value;
    }

    /**
     * @return string
     */
    public function getPositionStyle(): string
    {
        return $this->position_style;
    }

    /**
     * @param string $value
     */
    public function setPositionStyle(string $value)
    {
        $this->position_style = $value;
    }

}
