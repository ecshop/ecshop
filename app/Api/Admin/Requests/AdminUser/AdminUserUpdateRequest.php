<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AdminUser;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdminUserUpdateRequest',
    required: [
        self::getUserId,
        self::getUserName,
        self::getEmail,
        self::getPassword,
        self::getEcSalt,
        self::getAddTime,
        self::getLastLogin,
        self::getLastIp,
        self::getActionList,
        self::getNavList,
        self::getLangType,
        self::getAgencyId,
        self::getSuppliersId,
        self::getTodolist,
        self::getRoleId,
    ],
    properties: [
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserName, description: '', type: 'string'),
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getPassword, description: '', type: 'string'),
        new OA\Property(property: self::getEcSalt, description: '', type: 'string'),
        new OA\Property(property: self::getAddTime, description: '', type: 'integer'),
        new OA\Property(property: self::getLastLogin, description: '', type: 'integer'),
        new OA\Property(property: self::getLastIp, description: '', type: 'string'),
        new OA\Property(property: self::getActionList, description: '', type: 'string'),
        new OA\Property(property: self::getNavList, description: '', type: 'string'),
        new OA\Property(property: self::getLangType, description: '', type: 'string'),
        new OA\Property(property: self::getAgencyId, description: '', type: 'integer'),
        new OA\Property(property: self::getSuppliersId, description: '', type: 'integer'),
        new OA\Property(property: self::getTodolist, description: '', type: 'string'),
        new OA\Property(property: self::getRoleId, description: '', type: 'integer'),
    ]
)]
class AdminUserUpdateRequest extends FormRequest
{
    const string getUserId = 'userId';

    const string getUserName = 'userName';

    const string getEmail = 'email';

    const string getPassword = 'password';

    const string getEcSalt = 'ecSalt';

    const string getAddTime = 'addTime';

    const string getLastLogin = 'lastLogin';

    const string getLastIp = 'lastIp';

    const string getActionList = 'actionList';

    const string getNavList = 'navList';

    const string getLangType = 'langType';

    const string getAgencyId = 'agencyId';

    const string getSuppliersId = 'suppliersId';

    const string getTodolist = 'todolist';

    const string getRoleId = 'roleId';

    public function rules(): array
    {
        return [
            self::getUserId => 'required',
            self::getUserName => 'required',
            self::getEmail => 'required',
            self::getPassword => 'required',
            self::getEcSalt => 'required',
            self::getAddTime => 'required',
            self::getLastLogin => 'required',
            self::getLastIp => 'required',
            self::getActionList => 'required',
            self::getNavList => 'required',
            self::getLangType => 'required',
            self::getAgencyId => 'required',
            self::getSuppliersId => 'required',
            self::getTodolist => 'required',
            self::getRoleId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getUserId.'.required' => '请设置',
            self::getUserName.'.required' => '请设置',
            self::getEmail.'.required' => '请设置',
            self::getPassword.'.required' => '请设置',
            self::getEcSalt.'.required' => '请设置',
            self::getAddTime.'.required' => '请设置',
            self::getLastLogin.'.required' => '请设置',
            self::getLastIp.'.required' => '请设置',
            self::getActionList.'.required' => '请设置',
            self::getNavList.'.required' => '请设置',
            self::getLangType.'.required' => '请设置',
            self::getAgencyId.'.required' => '请设置',
            self::getSuppliersId.'.required' => '请设置',
            self::getTodolist.'.required' => '请设置',
            self::getRoleId.'.required' => '请设置',
        ];
    }
}
