<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'LinkGoodSchema')]
class LinkGood
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'link_goods_id', description: '', type: 'integer')]
    protected int $linkGoodsId;

    #[OA\Property(property: 'is_double', description: '', type: 'integer')]
    protected int $isDouble;

    #[OA\Property(property: 'admin_id', description: '', type: 'integer')]
    protected int $adminId;

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
    public function getLinkGoodsId(): int
    {
        return $this->linkGoodsId;
    }

    /**
     * 设置
     */
    public function setLinkGoodsId(int $linkGoodsId): void
    {
        $this->linkGoodsId = $linkGoodsId;
    }

    /**
     * 获取
     */
    public function getIsDouble(): int
    {
        return $this->isDouble;
    }

    /**
     * 设置
     */
    public function setIsDouble(int $isDouble): void
    {
        $this->isDouble = $isDouble;
    }

    /**
     * 获取
     */
    public function getAdminId(): int
    {
        return $this->adminId;
    }

    /**
     * 设置
     */
    public function setAdminId(int $adminId): void
    {
        $this->adminId = $adminId;
    }
}
