<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AutoManage;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AutoManageQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getType, description: '', type: 'string'),
    ]
)]
class AutoManageQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getType = 'type';

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
