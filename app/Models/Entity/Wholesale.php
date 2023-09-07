<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'WholesaleSchema')]
class Wholesale
{
    use ArrayObject;

    #[OA\Property(property: 'act_id', description: '', type: 'integer')]
    protected int $actId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'goods_name', description: '', type: 'string')]
    protected string $goodsName;

    #[OA\Property(property: 'rank_ids', description: '', type: 'string')]
    protected string $rankIds;

    #[OA\Property(property: 'prices', description: '', type: 'string')]
    protected string $prices;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    protected int $enabled;

    /**
     * 获取
     */
    public function getActId(): int
    {
        return $this->actId;
    }

    /**
     * 设置
     */
    public function setActId(int $actId): void
    {
        $this->actId = $actId;
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
    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    /**
     * 设置
     */
    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
    }

    /**
     * 获取
     */
    public function getRankIds(): string
    {
        return $this->rankIds;
    }

    /**
     * 设置
     */
    public function setRankIds(string $rankIds): void
    {
        $this->rankIds = $rankIds;
    }

    /**
     * 获取
     */
    public function getPrices(): string
    {
        return $this->prices;
    }

    /**
     * 设置
     */
    public function setPrices(string $prices): void
    {
        $this->prices = $prices;
    }

    /**
     * 获取
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * 设置
     */
    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
    }
}
