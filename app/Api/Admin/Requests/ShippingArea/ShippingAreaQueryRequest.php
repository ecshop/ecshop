<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ShippingArea;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ShippingAreaQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getShippingAreaId, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingId, description: '', type: 'integer'),
    ]
)]
class ShippingAreaQueryRequest extends FormRequest
{
    const string getShippingAreaId = 'shippingAreaId';

    const string getShippingId = 'shippingId';

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
