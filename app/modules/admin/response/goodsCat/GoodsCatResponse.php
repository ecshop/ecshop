<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsCat;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsCatResponse')]
class GoodsCatResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'catId', description: '分类ID', type: 'integer')]
    private int $catId;

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

    public function getCatId(): int
    {
        return $this->catId;
    }

    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }
}
