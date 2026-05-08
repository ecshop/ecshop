<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'TagQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getTagId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
    ]
)]
class TagQueryRequest extends FormRequest
{
    const string getTagId = 'tagId';

    const string getUserId = 'userId';

    const string getGoodsId = 'goodsId';

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
