<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsGallery;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsGalleryResponse')]
class GoodsGalleryResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '图片ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '商品ID', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'productId', description: '货品ID', type: 'integer')]
    private int $productId;

    #[OA\Property(property: 'imgUrl', description: '图片URL', type: 'string')]
    private string $imgUrl;

    #[OA\Property(property: 'imgDesc', description: '图片描述', type: 'string')]
    private string $imgDesc;

    #[OA\Property(property: 'thumbUrl', description: '缩略图URL', type: 'string')]
    private string $thumbUrl;

    #[OA\Property(property: 'imgOriginal', description: '原始图片URL', type: 'string')]
    private string $imgOriginal;

    #[OA\Property(property: 'sortOrder', description: '', type: 'integer')]
    private int $sortOrder;

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

    public function getImgUrl(): string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(string $imgUrl): void
    {
        $this->imgUrl = $imgUrl;
    }

    public function getImgDesc(): string
    {
        return $this->imgDesc;
    }

    public function setImgDesc(string $imgDesc): void
    {
        $this->imgDesc = $imgDesc;
    }

    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
    }

    public function setThumbUrl(string $thumbUrl): void
    {
        $this->thumbUrl = $thumbUrl;
    }

    public function getImgOriginal(): string
    {
        return $this->imgOriginal;
    }

    public function setImgOriginal(string $imgOriginal): void
    {
        $this->imgOriginal = $imgOriginal;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
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
