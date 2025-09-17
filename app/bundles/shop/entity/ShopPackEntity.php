<?php

declare(strict_types=1);

namespace app\bundles\shop\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopPackEntity')]
class ShopPackEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '礼包ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'pack_name', description: '礼包名称', type: 'string')]
    private string $pack_name;

    #[OA\Property(property: 'pack_img', description: '礼包图片路径', type: 'string')]
    private string $pack_img;

    #[OA\Property(property: 'pack_fee', description: '礼包价格', type: 'float')]
    private float $pack_fee;

    #[OA\Property(property: 'free_money', description: '免运费金额(达到此金额免运费)', type: 'integer')]
    private int $free_money;

    #[OA\Property(property: 'pack_desc', description: '礼包描述', type: 'string')]
    private string $pack_desc;

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

    public function getPackName(): string
    {
        return $this->pack_name;
    }

    public function setPackName(string $packName): void
    {
        $this->pack_name = $packName;
    }

    public function getPackImg(): string
    {
        return $this->pack_img;
    }

    public function setPackImg(string $packImg): void
    {
        $this->pack_img = $packImg;
    }

    public function getPackFee(): float
    {
        return $this->pack_fee;
    }

    public function setPackFee(float $packFee): void
    {
        $this->pack_fee = $packFee;
    }

    public function getFreeMoney(): int
    {
        return $this->free_money;
    }

    public function setFreeMoney(int $freeMoney): void
    {
        $this->free_money = $freeMoney;
    }

    public function getPackDesc(): string
    {
        return $this->pack_desc;
    }

    public function setPackDesc(string $packDesc): void
    {
        $this->pack_desc = $packDesc;
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
