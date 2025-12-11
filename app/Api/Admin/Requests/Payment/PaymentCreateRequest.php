<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PaymentCreateRequest',
    required: [
        self::getPayId,
        self::getPayCode,
        self::getPayName,
        self::getPayFee,
        self::getPayDesc,
        self::getPayOrder,
        self::getPayConfig,
        self::getEnabled,
        self::getIsCod,
        self::getIsOnline,
    ],
    properties: [
        new OA\Property(property: self::getPayId, description: '', type: 'integer'),
        new OA\Property(property: self::getPayCode, description: '', type: 'string'),
        new OA\Property(property: self::getPayName, description: '', type: 'string'),
        new OA\Property(property: self::getPayFee, description: '', type: 'string'),
        new OA\Property(property: self::getPayDesc, description: '', type: 'string'),
        new OA\Property(property: self::getPayOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getPayConfig, description: '', type: 'string'),
        new OA\Property(property: self::getEnabled, description: '', type: 'integer'),
        new OA\Property(property: self::getIsCod, description: '', type: 'integer'),
        new OA\Property(property: self::getIsOnline, description: '', type: 'integer'),
    ]
)]
class PaymentCreateRequest extends FormRequest
{
    const string getPayId = 'payId';

    const string getPayCode = 'payCode';

    const string getPayName = 'payName';

    const string getPayFee = 'payFee';

    const string getPayDesc = 'payDesc';

    const string getPayOrder = 'payOrder';

    const string getPayConfig = 'payConfig';

    const string getEnabled = 'enabled';

    const string getIsCod = 'isCod';

    const string getIsOnline = 'isOnline';

    public function rules(): array
    {
        return [
            self::getPayId => 'required',
            self::getPayCode => 'required',
            self::getPayName => 'required',
            self::getPayFee => 'required',
            self::getPayDesc => 'required',
            self::getPayOrder => 'required',
            self::getPayConfig => 'required',
            self::getEnabled => 'required',
            self::getIsCod => 'required',
            self::getIsOnline => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getPayId.'.required' => '请设置',
            self::getPayCode.'.required' => '请设置',
            self::getPayName.'.required' => '请设置',
            self::getPayFee.'.required' => '请设置',
            self::getPayDesc.'.required' => '请设置',
            self::getPayOrder.'.required' => '请设置',
            self::getPayConfig.'.required' => '请设置',
            self::getEnabled.'.required' => '请设置',
            self::getIsCod.'.required' => '请设置',
            self::getIsOnline.'.required' => '请设置',
        ];
    }
}
