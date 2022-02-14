<?php

namespace App\Models\Entity;

/**
 * Class WholesaleEntity
 * @package App\Models\Entity
 */
class WholesaleEntity
{
    /**
     * @var int 
     */
    private int $act_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var string 
     */
    private string $goods_name;

    /**
     * @var string 
     */
    private string $rank_ids;

    /**
     * @var string 
     */
    private string $prices;

    /**
     * @var int 
     */
    private int $enabled;

    /**
     * @return int
     */
    public function getActId(): int
    {
        return $this->act_id;
    }

    /**
     * @param int $value
     */
    public function setActId(int $value)
    {
        $this->act_id = $value;
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
     * @return string
     */
    public function getGoodsName(): string
    {
        return $this->goods_name;
    }

    /**
     * @param string $value
     */
    public function setGoodsName(string $value)
    {
        $this->goods_name = $value;
    }

    /**
     * @return string
     */
    public function getRankIds(): string
    {
        return $this->rank_ids;
    }

    /**
     * @param string $value
     */
    public function setRankIds(string $value)
    {
        $this->rank_ids = $value;
    }

    /**
     * @return string
     */
    public function getPrices(): string
    {
        return $this->prices;
    }

    /**
     * @param string $value
     */
    public function setPrices(string $value)
    {
        $this->prices = $value;
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
