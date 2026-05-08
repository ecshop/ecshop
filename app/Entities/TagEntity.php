<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'TagEntity')]
class TagEntity
{
    use DTOHelper;

    const string getTagId = 'tag_id';

    const string getUserId = 'user_id';

    const string getGoodsId = 'goods_id';

    const string getTagWords = 'tag_words';

    #[OA\Property(property: 'tagId', description: '', type: 'integer')]
    private int $tagId;

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'goodsId', description: '', type: 'integer')]
    private int $goodsId;

    #[OA\Property(property: 'tagWords', description: '', type: 'string')]
    private string $tagWords;

    /**
     * 获取
     */
    public function getTagId(): int
    {
        return $this->tagId;
    }

    /**
     * 设置
     */
    public function setTagId(int $tagId): void
    {
        $this->tagId = $tagId;
    }

    /**
     * 获取
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 设置
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
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
    public function getTagWords(): string
    {
        return $this->tagWords;
    }

    /**
     * 设置
     */
    public function setTagWords(string $tagWords): void
    {
        $this->tagWords = $tagWords;
    }
}
