<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RoleQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getRoleId, description: '', type: 'integer'),
        new OA\Property(property: self::getRoleName, description: '', type: 'string'),
    ]
)]
class RoleQueryRequest extends FormRequest
{
    const string getRoleId = 'roleId';

    const string getRoleName = 'roleName';

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
