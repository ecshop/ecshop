<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserUpdateRequest',
    required: [
        self::getUserId,
        self::getEmail,
        self::getUserName,
        self::getPassword,
        self::getQuestion,
        self::getAnswer,
        self::getSex,
        self::getBirthday,
        self::getUserMoney,
        self::getFrozenMoney,
        self::getPayPoints,
        self::getRankPoints,
        self::getAddressId,
        self::getRegTime,
        self::getLastLogin,
        self::getLastTime,
        self::getLastIp,
        self::getVisitCount,
        self::getUserRank,
        self::getIsSpecial,
        self::getEcSalt,
        self::getSalt,
        self::getParentId,
        self::getFlag,
        self::getAlias,
        self::getMsn,
        self::getQq,
        self::getOfficePhone,
        self::getHomePhone,
        self::getMobilePhone,
        self::getIsValidated,
        self::getCreditLine,
        self::getPasswdQuestion,
        self::getPasswdAnswer,
    ],
    properties: [
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getUserName, description: '', type: 'string'),
        new OA\Property(property: self::getPassword, description: '', type: 'string'),
        new OA\Property(property: self::getQuestion, description: '', type: 'string'),
        new OA\Property(property: self::getAnswer, description: '', type: 'string'),
        new OA\Property(property: self::getSex, description: '', type: 'integer'),
        new OA\Property(property: self::getBirthday, description: '', type: 'string'),
        new OA\Property(property: self::getUserMoney, description: '', type: 'string'),
        new OA\Property(property: self::getFrozenMoney, description: '', type: 'string'),
        new OA\Property(property: self::getPayPoints, description: '', type: 'integer'),
        new OA\Property(property: self::getRankPoints, description: '', type: 'integer'),
        new OA\Property(property: self::getAddressId, description: '', type: 'integer'),
        new OA\Property(property: self::getRegTime, description: '', type: 'integer'),
        new OA\Property(property: self::getLastLogin, description: '', type: 'integer'),
        new OA\Property(property: self::getLastTime, description: '', type: 'string'),
        new OA\Property(property: self::getLastIp, description: '', type: 'string'),
        new OA\Property(property: self::getVisitCount, description: '', type: 'integer'),
        new OA\Property(property: self::getUserRank, description: '', type: 'integer'),
        new OA\Property(property: self::getIsSpecial, description: '', type: 'integer'),
        new OA\Property(property: self::getEcSalt, description: '', type: 'string'),
        new OA\Property(property: self::getSalt, description: '', type: 'string'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getFlag, description: '', type: 'integer'),
        new OA\Property(property: self::getAlias, description: '', type: 'string'),
        new OA\Property(property: self::getMsn, description: '', type: 'string'),
        new OA\Property(property: self::getQq, description: '', type: 'string'),
        new OA\Property(property: self::getOfficePhone, description: '', type: 'string'),
        new OA\Property(property: self::getHomePhone, description: '', type: 'string'),
        new OA\Property(property: self::getMobilePhone, description: '', type: 'string'),
        new OA\Property(property: self::getIsValidated, description: '', type: 'integer'),
        new OA\Property(property: self::getCreditLine, description: '', type: 'string'),
        new OA\Property(property: self::getPasswdQuestion, description: '', type: 'string'),
        new OA\Property(property: self::getPasswdAnswer, description: '', type: 'string'),
    ]
)]
class UserUpdateRequest extends FormRequest
{
    const string getUserId = 'userId';

    const string getEmail = 'email';

    const string getUserName = 'userName';

    const string getPassword = 'password';

    const string getQuestion = 'question';

    const string getAnswer = 'answer';

    const string getSex = 'sex';

    const string getBirthday = 'birthday';

    const string getUserMoney = 'userMoney';

    const string getFrozenMoney = 'frozenMoney';

    const string getPayPoints = 'payPoints';

    const string getRankPoints = 'rankPoints';

    const string getAddressId = 'addressId';

