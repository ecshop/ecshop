<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsActivityEntity')]
class GoodsActivityEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '活动ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'act_name', description: '活动名称', type: 'string')]
    private string $act_name;

    #[OA\Property(property: 'act_desc', description: '活动描述', type: 'string')]
    private string $act_desc;

    #[OA\Property(property: 'act_type', description: '活动类型(0团购 1抢购 2拍卖 3优惠)', type: 'integer')]
    private int $act_type;

    #[OA\Property(property: 'goods_id', description: '商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'product_id', description: '货品ID', type: 'integer')]
    private int $product_id;

    #[OA\Property(property: 'goods_name', description: '商品名称', type: 'string')]
    private string $goods_name;

    #[OA\Property(property: 'start_time', description: '开始时间', type: 'integer')]
    private int $start_time;

    #[OA\Property(property: 'end_time', description: '结束时间', type: 'integer')]
    private int $end_time;

    #[OA\Property(property: 'is_finished', description: '是否结束(1是 0否)', type: 'integer')]
    private int $is_finished;

    #[OA\Property(property: 'ext_info', description: '扩展信息(JSON格式)', type: 'string')]
    private string $ext_info;

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

    public function getActName(): string
    {
        return $this->act_name;
    }

    public function setActName(string $actName): void
    {
        $this->act_name = $actName;
    }

    public function getActDesc(): string
    {
        return $this->act_desc;
    }

    public function setActDesc(string $actDesc): void
    {
        $this->act_desc = $actDesc;
    }

    public function getActType(): int
    {
        return $this->act_type;
    }

    public function setActType(int $actType): void
    {
        $this->act_type = $actType;
    }

    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goods_id = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function getGoodsName(): string
    {
        return $this->goods_name;
    }

    public function setGoodsName(string $goodsName): void
    {
        $this->goods_name = $goodsName;
    }

    public function getStartTime(): int
    {
        return $this->start_time;
    }

    public function setStartTime(int $startTime): void
    {
        $this->start_time = $startTime;
    }

    public function getEndTime(): int
    {
        return $this->end_time;
    }

    public function setEndTime(int $endTime): void
    {
        $this->end_time = $endTime;
    }

    public function getIsFinished(): int
    {
        return $this->is_finished;
    }

    public function setIsFinished(int $isFinished): void
    {
        $this->is_finished = $isFinished;
    }

    public function getExtInfo(): string
    {
        return $this->ext_info;
    }

    public function setExtInfo(string $extInfo): void
    {
        $this->ext_info = $extInfo;
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
