<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AffiliateLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AffiliateLogCreateRequest',
    required: [
        self::getLogId,
        self::getOrderId,
        self::getTime,
        self::getUserId,
        self::getUserName,
        self::getMoney,
        self::getPoint,
        self::getSeparateType,
    ],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getTime, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserName, description: '', type: 'string'),
        new OA\Property(property: self::getMoney, description: '', type: 'string'),
        new OA\Property(property: self::getPoint, description: '', type: 'integer'),
        new OA\Property(property: self::getSeparateType, description: '', type: 'integer'),
    ]
)]
class AffiliateLogCreateRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getOrderId = 'orderId';

    const string getTime = 'time';

    const string getUserId = 'userId';

    const string getUserName = 'userName';

    const string getMoney = 'money';

    const string getPoint = 'point';

    const string getSeparateType = 'separateType';

    public function rules(): array
    {
        return [
            self::getLogId => 'required',
            self::getOrderId => 'required',
            self::getTime => 'required',
            self::getUserId => 'required',
            self::getUserName => 'required',
            self::getMoney => 'required',
            self::getPoint => 'required',
            self::getSeparateType => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getLogId.'.required' => '请设置',
            self::getOrderId.'.required' => '请设置',
            self::getTime.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getUserName.'.required' => '请设置',
            self::getMoney.'.required' => '请设置',
            self::getPoint.'.required' => '请设置',
            self::getSeparateType.'.required' => '请设置',
        ];
    }
}
