<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\PackageGoods;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'PackageGoodsResponse')]
class PackageGoodsResponse
{
    use DTOHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'packageId', description: '', type: 'integer')]
    private int $packageId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'goodsNumber', description: '', type: 'integer')]
    private int $goodsNumber;

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
    public function getPackageId(): int
    {
        return $this->packageId;
    }

    /**
     * 设置
     */
    public function setPackageId(int $packageId): void
    {
        $this->packageId = $packageId;
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
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * 设置
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * 获取
     */
    public function getGoodsNumber(): int
    {
        return $this->goodsNumber;
    }

    /**
     * 设置
     */
    public function setGoodsNumber(int $goodsNumber): void
    {
        $this->goodsNumber = $goodsNumber;
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
