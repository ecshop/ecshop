<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RoleCreateRequest',
    required: [
        self::getRoleId,
        self::getRoleName,
        self::getActionList,
        self::getRoleDescribe,
    ],
    properties: [
        new OA\Property(property: self::getRoleId, description: '', type: 'integer'),
        new OA\Property(property: self::getRoleName, description: '', type: 'string'),
        new OA\Property(property: self::getActionList, description: '', type: 'string'),
        new OA\Property(property: self::getRoleDescribe, description: '', type: 'string'),
    ]
)]
class RoleCreateRequest extends FormRequest
{
    const string getRoleId = 'roleId';

    const string getRoleName = 'roleName';

    const string getActionList = 'actionList';

    const string getRoleDescribe = 'roleDescribe';

    public function rules(): array
    {
        return [
            self::getRoleId => 'required',
            self::getRoleName => 'required',
            self::getActionList => 'required',
            self::getRoleDescribe => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getRoleId.'.required' => '请设置',
            self::getRoleName.'.required' => '请设置',
            self::getActionList.'.required' => '请设置',
            self::getRoleDescribe.'.required' => '请设置',
        ];
    }
}
