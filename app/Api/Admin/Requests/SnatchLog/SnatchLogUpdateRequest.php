<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\SnatchLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'SnatchLogUpdateRequest',
    required: [
        self::getLogId,
        self::getSnatchId,
        self::getUserId,
        self::getBidPrice,
        self::getBidTime,
    ],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getSnatchId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getBidPrice, description: '', type: 'string'),
        new OA\Property(property: self::getBidTime, description: '', type: 'integer'),
    ]
)]
class SnatchLogUpdateRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getSnatchId = 'snatchId';

    const string getUserId = 'userId';

    const string getBidPrice = 'bidPrice';

    const string getBidTime = 'bidTime';

    public function rules(): array
    {
        return [
            self::getLogId => 'required',
            self::getSnatchId => 'required',
            self::getUserId => 'required',
            self::getBidPrice => 'required',
            self::getBidTime => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getLogId.'.required' => '请设置',
            self::getSnatchId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getBidPrice.'.required' => '请设置',
            self::getBidTime.'.required' => '请设置',
        ];
    }
}
