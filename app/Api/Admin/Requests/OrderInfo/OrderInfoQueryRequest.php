<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\OrderInfo;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'OrderInfoQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderSn, description: '', type: 'string'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getPayStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingId, description: '', type: 'integer'),
        new OA\Property(property: self::getPayId, description: '', type: 'integer'),
        new OA\Property(property: self::getExtensionId, description: '', type: 'integer'),
        new OA\Property(property: self::getAgencyId, description: '', type: 'integer'),
    ]
)]
class OrderInfoQueryRequest extends FormRequest
{
    const string getOrderId = 'orderId';

    const string getOrderSn = 'orderSn';

    const string getUserId = 'userId';

    const string getOrderStatus = 'orderStatus';

    const string getShippingStatus = 'shippingStatus';

    const string getPayStatus = 'payStatus';

    const string getShippingId = 'shippingId';

    const string getPayId = 'payId';

    const string getExtensionId = 'extensionId';

    const string getAgencyId = 'agencyId';

    public function rules(): array
    {
        return [
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}
