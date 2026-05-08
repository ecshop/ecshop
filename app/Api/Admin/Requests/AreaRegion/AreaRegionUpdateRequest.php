<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AreaRegion;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AreaRegionUpdateRequest',
    required: [
        self::getId,
        self::getShippingAreaId,
        self::getRegionId,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getShippingAreaId, description: '', type: 'integer'),
        new OA\Property(property: self::getRegionId, description: '', type: 'integer'),
    ]
)]
class AreaRegionUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getShippingAreaId = 'shippingAreaId';

    const string getRegionId = 'regionId';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getShippingAreaId => 'required',
            self::getRegionId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getShippingAreaId.'.required' => '请设置',
            self::getRegionId.'.required' => '请设置',
        ];
    }
}
