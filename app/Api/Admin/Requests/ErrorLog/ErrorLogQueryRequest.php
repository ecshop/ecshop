<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ErrorLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ErrorLogQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getTime, description: '', type: 'integer'),
    ]
)]
class ErrorLogQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getTime = 'time';

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
