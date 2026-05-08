<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AreaRegion;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AreaRegionQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getRegionId, description: '', type: 'integer'),
    ]
)]
class AreaRegionQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getRegionId = 'regionId';

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
