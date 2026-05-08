<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CategoryQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
    ]
)]
class CategoryQueryRequest extends FormRequest
{
    const string getCatId = 'catId';

    const string getParentId = 'parentId';

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
