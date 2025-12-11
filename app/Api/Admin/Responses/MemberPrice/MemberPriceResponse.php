<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\MemberPrice;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'MemberPriceResponse')]
class MemberPriceResponse
{
    use DTOHelper;

    #[OA\Property(property: 'priceId', description: '', type: 'integer')]
    private int $priceId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'userRank', description: '', type: 'integer')]
    private int $userRank;

    #[OA\Property(property: 'userPrice', description: '', type: 'string')]
    private string $userPrice;

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
    public function getUserPrice(): string
    {
        return $this->userPrice;
    }

    /**
     * 设置
     */
    public function setUserPrice(string $userPrice): void
    {
        $this->userPrice = $userPrice;
    }
}
