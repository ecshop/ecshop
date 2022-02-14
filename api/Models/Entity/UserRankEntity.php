<?php

namespace App\Models\Entity;

/**
 * Class UserRankEntity
 * @package App\Models\Entity
 */
class UserRankEntity
{
    /**
     * @var int 
     */
    private int $rank_id;

    /**
     * @var string 
     */
    private string $rank_name;

    /**
     * @var int 
     */
    private int $min_points;

    /**
     * @var int 
     */
    private int $max_points;

    /**
     * @var int 
     */
    private int $discount;

    /**
     * @var int 
     */
    private int $show_price;

    /**
     * @var int 
     */
    private int $special_rank;

    /**
     * @return int
     */
    public function getRankId(): int
    {
        return $this->rank_id;
    }

    /**
     * @param int $value
     */
    public function setRankId(int $value)
    {
        $this->rank_id = $value;
    }

    /**
     * @return string
     */
    public function getRankName(): string
    {
        return $this->rank_name;
    }

    /**
     * @param string $value
     */
    public function setRankName(string $value)
    {
        $this->rank_name = $value;
    }

    /**
     * @return int
     */
    public function getMinPoints(): int
    {
        return $this->min_points;
    }

    /**
     * @param int $value
     */
    public function setMinPoints(int $value)
    {
        $this->min_points = $value;
    }

    /**
     * @return int
     */
    public function getMaxPoints(): int
    {
        return $this->max_points;
    }

    /**
     * @param int $value
     */
    public function setMaxPoints(int $value)
    {
        $this->max_points = $value;
    }

    /**
     * @return int
     */
    public function getDiscount(): int
    {
        return $this->discount;
    }

    /**
     * @param int $value
     */
    public function setDiscount(int $value)
    {
        $this->discount = $value;
    }

    /**
     * @return int
     */
    public function getShowPrice(): int
    {
        return $this->show_price;
    }

    /**
     * @param int $value
     */
    public function setShowPrice(int $value)
    {
        $this->show_price = $value;
    }

    /**
     * @return int
     */
    public function getSpecialRank(): int
    {
        return $this->special_rank;
    }

    /**
     * @param int $value
     */
    public function setSpecialRank(int $value)
    {
        $this->special_rank = $value;
    }

}
