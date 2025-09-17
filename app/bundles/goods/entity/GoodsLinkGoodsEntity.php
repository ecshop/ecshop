<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsLinkGoodsEntity')]
class GoodsLinkGoodsEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goods_id', description: '主商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'link_goods_id', description: '关联商品ID', type: 'integer')]
    private int $link_goods_id;

    #[OA\Property(property: 'is_double', description: '是否双向关联(0否1是)', type: 'integer')]
    private int $is_double;

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
        return $this->goods_id;
    }

    public function setGoodsId(int $goodsId): void
    {
        $this->goods_id = $goodsId;
    }

    public function getLinkGoodsId(): int
    {
        return $this->link_goods_id;
    }

    public function setLinkGoodsId(int $linkGoodsId): void
    {
        $this->link_goods_id = $linkGoodsId;
    }

    public function getIsDouble(): int
    {
        return $this->is_double;
    }

    public function setIsDouble(int $isDouble): void
    {
        $this->is_double = $isDouble;
    }
}
