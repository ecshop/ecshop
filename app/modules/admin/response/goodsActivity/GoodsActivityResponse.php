<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsActivity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsActivityResponse')]
class GoodsActivityResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '活动ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'actName', description: '活动名称', type: 'string')]
    private string $actName;

    #[OA\Property(property: 'actDesc', description: '活动描述', type: 'string')]
    private string $actDesc;

    #[OA\Property(property: 'actType', description: '活动类型(0团购 1抢购 2拍卖 3优惠)', type: 'integer')]
    private int $actType;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'goodsName', description: '商品名称', type: 'string')]
    private string $goodsName;

    #[OA\Property(property: 'startTime', description: '开始时间', type: 'integer')]
    private int $startTime;

    #[OA\Property(property: 'endTime', description: '结束时间', type: 'integer')]
    private int $endTime;

    #[OA\Property(property: 'isFinished', description: '是否结束(1是 0否)', type: 'integer')]
    private int $isFinished;

    #[OA\Property(property: 'extInfo', description: '扩展信息(JSON格式)', type: 'string')]
    private string $extInfo;

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

    public function getActName(): string
    {
        return $this->actName;
    }

    public function setActName(string $actName): void
    {
        $this->actName = $actName;
    }

    public function getActDesc(): string
    {
        return $this->actDesc;
    }

    public function setActDesc(string $actDesc): void
    {
        $this->actDesc = $actDesc;
    }

    public function getActType(): int
    {
        return $this->actType;
    }

    public function setActType(int $actType): void
    {
        $this->actType = $actType;
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

    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
    }

    public function getStartTime(): int
    {
        return $this->startTime;
    }

    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->endTime;
    }

    public function setEndTime(int $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function getIsFinished(): int
    {
        return $this->isFinished;
    }

    public function setIsFinished(int $isFinished): void
    {
        $this->isFinished = $isFinished;
    }

    public function getExtInfo(): string
    {
        return $this->extInfo;
    }

    public function setExtInfo(string $extInfo): void
    {
        $this->extInfo = $extInfo;
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
