<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\DeliveryOrder;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'DeliveryOrderQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getDeliveryId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
    ]
)]
class DeliveryOrderQueryRequest extends FormRequest
{
    const string getDeliveryId = 'deliveryId';

    const string getOrderId = 'orderId';

    const string getUserId = 'userId';

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
