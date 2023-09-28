<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'MemberPriceSchema')]
class MemberPrice
{
    use ArrayObject;

    #[OA\Property(property: 'price_id', description: '', type: 'integer')]
    protected int $priceId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'user_rank', description: '', type: 'integer')]
    protected int $userRank;

    #[OA\Property(property: 'user_price', description: '', type: 'float')]
    protected float $userPrice;

    /**
     * 获取
     */
    public function getPriceId(): int
    {
        return $this->priceId;
    }

    /**
     * 设置
     */
    public function setPriceId(int $priceId): void
    {
        $this->priceId = $priceId;
    }

    /**
     * 获取
     */
    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    /**
     * 设置
     */
    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    /**
     * 获取
     */
    public function getUserRank(): int
    {
        return $this->userRank;
    }

    /**
     * 设置
     */
    public function setUserRank(int $userRank): void
    {
        $this->userRank = $userRank;
    }

    /**
     * 获取
     */
    public function getUserPrice(): float
    {
        return $this->userPrice;
    }

    /**
     * 设置
     */
    public function setUserPrice(float $userPrice): void
    {
        $this->userPrice = $userPrice;
    }
}
