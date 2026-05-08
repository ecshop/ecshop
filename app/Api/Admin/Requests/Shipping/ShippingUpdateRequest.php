<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Shipping;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ShippingUpdateRequest',
    required: [
        self::getShippingId,
        self::getShippingCode,
        self::getShippingName,
        self::getShippingDesc,
        self::getInsure,
        self::getSupportCod,
        self::getEnabled,
        self::getShippingPrint,
        self::getPrintBg,
        self::getConfigLable,
        self::getPrintModel,
        self::getShippingOrder,
    ],
    properties: [
        new OA\Property(property: self::getShippingId, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingCode, description: '', type: 'string'),
        new OA\Property(property: self::getShippingName, description: '', type: 'string'),
        new OA\Property(property: self::getShippingDesc, description: '', type: 'string'),
        new OA\Property(property: self::getInsure, description: '', type: 'string'),
        new OA\Property(property: self::getSupportCod, description: '', type: 'integer'),
        new OA\Property(property: self::getEnabled, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingPrint, description: '', type: 'string'),
        new OA\Property(property: self::getPrintBg, description: '', type: 'string'),
        new OA\Property(property: self::getConfigLable, description: '', type: 'string'),
        new OA\Property(property: self::getPrintModel, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingOrder, description: '', type: 'integer'),
    ]
)]
class ShippingUpdateRequest extends FormRequest
{
    const string getShippingId = 'shippingId';

    const string getShippingCode = 'shippingCode';

    const string getShippingName = 'shippingName';

    const string getShippingDesc = 'shippingDesc';

    const string getInsure = 'insure';

    const string getSupportCod = 'supportCod';

    const string getEnabled = 'enabled';

    const string getShippingPrint = 'shippingPrint';

    const string getPrintBg = 'printBg';

    const string getConfigLable = 'configLable';

    const string getPrintModel = 'printModel';

    const string getShippingOrder = 'shippingOrder';

    public function rules(): array
    {
        return [
            self::getShippingId => 'required',
            self::getShippingCode => 'required',
            self::getShippingName => 'required',
            self::getShippingDesc => 'required',
            self::getInsure => 'required',
            self::getSupportCod => 'required',
            self::getEnabled => 'required',
            self::getShippingPrint => 'required',
            self::getPrintBg => 'required',
            self::getConfigLable => 'required',
            self::getPrintModel => 'required',
            self::getShippingOrder => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getShippingId.'.required' => '请设置',
            self::getShippingCode.'.required' => '请设置',
            self::getShippingName.'.required' => '请设置',
            self::getShippingDesc.'.required' => '请设置',
            self::getInsure.'.required' => '请设置',
            self::getSupportCod.'.required' => '请设置',
            self::getEnabled.'.required' => '请设置',
            self::getShippingPrint.'.required' => '请设置',
            self::getPrintBg.'.required' => '请设置',
            self::getConfigLable.'.required' => '请设置',
            self::getPrintModel.'.required' => '请设置',
            self::getShippingOrder.'.required' => '请设置',
        ];
    }
}
