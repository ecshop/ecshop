<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\PayLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PayLogUpdateRequest',
    required: [
        self::getLogId,
        self::getOrderId,
        self::getOrderAmount,
        self::getOrderType,
        self::getIsPaid,
    ],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderAmount, description: '', type: 'string'),
        new OA\Property(property: self::getOrderType, description: '', type: 'integer'),
        new OA\Property(property: self::getIsPaid, description: '', type: 'integer'),
    ]
)]
class PayLogUpdateRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getOrderId = 'orderId';

    const string getOrderAmount = 'orderAmount';

    const string getOrderType = 'orderType';

    const string getIsPaid = 'isPaid';

    public function rules(): array
    {
        return [
            self::getLogId => 'required',
            self::getOrderId => 'required',
            self::getOrderAmount => 'required',
            self::getOrderType => 'required',
            self::getIsPaid => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getLogId.'.required' => '请设置',
            self::getOrderId.'.required' => '请设置',
            self::getOrderAmount.'.required' => '请设置',
            self::getOrderType.'.required' => '请设置',
            self::getIsPaid.'.required' => '请设置',
        ];
    }
}
