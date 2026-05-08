<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsAttrEntity')]
class GoodsAttrEntity
{
    use DTOHelper;

    const string getGoodsAttrId = 'goods_attr_id';

    const string getGoodsId = 'goods_id';

    const string getAttrId = 'attr_id';

    const string getAttrValue = 'attr_value';

    const string getAttrPrice = 'attr_price';

    #[OA\Property(property: 'goodsAttrId', description: '', type: 'integer')]
    private int $goodsAttrId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'attrId', description: '', type: 'integer')]
    private int $attrId;

    #[OA\Property(property: 'attrValue', description: '', type: 'string')]
    private string $attrValue;

    #[OA\Property(property: 'attrPrice', description: '', type: 'string')]
    private string $attrPrice;

    /**
     * 获取
     */
    public function getGoodsAttrId(): int
    {
        return $this->goodsAttrId;
    }

    /**
     * 设置
     */
    public function setGoodsAttrId(int $goodsAttrId): void
    {
        $this->goodsAttrId = $goodsAttrId;
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
    public function getAttrId(): int
    {
        return $this->attrId;
    }

    /**
     * 设置
     */
    public function setAttrId(int $attrId): void
    {
        $this->attrId = $attrId;
    }

    /**
     * 获取
     */
    public function getAttrValue(): string
    {
        return $this->attrValue;
    }

    /**
     * 设置
     */
    public function setAttrValue(string $attrValue): void
    {
        $this->attrValue = $attrValue;
    }

    /**
     * 获取
     */
    public function getAttrPrice(): string
    {
        return $this->attrPrice;
    }

    /**
     * 设置
     */
    public function setAttrPrice(string $attrPrice): void
    {
        $this->attrPrice = $attrPrice;
    }
}
