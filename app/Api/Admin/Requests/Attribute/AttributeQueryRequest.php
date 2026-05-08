<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AttributeQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getAttrId, description: '', type: 'integer'),
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
    ]
)]
class AttributeQueryRequest extends FormRequest
{
    const string getAttrId = 'attrId';

    const string getCatId = 'catId';

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
