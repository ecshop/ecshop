<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Pack;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PackQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getPackId, description: '', type: 'integer'),
    ]
)]
class PackQueryRequest extends FormRequest
{
    const string getPackId = 'packId';

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
