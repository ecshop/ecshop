<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\DeliveryGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'DeliveryGoodsQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getRecId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
    ]
)]
class DeliveryGoodsQueryRequest extends FormRequest
{
    const string getRecId = 'recId';

    const string getGoodsId = 'goodsId';

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