    const string getRegTime = 'regTime';

    const string getLastLogin = 'lastLogin';

    const string getLastTime = 'lastTime';

    const string getLastIp = 'lastIp';

    const string getVisitCount = 'visitCount';

    const string getUserRank = 'userRank';

    const string getIsSpecial = 'isSpecial';

    const string getEcSalt = 'ecSalt';

    const string getSalt = 'salt';

    const string getParentId = 'parentId';

    const string getFlag = 'flag';

    const string getAlias = 'alias';

    const string getMsn = 'msn';

    const string getQq = 'qq';

    const string getOfficePhone = 'officePhone';

    const string getHomePhone = 'homePhone';

    const string getMobilePhone = 'mobilePhone';

    const string getIsValidated = 'isValidated';

    const string getCreditLine = 'creditLine';

    const string getPasswdQuestion = 'passwdQuestion';

    const string getPasswdAnswer = 'passwdAnswer';

    public function rules(): array
    {
        return [
            self::getUserId => 'required',
            self::getEmail => 'required',
            self::getUserName => 'required',
            self::getPassword => 'required',
            self::getQuestion => 'required',
            self::getAnswer => 'required',
            self::getSex => 'required',
            self::getBirthday => 'required',
            self::getUserMoney => 'required',
            self::getFrozenMoney => 'required',
            self::getPayPoints => 'required',
            self::getRankPoints => 'required',
            self::getAddressId => 'required',
            self::getRegTime => 'required',
            self::getLastLogin => 'required',
            self::getLastTime => 'required',
            self::getLastIp => 'required',
            self::getVisitCount => 'required',
            self::getUserRank => 'required',
            self::getIsSpecial => 'required',
            self::getEcSalt => 'required',
            self::getSalt => 'required',
            self::getParentId => 'required',
            self::getFlag => 'required',
            self::getAlias => 'required',
            self::getMsn => 'required',
            self::getQq => 'required',
            self::getOfficePhone => 'required',
            self::getHomePhone => 'required',
            self::getMobilePhone => 'required',
            self::getIsValidated => 'required',
            self::getCreditLine => 'required',
            self::getPasswdQuestion => 'required',
            self::getPasswdAnswer => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getUserId.'.required' => '请设置',
            self::getEmail.'.required' => '请设置',
            self::getUserName.'.required' => '请设置',
            self::getPassword.'.required' => '请设置',
            self::getQuestion.'.required' => '请设置',
            self::getAnswer.'.required' => '请设置',
            self::getSex.'.required' => '请设置',
            self::getBirthday.'.required' => '请设置',
            self::getUserMoney.'.required' => '请设置',
            self::getFrozenMoney.'.required' => '请设置',
            self::getPayPoints.'.required' => '请设置',
            self::getRankPoints.'.required' => '请设置',
            self::getAddressId.'.required' => '请设置',
            self::getRegTime.'.required' => '请设置',
            self::getLastLogin.'.required' => '请设置',
            self::getLastTime.'.required' => '请设置',
            self::getLastIp.'.required' => '请设置',
            self::getVisitCount.'.required' => '请设置',
            self::getUserRank.'.required' => '请设置',
            self::getIsSpecial.'.required' => '请设置',
            self::getEcSalt.'.required' => '请设置',
            self::getSalt.'.required' => '请设置',
            self::getParentId.'.required' => '请设置',
            self::getFlag.'.required' => '请设置',
            self::getAlias.'.required' => '请设置',
            self::getMsn.'.required' => '请设置',
            self::getQq.'.required' => '请设置',
            self::getOfficePhone.'.required' => '请设置',
            self::getHomePhone.'.required' => '请设置',
            self::getMobilePhone.'.required' => '请设置',
            self::getIsValidated.'.required' => '请设置',
            self::getCreditLine.'.required' => '请设置',
            self::getPasswdQuestion.'.required' => '请设置',
            self::getPasswdAnswer.'.required' => '请设置',
        ];
    }
}
