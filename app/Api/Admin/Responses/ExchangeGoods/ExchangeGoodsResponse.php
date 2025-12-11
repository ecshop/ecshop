<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\ExchangeGoods;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ExchangeGoodsResponse')]
class ExchangeGoodsResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'exchangeIntegral', description: '', type: 'integer')]
    private int $exchangeIntegral;

    #[OA\Property(property: 'isExchange', description: '', type: 'integer')]
    private int $isExchange;

    #[OA\Property(property: 'isHot', description: '', type: 'integer')]
    private int $isHot;

    /**
     * 获取ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置ID
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
