<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsGalleryEntity')]
class GoodsGalleryEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '图片ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goods_id', description: '商品ID', type: 'integer')]
    private int $goods_id;

    #[OA\Property(property: 'product_id', description: '货品ID', type: 'integer')]
    private int $product_id;

    #[OA\Property(property: 'img_url', description: '图片URL', type: 'string')]
    private string $img_url;

    #[OA\Property(property: 'img_desc', description: '图片描述', type: 'string')]
    private string $img_desc;

    #[OA\Property(property: 'thumb_url', description: '缩略图URL', type: 'string')]
    private string $thumb_url;

    #[OA\Property(property: 'img_original', description: '原始图片URL', type: 'string')]
    private string $img_original;

    #[OA\Property(property: 'sort_order', description: '', type: 'integer')]
    private int $sort_order;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $created_time;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updated_time;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deleted_time;

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

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function getImgUrl(): string
    {
        return $this->img_url;
    }

    public function setImgUrl(string $imgUrl): void
    {
        $this->img_url = $imgUrl;
    }

    public function getImgDesc(): string
    {
        return $this->img_desc;
    }

    public function setImgDesc(string $imgDesc): void
    {
        $this->img_desc = $imgDesc;
    }

    public function getThumbUrl(): string
    {
        return $this->thumb_url;
    }

    public function setThumbUrl(string $thumbUrl): void
    {
        $this->thumb_url = $thumbUrl;
    }

    public function getImgOriginal(): string
    {
        return $this->img_original;
    }

    public function setImgOriginal(string $imgOriginal): void
    {
        $this->img_original = $imgOriginal;
    }

    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    public function setSortOrder(int $sortOrder): void
    {
        $this->sort_order = $sortOrder;
    }

    public function getCreatedTime(): string
    {
        return $this->created_time;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->created_time = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updated_time = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deleted_time;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deleted_time = $deletedTime;
    }
}
