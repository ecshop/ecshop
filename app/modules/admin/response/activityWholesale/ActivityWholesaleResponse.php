<?php

declare(strict_types=1);

namespace app\modules\admin\response\activityWholesale;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ActivityWholesaleResponse')]
class ActivityWholesaleResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '批发活动ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '关联商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '关联货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'goodsName', description: '商品名称', type: 'string')]
    private string $goodsName;

    #[OA\Property(property: 'rankIds', description: '适用会员等级ID列表', type: 'string')]
    private string $rankIds;

    #[OA\Property(property: 'prices', description: '批发价格设置(JSON格式)', type: 'string')]
    private string $prices;

    #[OA\Property(property: 'enabled', description: '是否启用(0禁用 1启用)', type: 'integer')]
    private int $enabled;

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

    public function getGoodsId(): int
    {
        return $this->goodsId;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
    }

    public function getRankIds(): string
    {
        return $this->rankIds;
    }

    public function setRankIds(string $rankIds): void
    {
        $this->rankIds = $rankIds;
    }

    public function getPrices(): string
    {
        return $this->prices;
    }

    public function setPrices(string $prices): void
    {
        $this->prices = $prices;
    }

    public function getEnabled(): int
    {
        return $this->enabled;
    }

    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
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
