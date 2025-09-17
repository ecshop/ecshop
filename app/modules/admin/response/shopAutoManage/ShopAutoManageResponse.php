<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopAutoManage;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopAutoManageResponse')]
class ShopAutoManageResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'itemId', description: '商品ID', type: 'integer')]
    private int $itemId;

    #[OA\Property(property: 'type', description: '类型', type: 'string')]
    private string $type;

    #[OA\Property(property: 'starttime', description: '开始时间', type: 'integer')]
    private int $starttime;

    #[OA\Property(property: 'endtime', description: '结束时间', type: 'integer')]
    private int $endtime;

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

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getStarttime(): int
    {
        return $this->starttime;
    }

    public function setStarttime(int $starttime): void
    {
        $this->starttime = $starttime;
    }

    public function getEndtime(): int
    {
        return $this->endtime;
    }

    public function setEndtime(int $endtime): void
    {
        $this->endtime = $endtime;
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
