<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\DeliveryGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'DeliveryGoodsCreateRequest',
    required: [
        self::getRecId,
        self::getDeliveryId,
        self::getGoodsId,
        self::getProductId,
        self::getProductSn,
        self::getGoodsName,
        self::getBrandName,
        self::getGoodsSn,
        self::getIsReal,
        self::getExtensionCode,
        self::getParentId,
        self::getSendNumber,
        self::getGoodsAttr,
    ],
    properties: [
        new OA\Property(property: self::getRecId, description: '', type: 'integer'),
        new OA\Property(property: self::getDeliveryId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getProductId, description: '', type: 'integer'),
        new OA\Property(property: self::getProductSn, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsName, description: '', type: 'string'),
        new OA\Property(property: self::getBrandName, description: '', type: 'string'),
        new OA\Property(property: self::getGoodsSn, description: '', type: 'string'),
        new OA\Property(property: self::getIsReal, description: '', type: 'integer'),
        new OA\Property(property: self::getExtensionCode, description: '', type: 'string'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getSendNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsAttr, description: '', type: 'string'),
    ]
)]
class DeliveryGoodsCreateRequest extends FormRequest
{
    const string getRecId = 'recId';

    const string getDeliveryId = 'deliveryId';

    const string getGoodsId = 'goodsId';

    const string getProductId = 'productId';

    const string getProductSn = 'productSn';

    const string getGoodsName = 'goodsName';

    const string getBrandName = 'brandName';

    const string getGoodsSn = 'goodsSn';

    const string getIsReal = 'isReal';

    const string getExtensionCode = 'extensionCode';

    const string getParentId = 'parentId';

    const string getSendNumber = 'sendNumber';

    const string getGoodsAttr = 'goodsAttr';

    public function rules(): array
    {
        return [
            self::getRecId => 'required',
            self::getDeliveryId => 'required',
            self::getGoodsId => 'required',
            self::getProductId => 'required',
            self::getProductSn => 'required',
            self::getGoodsName => 'required',
            self::getBrandName => 'required',
            self::getGoodsSn => 'required',
            self::getIsReal => 'required',
            self::getExtensionCode => 'required',
            self::getParentId => 'required',
            self::getSendNumber => 'required',
            self::getGoodsAttr => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getRecId.'.required' => '请设置',
            self::getDeliveryId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getProductId.'.required' => '请设置',
            self::getProductSn.'.required' => '请设置',
            self::getGoodsName.'.required' => '请设置',
            self::getBrandName.'.required' => '请设置',
            self::getGoodsSn.'.required' => '请设置',
            self::getIsReal.'.required' => '请设置',
            self::getExtensionCode.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getSendNumber.'.required' => '请设置',
            self::getGoodsAttr.'.required' => '请设置',
        ];
    }
}
