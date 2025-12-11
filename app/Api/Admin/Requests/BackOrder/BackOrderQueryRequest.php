<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\BackOrder;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BackOrderQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getBackId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
    ]
)]
class BackOrderQueryRequest extends FormRequest
{
    const string getBackId = 'backId';

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
