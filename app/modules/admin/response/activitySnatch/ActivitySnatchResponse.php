<?php

declare(strict_types=1);

namespace app\modules\admin\response\activitySnatch;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivitySnatchResponse')]
class ActivitySnatchResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'snatchId', description: '抢购活动ID', type: 'integer')]
    private int $snatchId;

    #[OA\Property(property: 'userId', description: '用户ID', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'bidPrice', description: '出价金额', type: 'float')]
    private float $bidPrice;

    #[OA\Property(property: 'bidTime', description: '出价时间', type: 'integer')]
    private int $bidTime;

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

    public function getSnatchId(): int
    {
        return $this->snatchId;
    }

    public function setSnatchId(int $snatchId): void
    {
        $this->snatchId = $snatchId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getBidPrice(): float
    {
        return $this->bidPrice;
    }

    public function setBidPrice(float $bidPrice): void
    {
        $this->bidPrice = $bidPrice;
    }

    public function getBidTime(): int
    {
        return $this->bidTime;
    }

    public function setBidTime(int $bidTime): void
    {
        $this->bidTime = $bidTime;
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
