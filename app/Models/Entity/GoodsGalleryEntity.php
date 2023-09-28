<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsGalleryEntity')]
class GoodsGalleryEntity
{
    use ArrayObject;

    #[OA\Property(property: 'img_id', description: '', type: 'integer')]
    protected int $imgId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'img_url', description: '', type: 'string')]
    protected string $imgUrl;

    #[OA\Property(property: 'img_desc', description: '', type: 'string')]
    protected string $imgDesc;

    #[OA\Property(property: 'thumb_url', description: '', type: 'string')]
    protected string $thumbUrl;

    #[OA\Property(property: 'img_original', description: '', type: 'string')]
    protected string $imgOriginal;

    #[OA\Property(property: 'sort_order', description: '', type: 'integer')]
    protected int $sortOrder;

    /**
     * 获取
     */
    public function getImgId(): int
    {
        return $this->imgId;
    }

    /**
     * 设置
     */
    public function setImgId(int $imgId): void
    {
        $this->imgId = $imgId;
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
    public function getImgUrl(): string
    {
        return $this->imgUrl;
    }

    /**
     * 设置
     */
    public function setImgUrl(string $imgUrl): void
    {
        $this->imgUrl = $imgUrl;
    }

    /**
     * 获取
     */
    public function getImgDesc(): string
    {
        return $this->imgDesc;
    }

    /**
     * 设置
     */
    public function setImgDesc(string $imgDesc): void
    {
        $this->imgDesc = $imgDesc;
    }

    /**
     * 获取
     */
    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
    }

    /**
     * 设置
     */
    public function setThumbUrl(string $thumbUrl): void
    {
        $this->thumbUrl = $thumbUrl;
    }

    /**
     * 获取
     */
    public function getImgOriginal(): string
    {
        return $this->imgOriginal;
    }

    /**
     * 设置
     */
    public function setImgOriginal(string $imgOriginal): void
    {
        $this->imgOriginal = $imgOriginal;
    }

    /**
     * 获取
     */
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    /**
     * 设置
     */
    public function setSortOrder(int $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }
}
