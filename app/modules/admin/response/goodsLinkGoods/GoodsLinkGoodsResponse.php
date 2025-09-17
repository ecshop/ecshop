<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsLinkGoods;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsLinkGoodsResponse')]
class GoodsLinkGoodsResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '主商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'linkGoodsId', description: '关联商品ID', type: 'integer')]
    private int $linkGoodsId;

    #[OA\Property(property: 'isDouble', description: '是否双向关联(0否1是)', type: 'integer')]
    private int $isDouble;

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

    public function getLinkGoodsId(): int
    {
        return $this->linkGoodsId;
    }

    public function setLinkGoodsId(int $linkGoodsId): void
    {
        $this->linkGoodsId = $linkGoodsId;
    }

    public function getIsDouble(): int
    {
        return $this->isDouble;
    }

    public function setIsDouble(int $isDouble): void
    {
        $this->isDouble = $isDouble;
    }
}
