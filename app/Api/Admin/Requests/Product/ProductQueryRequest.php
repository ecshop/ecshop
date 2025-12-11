<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ProductQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getProductId, description: '', type: 'integer'),
    ]
)]
class ProductQueryRequest extends FormRequest
{
    const string getProductId = 'productId';

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
