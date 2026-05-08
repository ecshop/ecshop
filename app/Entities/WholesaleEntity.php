<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'WholesaleEntity')]
class WholesaleEntity
{
    use DTOHelper;

    const string getActId = 'act_id';

    const string getGoodsId = 'goods_id';

    const string getGoodsName = 'goods_name';

    const string getRankIds = 'rank_ids';

    const string getPrices = 'prices';

    const string getEnabled = 'enabled';

    #[OA\Property(property: 'actId', description: '', type: 'integer')]
    private int $actId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'goodsName', description: '', type: 'string')]
    private string $goodsName;

    #[OA\Property(property: 'rankIds', description: '', type: 'string')]
    private string $rankIds;

    #[OA\Property(property: 'prices', description: '', type: 'string')]
    private string $prices;

    #[OA\Property(property: 'enabled', description: '', type: 'integer')]
    private int $enabled;

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
