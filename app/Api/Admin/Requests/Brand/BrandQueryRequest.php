<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BrandQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getBrandId, description: '', type: 'integer'),
        new OA\Property(property: self::getIsShow, description: '', type: 'integer'),
    ]
)]
class BrandQueryRequest extends FormRequest
{
    const string getBrandId = 'brandId';

    const string getIsShow = 'isShow';

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
