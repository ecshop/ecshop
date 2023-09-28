<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PackEntity')]
class PackEntity
{
    use ArrayObject;

    #[OA\Property(property: 'pack_id', description: '', type: 'integer')]
    protected int $packId;

    #[OA\Property(property: 'pack_name', description: '', type: 'string')]
    protected string $packName;

    #[OA\Property(property: 'pack_img', description: '', type: 'string')]
    protected string $packImg;

    #[OA\Property(property: 'pack_fee', description: '', type: 'float')]
    protected float $packFee;

    #[OA\Property(property: 'free_money', description: '', type: 'integer')]
    protected int $freeMoney;

    #[OA\Property(property: 'pack_desc', description: '', type: 'string')]
    protected string $packDesc;

    /**
     * 获取
     */
    public function getPackId(): int
    {
        return $this->packId;
    }

    /**
     * 设置
     */
    public function setPackId(int $packId): void
    {
        $this->packId = $packId;
    }

    /**
     * 获取
     */
    public function getPackName(): string
    {
        return $this->packName;
    }

    /**
     * 设置
     */
    public function setPackName(string $packName): void
    {
        $this->packName = $packName;
    }

    /**
     * 获取
     */
    public function getPackImg(): string
    {
        return $this->packImg;
    }

    /**
     * 设置
     */
    public function setPackImg(string $packImg): void
    {
        $this->packImg = $packImg;
    }

    /**
     * 获取
     */
    public function getPackFee(): float
    {
        return $this->packFee;
    }

    /**
     * 设置
     */
    public function setPackFee(float $packFee): void
    {
        $this->packFee = $packFee;
    }

    /**
     * 获取
     */
    public function getFreeMoney(): int
    {
        return $this->freeMoney;
    }

    /**
     * 设置
     */
    public function setFreeMoney(int $freeMoney): void
    {
        $this->freeMoney = $freeMoney;
    }

    /**
     * 获取
     */
    public function getPackDesc(): string
    {
        return $this->packDesc;
    }

    /**
     * 设置
     */
    public function setPackDesc(string $packDesc): void
    {
        $this->packDesc = $packDesc;
    }
}
