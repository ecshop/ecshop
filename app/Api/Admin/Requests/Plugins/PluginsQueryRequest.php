<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Plugins;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PluginsQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getCode, description: '', type: 'string'),
    ]
)]
class PluginsQueryRequest extends FormRequest
{
    const string getId = 'id';

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
