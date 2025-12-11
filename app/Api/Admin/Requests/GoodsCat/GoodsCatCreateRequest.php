<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GoodsCat;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GoodsCatCreateRequest',
    required: [
        self::getGoodsId,
        self::getCatId,
    ],
    properties: [
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
    ]
)]
class GoodsCatCreateRequest extends FormRequest
{
    const string getGoodsId = 'goodsId';

    const string getCatId = 'catId';

    public function rules(): array
    {
        return [
            self::getGoodsId => 'required',
            self::getCatId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getGoodsId.'.required' => '请设置',
            self::getCatId.'.required' => '请设置',
        ];
    }
}
