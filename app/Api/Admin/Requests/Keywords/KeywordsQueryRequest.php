<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Keywords;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'KeywordsQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getKeyword, description: '', type: 'string'),
    ]
)]
class KeywordsQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getKeyword = 'keyword';

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
