<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Goods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GoodsQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsSn, description: '', type: 'string'),
        new OA\Property(property: self::getBrandId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsWeight, description: '', type: 'string'),
        new OA\Property(property: self::getPromoteStartDate, description: '', type: 'integer'),
        new OA\Property(property: self::getPromoteEndDate, description: '', type: 'integer'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getLastUpdate, description: '', type: 'integer'),
    ]
)]
class GoodsQueryRequest extends FormRequest
{
    const string getGoodsId = 'goodsId';

    const string getCatId = 'catId';

    const string getGoodsSn = 'goodsSn';

    const string getBrandId = 'brandId';

    const string getGoodsNumber = 'goodsNumber';

    const string getGoodsWeight = 'goodsWeight';

    const string getPromoteStartDate = 'promoteStartDate';

    const string getPromoteEndDate = 'promoteEndDate';

    const string getSortOrder = 'sortOrder';

    const string getLastUpdate = 'lastUpdate';

    public function rules(): array
    {
        return [
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}
