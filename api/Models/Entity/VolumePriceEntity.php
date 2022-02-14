<?php

namespace App\Models\Entity;

/**
 * Class VolumePriceEntity
 * @package App\Models\Entity
 */
class VolumePriceEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $price_type;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $volume_number;

    /**
     * @var float 
     */
    private float $volume_price;

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
    public function getPriceType(): int
    {
        return $this->price_type;
    }

    /**
     * @param int $value
     */
    public function setPriceType(int $value)
    {
        $this->price_type = $value;
    }

    /**
     * @return int
     */
    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    /**
     * @param int $value
     */
    public function setGoodsId(int $value)
    {
        $this->goods_id = $value;
    }

    /**
     * @return int
     */
    public function getVolumeNumber(): int
    {
        return $this->volume_number;
    }

    /**
     * @param int $value
     */
    public function setVolumeNumber(int $value)
    {
        $this->volume_number = $value;
    }

    /**
     * @return float
     */
    public function getVolumePrice(): float
    {
        return $this->volume_price;
    }

    /**
     * @param float $value
     */
    public function setVolumePrice(float $value)
    {
        $this->volume_price = $value;
    }

}
