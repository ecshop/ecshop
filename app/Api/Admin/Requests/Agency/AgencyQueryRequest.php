<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Agency;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AgencyQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getAgencyId, description: '', type: 'integer'),
        new OA\Property(property: self::getAgencyName, description: '', type: 'string'),
    ]
)]
class AgencyQueryRequest extends FormRequest
{
    const string getAgencyId = 'agencyId';

    const string getAgencyName = 'agencyName';

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
