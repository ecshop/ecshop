<?php

namespace App\Models\Entity;

/**
 * Class GoodsGalleryEntity
 * @package App\Models\Entity
 */
class GoodsGalleryEntity
{
    /**
     * @var int 
     */
    private int $img_id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var string 
     */
    private string $img_url;

    /**
     * @var string 
     */
    private string $img_desc;

    /**
     * @var string 
     */
    private string $thumb_url;

    /**
     * @var string 
     */
    private string $img_original;

    /**
     * @var int 
     */
    private int $sort_order;

    /**
     * @return int
     */
    public function getImgId(): int
    {
        return $this->img_id;
    }

    /**
     * @param int $value
     */
    public function setImgId(int $value)
    {
        $this->img_id = $value;
    }

    /**
     * @return int
     */
    public function getGoodsId(): int
    {
        return $this->goods_id;
    }

    /**
     * @param int $value
     */
    public function setGoodsId(int $value)
    {
        $this->goods_id = $value;
    }

    /**
     * @return string
     */
    public function getImgUrl(): string
    {
        return $this->img_url;
    }

    /**
     * @param string $value
     */
    public function setImgUrl(string $value)
    {
        $this->img_url = $value;
    }

    /**
     * @return string
     */
    public function getImgDesc(): string
    {
        return $this->img_desc;
    }

    /**
     * @param string $value
     */
    public function setImgDesc(string $value)
    {
        $this->img_desc = $value;
    }

    /**
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumb_url;
    }

    /**
     * @param string $value
     */
    public function setThumbUrl(string $value)
    {
        $this->thumb_url = $value;
    }

    /**
     * @return string
     */
    public function getImgOriginal(): string
    {
        return $this->img_original;
    }

    /**
     * @param string $value
     */
    public function setImgOriginal(string $value)
    {
        $this->img_original = $value;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->sort_order;
    }

    /**
     * @param int $value
     */
    public function setSortOrder(int $value)
    {
        $this->sort_order = $value;
    }

}
