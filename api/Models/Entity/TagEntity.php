<?php

namespace App\Models\Entity;

/**
 * Class TagEntity
 * @package App\Models\Entity
 */
class TagEntity
{
    /**
     * @var int 
     */
    private int $tag_id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var string 
     */
    private string $tag_words;

    /**
     * @return int
     */
    public function getTagId(): int
    {
        return $this->tag_id;
    }

    /**
     * @param int $value
     */
    public function setTagId(int $value)
    {
        $this->tag_id = $value;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $value
     */
    public function setUserId(int $value)
    {
        $this->user_id = $value;
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
    public function getTagWords(): string
    {
        return $this->tag_words;
    }

    /**
     * @param string $value
     */
    public function setTagWords(string $value)
    {
        $this->tag_words = $value;
    }

}
