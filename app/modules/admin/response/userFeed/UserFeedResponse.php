<?php

declare(strict_types=1);

namespace app\modules\admin\response\userFeed;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'UserFeedResponse')]
class UserFeedResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '用户反馈ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'valueId', description: '关联值ID', type: 'integer')]
    private int $valueId;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'feedType', description: '反馈类型', type: 'integer')]
    private int $feedType;

    #[OA\Property(property: 'isFeed', description: '是否已反馈', type: 'integer')]
    private int $isFeed;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getValueId(): int
    {
        return $this->valueId;
    }

    public function setValueId(int $valueId): void
    {
        $this->valueId = $valueId;
    }

    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getFeedType(): int
    {
        return $this->feedType;
    }

    public function setFeedType(int $feedType): void
    {
        $this->feedType = $feedType;
    }

    public function getIsFeed(): int
    {
        return $this->isFeed;
    }

    public function setIsFeed(int $isFeed): void
    {
        $this->isFeed = $isFeed;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}
