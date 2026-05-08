<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ExchangeGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ExchangeGoodsQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
    ]
)]
class ExchangeGoodsQueryRequest extends FormRequest
{
    const string getId = 'id';

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
