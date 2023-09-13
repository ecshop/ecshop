<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsCatSchema')]
class GoodsCat
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'cat_id', description: '', type: 'integer')]
    protected int $catId;

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
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * 设置
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }
}
