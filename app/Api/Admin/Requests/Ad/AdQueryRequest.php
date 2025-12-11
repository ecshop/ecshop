<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Ad;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getAdId, description: '', type: 'integer'),
        new OA\Property(property: self::getPositionId, description: '', type: 'integer'),
        new OA\Property(property: self::getEnabled, description: '', type: 'integer'),
    ]
)]
class AdQueryRequest extends FormRequest
{
    const string getAdId = 'adId';

    const string getPositionId = 'positionId';

    const string getEnabled = 'enabled';

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
