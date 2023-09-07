<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserFeedSchema')]
class UserFeed
{
    use ArrayObject;

    #[OA\Property(property: 'feed_id', description: '', type: 'integer')]
    protected int $feedId;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'value_id', description: '', type: 'integer')]
    protected int $valueId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'feed_type', description: '', type: 'integer')]
    protected int $feedType;

    #[OA\Property(property: 'is_feed', description: '', type: 'integer')]
    protected int $isFeed;

    /**
     * 获取
     */
    public function getFeedId(): int
    {
        return $this->feedId;
    }

    /**
     * 设置
     */
    public function setFeedId(int $feedId): void
    {
        $this->feedId = $feedId;
    }

    /**
     * 获取
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 设置
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * 获取
     */
    public function getValueId(): int
    {
        return $this->valueId;
    }

    /**
     * 设置
     */
    public function setValueId(int $valueId): void
    {
        $this->valueId = $valueId;
    }

    /**
     * 获取
     */
    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    /**
     * 设置
     */
    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    /**
     * 获取
     */
    public function getFeedType(): int
    {
        return $this->feedType;
    }

    /**
     * 设置
     */
    public function setFeedType(int $feedType): void
    {
        $this->feedType = $feedType;
    }

    /**
     * 获取
     */
    public function getIsFeed(): int
    {
        return $this->isFeed;
    }

    /**
     * 设置
     */
    public function setIsFeed(int $isFeed): void
    {
        $this->isFeed = $isFeed;
    }
}
