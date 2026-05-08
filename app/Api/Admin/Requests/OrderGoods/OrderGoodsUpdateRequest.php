<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\OrderGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'OrderGoodsUpdateRequest',
    required: [
        self::getRecId,
        self::getOrderId,
        self::getGoodsId,
        self::getGoodsName,
        self::getGoodsSn,
        self::getProductId,
        self::getGoodsNumber,
        self::getMarketPrice,
        self::getGoodsPrice,
        self::getGoodsAttr,
        self::getSendNumber,
        self::getIsReal,
        self::getExtensionCode,
        self::getParentId,
        self::getIsGift,
        self::getGoodsAttrId,
    ],
    properties: [
        new OA\Property(property: self::getRecId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsName, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsSn, description: '', type: 'string'),
        new OA\Property(property: self::getProductId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getMarketPrice, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsPrice, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsAttr, description: '', type: 'string'),
        new OA\Property(property: self::getSendNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getIsReal, description: '', type: 'integer'),
        new OA\Property(property: self::getExtensionCode, description: '', type: 'string'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getIsGift, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsAttrId, description: '', type: 'string'),
    ]
)]
class OrderGoodsUpdateRequest extends FormRequest
{
    const string getRecId = 'recId';

    const string getOrderId = 'orderId';

    const string getGoodsId = 'goodsId';

    const string getGoodsName = 'goodsName';

    const string getGoodsSn = 'goodsSn';

    const string getProductId = 'productId';

    const string getGoodsNumber = 'goodsNumber';

    const string getMarketPrice = 'marketPrice';

    const string getGoodsPrice = 'goodsPrice';

    const string getGoodsAttr = 'goodsAttr';

    const string getSendNumber = 'sendNumber';

    const string getIsReal = 'isReal';

    const string getExtensionCode = 'extensionCode';

    const string getParentId = 'parentId';

    const string getIsGift = 'isGift';

    const string getGoodsAttrId = 'goodsAttrId';

    public function rules(): array
    {
        return [
            self::getRecId => 'required',
            self::getOrderId => 'required',
            self::getGoodsId => 'required',
            self::getGoodsName => 'required',
            self::getGoodsSn => 'required',
            self::getProductId => 'required',
            self::getGoodsNumber => 'required',
            self::getMarketPrice => 'required',
            self::getGoodsPrice => 'required',
            self::getGoodsAttr => 'required',
            self::getSendNumber => 'required',
            self::getIsReal => 'required',
            self::getExtensionCode => 'required',
            self::getParentId => 'required',
            self::getIsGift => 'required',
            self::getGoodsAttrId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getRecId.'.required' => '请设置',
            self::getOrderId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getGoodsName.'.required' => '请设置',
            self::getGoodsSn.'.required' => '请设置',
            self::getProductId.'.required' => '请设置',
            self::getGoodsNumber.'.required' => '请设置',
            self::getMarketPrice.'.required' => '请设置',
            self::getGoodsPrice.'.required' => '请设置',
            self::getGoodsAttr.'.required' => '请设置',
            self::getSendNumber.'.required' => '请设置',
            self::getIsReal.'.required' => '请设置',
            self::getExtensionCode.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getIsGift.'.required' => '请设置',
            self::getGoodsAttrId.'.required' => '请设置',
        ];
    }
}
