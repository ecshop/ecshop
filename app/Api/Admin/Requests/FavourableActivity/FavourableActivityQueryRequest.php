<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\FavourableActivity;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'FavourableActivityQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getActId, description: '', type: 'integer'),
        new OA\Property(property: self::getActName, description: '', type: 'string'),
    ]
)]
class FavourableActivityQueryRequest extends FormRequest
{
    const string getActId = 'actId';

    const string getActName = 'actName';

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
