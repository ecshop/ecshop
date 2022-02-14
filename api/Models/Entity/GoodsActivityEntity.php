<?php

namespace App\Models\Entity;

/**
 * Class GoodsActivityEntity
 * @package App\Models\Entity
 */
class GoodsActivityEntity
{
    /**
     * @var int 
     */
    private int $act_id;

    /**
     * @var string 
     */
    private string $act_name;

    /**
     * @var string 
     */
    private string $act_desc;

    /**
     * @var int 
     */
    private int $act_type;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $product_id;

    /**
     * @var string 
     */
    private string $goods_name;

    /**
     * @var int 
     */
    private int $start_time;

    /**
     * @var int 
     */
    private int $end_time;

    /**
     * @var int 
     */
    private int $is_finished;

    /**
     * @var string 
     */
    private string $ext_info;

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
     * @return string
     */
    public function getActName(): string
    {
        return $this->act_name;
    }

    /**
     * @param string $value
     */
    public function setActName(string $value)
    {
        $this->act_name = $value;
    }

    /**
     * @return string
     */
    public function getActDesc(): string
    {
        return $this->act_desc;
    }

    /**
     * @param string $value
     */
    public function setActDesc(string $value)
    {
        $this->act_desc = $value;
    }

    /**
     * @return int
     */
    public function getActType(): int
    {
        return $this->act_type;
    }

    /**
     * @param int $value
     */
    public function setActType(int $value)
    {
        $this->act_type = $value;
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
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @param int $value
     */
    public function setProductId(int $value)
    {
        $this->product_id = $value;
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
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->start_time;
    }

    /**
     * @param int $value
     */
    public function setStartTime(int $value)
    {
        $this->start_time = $value;
    }

    /**
     * @return int
     */
    public function getEndTime(): int
    {
        return $this->end_time;
    }

    /**
     * @param int $value
     */
    public function setEndTime(int $value)
    {
        $this->end_time = $value;
    }

    /**
     * @return int
     */
    public function getIsFinished(): int
    {
        return $this->is_finished;
    }

    /**
     * @param int $value
     */
    public function setIsFinished(int $value)
    {
        $this->is_finished = $value;
    }

    /**
     * @return string
     */
    public function getExtInfo(): string
    {
        return $this->ext_info;
    }

    /**
     * @param string $value
     */
    public function setExtInfo(string $value)
    {
        $this->ext_info = $value;
    }

}
