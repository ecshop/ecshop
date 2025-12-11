<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Nav;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'NavQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getIfshow, description: '', type: 'integer'),
        new OA\Property(property: self::getType, description: '', type: 'string'),
    ]
)]
class NavQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getIfshow = 'ifshow';

    const string getType = 'type';

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
