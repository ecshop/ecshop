<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ArticleCat;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ArticleCatQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatType, description: '', type: 'integer'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
    ]
)]
class ArticleCatQueryRequest extends FormRequest
{
    const string getCatId = 'catId';

    const string getCatType = 'catType';

    const string getSortOrder = 'sortOrder';

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
