<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\LinkGoods;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'LinkGoodsResponse')]
class LinkGoodsResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'linkGoodsId', description: '', type: 'integer')]
    private int $linkGoodsId;

    #[OA\Property(property: 'isDouble', description: '', type: 'integer')]
    private int $isDouble;

    #[OA\Property(property: 'adminId', description: '', type: 'integer')]
    private int $adminId;

    /**
     * 获取ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置ID
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
