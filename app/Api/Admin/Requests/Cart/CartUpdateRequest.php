<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CartUpdateRequest',
    required: [
        self::getRecId,
        self::getUserId,
        self::getSessionId,
        self::getGoodsId,
        self::getGoodsSn,
        self::getProductId,
        self::getGoodsName,
        self::getMarketPrice,
        self::getGoodsPrice,
        self::getGoodsNumber,
        self::getGoodsAttr,
        self::getIsReal,
        self::getExtensionCode,
        self::getParentId,
        self::getRecType,
        self::getIsGift,
        self::getIsShipping,
        self::getCanHandsel,
        self::getGoodsAttrId,
    ],
    properties: [
        new OA\Property(property: self::getRecId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getSessionId, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsSn, description: '', type: 'string'),
        new OA\Property(property: self::getProductId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsName, description: '', type: 'string'),
        new OA\Property(property: self::getMarketPrice, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsPrice, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsAttr, description: '', type: 'string'),
        new OA\Property(property: self::getIsReal, description: '', type: 'integer'),
        new OA\Property(property: self::getExtensionCode, description: '', type: 'string'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getRecType, description: '', type: 'integer'),
        new OA\Property(property: self::getIsGift, description: '', type: 'integer'),
        new OA\Property(property: self::getIsShipping, description: '', type: 'integer'),
        new OA\Property(property: self::getCanHandsel, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsAttrId, description: '', type: 'string'),
    ]
)]
class CartUpdateRequest extends FormRequest
{
    const string getRecId = 'recId';

    const string getUserId = 'userId';

    const string getSessionId = 'sessionId';

    const string getGoodsId = 'goodsId';

    const string getGoodsSn = 'goodsSn';

    const string getProductId = 'productId';

    const string getGoodsName = 'goodsName';

    const string getMarketPrice = 'marketPrice';

    const string getGoodsPrice = 'goodsPrice';

    const string getGoodsNumber = 'goodsNumber';

    const string getGoodsAttr = 'goodsAttr';

    const string getIsReal = 'isReal';

    const string getExtensionCode = 'extensionCode';

    const string getParentId = 'parentId';

    const string getRecType = 'recType';

    const string getIsGift = 'isGift';

    const string getIsShipping = 'isShipping';

    const string getCanHandsel = 'canHandsel';

    const string getGoodsAttrId = 'goodsAttrId';

    public function rules(): array
    {
        return [
            self::getRecId => 'required',
            self::getUserId => 'required',
            self::getSessionId => 'required',
            self::getGoodsId => 'required',
            self::getGoodsSn => 'required',
            self::getProductId => 'required',
            self::getGoodsName => 'required',
            self::getMarketPrice => 'required',
            self::getGoodsPrice => 'required',
            self::getGoodsNumber => 'required',
            self::getGoodsAttr => 'required',
            self::getIsReal => 'required',
            self::getExtensionCode => 'required',
            self::getParentId => 'required',
            self::getRecType => 'required',
            self::getIsGift => 'required',
            self::getIsShipping => 'required',
            self::getCanHandsel => 'required',
            self::getGoodsAttrId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getRecId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getSessionId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getGoodsSn.'.required' => '请设置',
            self::getProductId.'.required' => '请设置',
            self::getGoodsName.'.required' => '请设置',
            self::getMarketPrice.'.required' => '请设置',
            self::getGoodsPrice.'.required' => '请设置',
            self::getGoodsNumber.'.required' => '请设置',
            self::getGoodsAttr.'.required' => '请设置',
            self::getIsReal.'.required' => '请设置',
            self::getExtensionCode.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getRecType.'.required' => '请设置',
            self::getIsGift.'.required' => '请设置',
            self::getIsShipping.'.required' => '请设置',
            self::getCanHandsel.'.required' => '请设置',
            self::getGoodsAttrId.'.required' => '请设置',
        ];
    }
}
