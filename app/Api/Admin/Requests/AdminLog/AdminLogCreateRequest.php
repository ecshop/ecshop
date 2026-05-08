<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AdminLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdminLogCreateRequest',
    required: [
        self::getLogId,
        self::getLogTime,
        self::getUserId,
        self::getLogInfo,
        self::getIpAddress,
    ],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getLogTime, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getLogInfo, description: '', type: 'string'),
        new OA\Property(property: self::getIpAddress, description: '', type: 'string'),
    ]
)]
class AdminLogCreateRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getLogTime = 'logTime';

    const string getUserId = 'userId';

    const string getLogInfo = 'logInfo';

    const string getIpAddress = 'ipAddress';

    public function rules(): array
    {
        return [
            self::getLogId => 'required',
            self::getLogTime => 'required',
            self::getUserId => 'required',
            self::getLogInfo => 'required',
            self::getIpAddress => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getLogId.'.required' => '请设置',
            self::getLogTime.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getLogInfo.'.required' => '请设置',
            self::getIpAddress.'.required' => '请设置',
        ];
    }
}
