<?php

declare(strict_types=1);

namespace app\modules\admin\response\activityAuction;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityAuctionResponse')]
class ActivityAuctionResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '出价日志ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'actId', description: '拍卖活动ID', type: 'integer')]
    private int $actId;

    #[OA\Property(property: 'bidUser', description: '出价用户ID', type: 'integer')]
    private int $bidUser;

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

    public function getActId(): int
    {
        return $this->actId;
    }

    public function setActId(int $actId): void
    {
        $this->actId = $actId;
    }

    public function getBidUser(): int
    {
        return $this->bidUser;
    }

    public function setBidUser(int $bidUser): void
    {
        $this->bidUser = $bidUser;
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
