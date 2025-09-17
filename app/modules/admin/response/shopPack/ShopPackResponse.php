<?php

declare(strict_types=1);

namespace app\modules\admin\response\shopPack;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ShopPackResponse')]
class ShopPackResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '礼包ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'packName', description: '礼包名称', type: 'string')]
    private string $packName;

    #[OA\Property(property: 'packImg', description: '礼包图片路径', type: 'string')]
    private string $packImg;

    #[OA\Property(property: 'packFee', description: '礼包价格', type: 'float')]
    private float $packFee;

    #[OA\Property(property: 'freeMoney', description: '免运费金额(达到此金额免运费)', type: 'integer')]
    private int $freeMoney;

    #[OA\Property(property: 'packDesc', description: '礼包描述', type: 'string')]
    private string $packDesc;

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

    public function getPackName(): string
    {
        return $this->packName;
    }

    public function setPackName(string $packName): void
    {
        $this->packName = $packName;
    }

    public function getPackImg(): string
    {
        return $this->packImg;
    }

    public function setPackImg(string $packImg): void
    {
        $this->packImg = $packImg;
    }

    public function getPackFee(): float
    {
        return $this->packFee;
    }

    public function setPackFee(float $packFee): void
    {
        $this->packFee = $packFee;
    }

    public function getFreeMoney(): int
    {
        return $this->freeMoney;
    }

    public function setFreeMoney(int $freeMoney): void
    {
        $this->freeMoney = $freeMoney;
    }

    public function getPackDesc(): string
    {
        return $this->packDesc;
    }

    public function setPackDesc(string $packDesc): void
    {
        $this->packDesc = $packDesc;
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
