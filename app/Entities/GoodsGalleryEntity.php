<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsGalleryEntity')]
class GoodsGalleryEntity
{
    use DTOHelper;

    const string getImgId = 'img_id';

    const string getGoodsId = 'goods_id';

    const string getImgUrl = 'img_url';

    const string getImgDesc = 'img_desc';

    const string getThumbUrl = 'thumb_url';

    const string getImgOriginal = 'img_original';

    #[OA\Property(property: 'imgId', description: '', type: 'integer')]
    private int $imgId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'imgUrl', description: '', type: 'string')]
    private string $imgUrl;

    #[OA\Property(property: 'imgDesc', description: '', type: 'string')]
    private string $imgDesc;

    #[OA\Property(property: 'thumbUrl', description: '', type: 'string')]
    private string $thumbUrl;

    #[OA\Property(property: 'imgOriginal', description: '', type: 'string')]
    private string $imgOriginal;

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
}
