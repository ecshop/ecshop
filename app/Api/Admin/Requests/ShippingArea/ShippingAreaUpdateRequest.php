<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ShippingArea;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ShippingAreaUpdateRequest',
    required: [
        self::getShippingAreaId,
        self::getShippingAreaName,
        self::getShippingId,
        self::getConfigure,
    ],
    properties: [
        new OA\Property(property: self::getShippingAreaId, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingAreaName, description: '', type: 'string'),
        new OA\Property(property: self::getShippingId, description: '', type: 'integer'),
        new OA\Property(property: self::getConfigure, description: '', type: 'string'),
    ]
)]
class ShippingAreaUpdateRequest extends FormRequest
{
    const string getShippingAreaId = 'shippingAreaId';

    const string getShippingAreaName = 'shippingAreaName';

    const string getShippingId = 'shippingId';

    const string getConfigure = 'configure';

    public function rules(): array
    {
        return [
            self::getShippingAreaId => 'required',
            self::getShippingAreaName => 'required',
            self::getShippingId => 'required',
            self::getConfigure => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getShippingAreaId.'.required' => '请设置',
            self::getShippingAreaName.'.required' => '请设置',
            self::getShippingId.'.required' => '请设置',
            self::getConfigure.'.required' => '请设置',
        ];
    }
}
