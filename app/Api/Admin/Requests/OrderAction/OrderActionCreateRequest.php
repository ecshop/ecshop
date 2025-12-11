<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\OrderAction;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'OrderActionCreateRequest',
    required: [
        self::getActionId,
        self::getOrderId,
        self::getActionUser,
        self::getOrderStatus,
        self::getShippingStatus,
        self::getPayStatus,
        self::getActionPlace,
        self::getActionNote,
        self::getLogTime,
    ],
    properties: [
        new OA\Property(property: self::getActionId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getActionUser, description: '', type: 'string'),
        new OA\Property(property: self::getOrderStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getPayStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getActionPlace, description: '', type: 'integer'),
        new OA\Property(property: self::getActionNote, description: '', type: 'string'),
        new OA\Property(property: self::getLogTime, description: '', type: 'integer'),
    ]
)]
class OrderActionCreateRequest extends FormRequest
{
    const string getActionId = 'actionId';

    const string getOrderId = 'orderId';

    const string getActionUser = 'actionUser';

    const string getOrderStatus = 'orderStatus';

    const string getShippingStatus = 'shippingStatus';

    const string getPayStatus = 'payStatus';

    const string getActionPlace = 'actionPlace';

    const string getActionNote = 'actionNote';

    const string getLogTime = 'logTime';

    public function rules(): array
    {
        return [
            self::getActionId => 'required',
            self::getOrderId => 'required',
            self::getActionUser => 'required',
            self::getOrderStatus => 'required',
            self::getShippingStatus => 'required',
            self::getPayStatus => 'required',
            self::getActionPlace => 'required',
            self::getActionNote => 'required',
            self::getLogTime => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getActionId.'.required' => '请设置',
            self::getOrderId.'.required' => '请设置',
            self::getActionUser.'.required' => '请设置',
            self::getOrderStatus.'.required' => '请设置',
            self::getShippingStatus.'.required' => '请设置',
            self::getPayStatus.'.required' => '请设置',
            self::getActionPlace.'.required' => '请设置',
            self::getActionNote.'.required' => '请设置',
            self::getLogTime.'.required' => '请设置',
        ];
    }
}
