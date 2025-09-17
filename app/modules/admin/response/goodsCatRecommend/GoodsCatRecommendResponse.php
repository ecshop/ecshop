<?php

declare(strict_types=1);

namespace app\modules\admin\response\goodsCatRecommend;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'GoodsCatRecommendResponse')]
class GoodsCatRecommendResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: 'ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'catId', description: '分类ID', type: 'integer')]
    private int $catId;

    #[OA\Property(property: 'recommendType', description: '推荐类型(1精品 2新品 3热销)', type: 'integer')]
    private int $recommendType;

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
        return $this->catId;
    }

    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    public function getRecommendType(): int
    {
        return $this->recommendType;
    }

    public function setRecommendType(int $recommendType): void
    {
        $this->recommendType = $recommendType;
    }
}
