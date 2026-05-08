<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Region;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RegionUpdateRequest',
    required: [
        self::getRegionId,
        self::getParentId,
        self::getRegionName,
        self::getRegionType,
        self::getAgencyId,
    ],
    properties: [
        new OA\Property(property: self::getRegionId, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getRegionName, description: '', type: 'string'),
        new OA\Property(property: self::getRegionType, description: '', type: 'integer'),
        new OA\Property(property: self::getAgencyId, description: '', type: 'integer'),
    ]
)]
class RegionUpdateRequest extends FormRequest
{
    const string getRegionId = 'regionId';

    const string getParentId = 'parentId';

    const string getRegionName = 'regionName';

    const string getRegionType = 'regionType';

    const string getAgencyId = 'agencyId';

    public function rules(): array
    {
        return [
            self::getRegionId => 'required',
            self::getParentId => 'required',
            self::getRegionName => 'required',
            self::getRegionType => 'required',
            self::getAgencyId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getRegionId.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getRegionName.'.required' => '请设置',
            self::getRegionType.'.required' => '请设置',
            self::getAgencyId.'.required' => '请设置',
        ];
    }
}
