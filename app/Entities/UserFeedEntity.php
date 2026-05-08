<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserFeedEntity')]
class UserFeedEntity
{
    use DTOHelper;

    const string getFeedId = 'feed_id';

    const string getUserId = 'user_id';

    const string getValueId = 'value_id';

    const string getGoodsId = 'goods_id';

    const string getFeedType = 'feed_type';

    const string getIsFeed = 'is_feed';

    #[OA\Property(property: 'feedId', description: '', type: 'integer')]
    private int $feedId;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'valueId', description: '', type: 'integer')]
    private int $valueId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'feedType', description: '', type: 'integer')]
    private int $feedType;

    #[OA\Property(property: 'isFeed', description: '', type: 'integer')]
    private int $isFeed;

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
