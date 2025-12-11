<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ProductCreateRequest',
    required: [
        self::getProductId,
        self::getGoodsId,
        self::getGoodsAttr,
        self::getProductSn,
        self::getProductNumber,
    ],
    properties: [
        new OA\Property(property: self::getProductId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsAttr, description: '', type: 'string'),
        new OA\Property(property: self::getProductSn, description: '', type: 'string'),
        new OA\Property(property: self::getProductNumber, description: '', type: 'integer'),
    ]
)]
class ProductCreateRequest extends FormRequest
{
    const string getProductId = 'productId';

    const string getGoodsId = 'goodsId';

    const string getGoodsAttr = 'goodsAttr';

    const string getProductSn = 'productSn';

    const string getProductNumber = 'productNumber';

    public function rules(): array
    {
        return [
            self::getProductId => 'required',
            self::getGoodsId => 'required',
            self::getGoodsAttr => 'required',
            self::getProductSn => 'required',
            self::getProductNumber => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getProductId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getGoodsAttr.'.required' => '请设置',
            self::getProductSn.'.required' => '请设置',
            self::getProductNumber.'.required' => '请设置',
        ];
    }
}
