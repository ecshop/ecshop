<?php

namespace App\Models\Entity;

/**
 * Class GoodsArticleEntity
 * @package App\Models\Entity
 */
class GoodsArticleEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $goods_id;

    /**
     * @var int 
     */
    private int $article_id;

    /**
     * @var int 
     */
    private int $admin_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value)
    {
        $this->id = $value;
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
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->article_id;
    }

    /**
     * @param int $value
     */
    public function setArticleId(int $value)
    {
        $this->article_id = $value;
    }

    /**
     * @return int
     */
    public function getAdminId(): int
    {
        return $this->admin_id;
    }

    /**
     * @param int $value
     */
    public function setAdminId(int $value)
    {
        $this->admin_id = $value;
    }

}
