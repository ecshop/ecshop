<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\BackGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BackGoodsCreateRequest',
    required: [
        self::getRecId,
        self::getBackId,
        self::getGoodsId,
        self::getProductId,
        self::getProductSn,
        self::getGoodsName,
        self::getBrandName,
        self::getGoodsSn,
        self::getIsReal,
        self::getSendNumber,
        self::getGoodsAttr,
    ],
    properties: [
        new OA\Property(property: self::getRecId, description: '', type: 'integer'),
        new OA\Property(property: self::getBackId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getProductId, description: '', type: 'integer'),
        new OA\Property(property: self::getProductSn, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsName, description: '', type: 'string'),
        new OA\Property(property: self::getBrandName, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsSn, description: '', type: 'string'),
        new OA\Property(property: self::getIsReal, description: '', type: 'integer'),
        new OA\Property(property: self::getSendNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsAttr, description: '', type: 'string'),
    ]
)]
class BackGoodsCreateRequest extends FormRequest
{
    const string getRecId = 'recId';

    const string getBackId = 'backId';

    const string getGoodsId = 'goodsId';

    const string getProductId = 'productId';

    const string getProductSn = 'productSn';

    const string getGoodsName = 'goodsName';

    const string getBrandName = 'brandName';

    const string getGoodsSn = 'goodsSn';

    const string getIsReal = 'isReal';

    const string getSendNumber = 'sendNumber';

    const string getGoodsAttr = 'goodsAttr';

    public function rules(): array
    {
        return [
            self::getRecId => 'required',
            self::getBackId => 'required',
            self::getGoodsId => 'required',
            self::getProductId => 'required',
            self::getProductSn => 'required',
            self::getGoodsName => 'required',
            self::getBrandName => 'required',
            self::getGoodsSn => 'required',
            self::getIsReal => 'required',
            self::getSendNumber => 'required',
            self::getGoodsAttr => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getRecId.'.required' => '请设置',
            self::getBackId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getProductId.'.required' => '请设置',
            self::getProductSn.'.required' => '请设置',
            self::getGoodsName.'.required' => '请设置',
            self::getBrandName.'.required' => '请设置',
            self::getGoodsSn.'.required' => '请设置',
            self::getIsReal.'.required' => '请设置',
            self::getSendNumber.'.required' => '请设置',
            self::getGoodsAttr.'.required' => '请设置',
        ];
    }
}
