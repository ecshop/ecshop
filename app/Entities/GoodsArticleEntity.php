<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsArticleEntity')]
class GoodsArticleEntity
{
    use DTOHelper;

    const string getId = 'id'; // ID

    const string getGoodsId = 'goods_id';

    const string getArticleId = 'article_id';

    const string getAdminId = 'admin_id';

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'articleId', description: '', type: 'integer')]
    private int $articleId;

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
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * 设置
     */
    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
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
