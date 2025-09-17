<?php

declare(strict_types=1);

namespace app\bundles\activity\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivitySnatchEntity')]
class ActivitySnatchEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'snatch_id', description: '抢购活动ID', type: 'integer')]
    private int $snatch_id;

    #[OA\Property(property: 'user_id', description: '用户ID', type: 'integer')]
    private int $user_id;

    #[OA\Property(property: 'bid_price', description: '出价金额', type: 'float')]
    private float $bid_price;

    #[OA\Property(property: 'bid_time', description: '出价时间', type: 'integer')]
    private int $bid_time;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $created_time;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updated_time;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deleted_time;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSnatchId(): int
    {
        return $this->snatch_id;
    }

    public function setSnatchId(int $snatchId): void
    {
        $this->snatch_id = $snatchId;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getBidPrice(): float
    {
        return $this->bid_price;
    }

    public function setBidPrice(float $bidPrice): void
    {
        $this->bid_price = $bidPrice;
    }

    public function getBidTime(): int
    {
        return $this->bid_time;
    }

    public function setBidTime(int $bidTime): void
    {
        $this->bid_time = $bidTime;
    }

    public function getCreatedTime(): string
    {
        return $this->created_time;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->created_time = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updated_time = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deleted_time;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deleted_time = $deletedTime;
    }
}
