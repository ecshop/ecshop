<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Suppliers;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'SuppliersQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getSuppliersId, description: '', type: 'integer'),
    ]
)]
class SuppliersQueryRequest extends FormRequest
{
    const string getSuppliersId = 'suppliersId';

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
