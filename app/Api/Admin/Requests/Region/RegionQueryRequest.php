<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Region;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RegionQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getRegionId, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getRegionType, description: '', type: 'integer'),
        new OA\Property(property: self::getAgencyId, description: '', type: 'integer'),
    ]
)]
class RegionQueryRequest extends FormRequest
{
    const string getRegionId = 'regionId';

    const string getParentId = 'parentId';

    const string getRegionType = 'regionType';

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
