<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Searchengine;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'SearchengineQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getSearchengine, description: '', type: 'string'),
    ]
)]
class SearchengineQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getSearchengine = 'searchengine';

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
