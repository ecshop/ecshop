<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\VolumePrice;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'VolumePriceQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getVolumeNumber, description: '', type: 'integer'),
    ]
)]
class VolumePriceQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getVolumeNumber = 'volumeNumber';

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
