<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GoodsAttr;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GoodsAttrCreateRequest',
    required: [
        self::getGoodsAttrId,
        self::getGoodsId,
        self::getAttrId,
        self::getAttrValue,
        self::getAttrPrice,
    ],
    properties: [
        new OA\Property(property: self::getGoodsAttrId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getAttrId, description: '', type: 'integer'),
        new OA\Property(property: self::getAttrValue, description: '', type: 'string'),
        new OA\Property(property: self::getAttrPrice, description: '', type: 'string'),
    ]
)]
class GoodsAttrCreateRequest extends FormRequest
{
    const string getGoodsAttrId = 'goodsAttrId';

    const string getGoodsId = 'goodsId';

    const string getAttrId = 'attrId';

    const string getAttrValue = 'attrValue';

    const string getAttrPrice = 'attrPrice';

    public function rules(): array
    {
        return [
            self::getGoodsAttrId => 'required',
            self::getGoodsId => 'required',
            self::getAttrId => 'required',
            self::getAttrValue => 'required',
            self::getAttrPrice => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getGoodsAttrId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getAttrId.'.required' => '请设置',
            self::getAttrValue.'.required' => '请设置',
            self::getAttrPrice.'.required' => '请设置',
        ];
    }
}
