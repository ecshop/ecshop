<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\BonusType;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BonusTypeQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getTypeId, description: '', type: 'integer'),
    ]
)]
class BonusTypeQueryRequest extends FormRequest
{
    const string getTypeId = 'typeId';

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
