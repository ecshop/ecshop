<?php

namespace App\Models\Entity;

/**
 * Class UserFeedEntity
 * @package App\Models\Entity
 */
class UserFeedEntity
{
    /**
     * @var int 
     */
    private int $feed_id;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var int 
     */
    private int $value_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $feed_type;

    /**
     * @var int 
     */
    private int $is_feed;

    /**
     * @return int
     */
    public function getFeedId(): int
    {
        return $this->feed_id;
    }

    /**
     * @param int $value
     */
    public function setFeedId(int $value)
    {
        $this->feed_id = $value;
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
    public function getValueId(): int
    {
        return $this->value_id;
    }

    /**
     * @param int $value
     */
    public function setValueId(int $value)
    {
        $this->value_id = $value;
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
    public function getFeedType(): int
    {
        return $this->feed_type;
    }

    /**
     * @param int $value
     */
    public function setFeedType(int $value)
    {
        $this->feed_type = $value;
    }

    /**
     * @return int
     */
    public function getIsFeed(): int
    {
        return $this->is_feed;
    }

    /**
     * @param int $value
     */
    public function setIsFeed(int $value)
    {
        $this->is_feed = $value;
    }

}
