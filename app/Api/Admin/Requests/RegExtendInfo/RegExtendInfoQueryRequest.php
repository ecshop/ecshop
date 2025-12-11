<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\RegExtendInfo;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RegExtendInfoQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: '', type: 'integer'),
    ]
)]
class RegExtendInfoQueryRequest extends FormRequest
{
    const string getId = 'id';

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
