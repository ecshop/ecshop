<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ShopConfig;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ShopConfigQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getCode, description: '', type: 'string'),
    ]
)]
class ShopConfigQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getParentId = 'parentId';

    const string getCode = 'code';

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
