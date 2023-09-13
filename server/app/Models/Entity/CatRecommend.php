<?php

declare(strict_types=1);

namespace App\Models\Entity;

use App\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CatRecommendSchema')]
class CatRecommend
{
    use ArrayObject;

    #[OA\Property(property: 'id', description: '', type: 'integer')]
    protected int $id;

    #[OA\Property(property: 'cat_id', description: '', type: 'integer')]
    protected int $catId;

    #[OA\Property(property: 'recommend_type', description: '', type: 'integer')]
    protected int $recommendType;

    /**
     * 获取
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 设置
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * 获取
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * 设置
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    /**
     * 获取
     */
    public function getRecommendType(): int
    {
        return $this->recommendType;
    }

    /**
     * 设置
     */
    public function setRecommendType(int $recommendType): void
    {
        $this->recommendType = $recommendType;
    }
}
