<?php

declare(strict_types=1);

namespace app\bundles\goods\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsCatRecommendEntity')]
class GoodsCatRecommendEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'cat_id', description: '分类ID', type: 'integer')]
    private int $cat_id;

    #[OA\Property(property: 'recommend_type', description: '推荐类型(1精品 2新品 3热销)', type: 'integer')]
    private int $recommend_type;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCatId(): int
    {
        return $this->cat_id;
    }

    public function setCatId(int $catId): void
    {
        $this->cat_id = $catId;
    }

    public function getRecommendType(): int
    {
        return $this->recommend_type;
    }

    public function setRecommendType(int $recommendType): void
    {
        $this->recommend_type = $recommendType;
    }
}
