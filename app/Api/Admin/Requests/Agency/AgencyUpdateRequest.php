<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Agency;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AgencyUpdateRequest',
    required: [
        self::getAgencyId,
        self::getAgencyName,
        self::getAgencyDesc,
    ],
    properties: [
        new OA\Property(property: self::getAgencyId, description: '', type: 'integer'),
        new OA\Property(property: self::getAgencyName, description: '', type: 'string'),
        new OA\Property(property: self::getAgencyDesc, description: '', type: 'string'),
    ]
)]
class AgencyUpdateRequest extends FormRequest
{
    const string getAgencyId = 'agencyId';

    const string getAgencyName = 'agencyName';

    const string getAgencyDesc = 'agencyDesc';

    public function rules(): array
    {
        return [
            self::getAgencyId => 'required',
            self::getAgencyName => 'required',
            self::getAgencyDesc => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getAgencyId.'.required' => '请设置',
            self::getAgencyName.'.required' => '请设置',
            self::getAgencyDesc.'.required' => '请设置',
        ];
    }
}
