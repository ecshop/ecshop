<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'TagEntity')]
class TagEntity
{
    use ArrayObject;

    #[OA\Property(property: 'tag_id', description: '', type: 'integer')]
    protected int $tagId;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'goods_id', description: '', type: 'integer')]
    protected int $goodsId;

    #[OA\Property(property: 'tag_words', description: '', type: 'string')]
    protected string $tagWords;

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
