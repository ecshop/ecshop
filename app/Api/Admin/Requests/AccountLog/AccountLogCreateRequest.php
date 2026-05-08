<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AccountLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AccountLogCreateRequest',
    required: [
        self::getLogId,
        self::getUserId,
        self::getUserMoney,
        self::getFrozenMoney,
        self::getRankPoints,
        self::getPayPoints,
        self::getChangeTime,
        self::getChangeDesc,
        self::getChangeType,
    ],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserMoney, description: '', type: 'string'),
        new OA\Property(property: self::getFrozenMoney, description: '', type: 'string'),
        new OA\Property(property: self::getRankPoints, description: '', type: 'integer'),
        new OA\Property(property: self::getPayPoints, description: '', type: 'integer'),
        new OA\Property(property: self::getChangeTime, description: '', type: 'integer'),
        new OA\Property(property: self::getChangeDesc, description: '', type: 'string'),
        new OA\Property(property: self::getChangeType, description: '', type: 'integer'),
    ]
)]
class AccountLogCreateRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getUserId = 'userId';

    const string getUserMoney = 'userMoney';

    const string getFrozenMoney = 'frozenMoney';

    const string getRankPoints = 'rankPoints';

    const string getPayPoints = 'payPoints';

    const string getChangeTime = 'changeTime';

    const string getChangeDesc = 'changeDesc';

    const string getChangeType = 'changeType';

    public function rules(): array
    {
        return [
            self::getLogId => 'required',
            self::getUserId => 'required',
            self::getUserMoney => 'required',
            self::getFrozenMoney => 'required',
            self::getRankPoints => 'required',
            self::getPayPoints => 'required',
            self::getChangeTime => 'required',
            self::getChangeDesc => 'required',
            self::getChangeType => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getLogId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getUserMoney.'.required' => '请设置',
            self::getFrozenMoney.'.required' => '请设置',
            self::getRankPoints.'.required' => '请设置',
            self::getPayPoints.'.required' => '请设置',
            self::getChangeTime.'.required' => '请设置',
            self::getChangeDesc.'.required' => '请设置',
            self::getChangeType.'.required' => '请设置',
        ];
    }
}
