<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ExchangeGoodSchema')]
class ExchangeGood
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'exchange_integral', description: '', type: 'integer')]
    protected int $exchangeIntegral;

    #[OA\Property(property: 'is_exchange', description: '', type: 'integer')]
    protected int $isExchange;

    #[OA\Property(property: 'is_hot', description: '', type: 'integer')]
    protected int $isHot;

    /**
     * 获取
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function getExchangeIntegral(): int
    {
        return $this->exchangeIntegral;
    }

    /**
     * 设置
     */
    public function setExchangeIntegral(int $exchangeIntegral): void
    {
        $this->exchangeIntegral = $exchangeIntegral;
    }

    /**
     * 获取
     */
    public function getIsExchange(): int
    {
        return $this->isExchange;
    }

    /**
     * 设置
     */
    public function setIsExchange(int $isExchange): void
    {
        $this->isExchange = $isExchange;
    }

    /**
     * 获取
     */
    public function getIsHot(): int
    {
        return $this->isHot;
    }

    /**
     * 设置
     */
    public function setIsHot(int $isHot): void
    {
        $this->isHot = $isHot;
    }
}
