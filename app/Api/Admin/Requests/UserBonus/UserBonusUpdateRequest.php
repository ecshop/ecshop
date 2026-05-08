<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\UserBonus;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserBonusUpdateRequest',
    required: [
        self::getBonusId,
        self::getBonusTypeId,
        self::getBonusSn,
        self::getUserId,
        self::getUsedTime,
        self::getOrderId,
        self::getEmailed,
    ],
    properties: [
        new OA\Property(property: self::getBonusId, description: '', type: 'integer'),
        new OA\Property(property: self::getBonusTypeId, description: '', type: 'integer'),
        new OA\Property(property: self::getBonusSn, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getUsedTime, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getEmailed, description: '', type: 'integer'),
    ]
)]
class UserBonusUpdateRequest extends FormRequest
{
    const string getBonusId = 'bonusId';

    const string getBonusTypeId = 'bonusTypeId';

    const string getBonusSn = 'bonusSn';

    const string getUserId = 'userId';

    const string getUsedTime = 'usedTime';

    const string getOrderId = 'orderId';

    const string getEmailed = 'emailed';

    public function rules(): array
    {
        return [
            self::getBonusId => 'required',
            self::getBonusTypeId => 'required',
            self::getBonusSn => 'required',
            self::getUserId => 'required',
            self::getUsedTime => 'required',
            self::getOrderId => 'required',
            self::getEmailed => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getBonusId.'.required' => '请设置',
            self::getBonusTypeId.'.required' => '请设置',
            self::getBonusSn.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getUsedTime.'.required' => '请设置',
            self::getOrderId.'.required' => '请设置',
            self::getEmailed.'.required' => '请设置',
        ];
    }
}
