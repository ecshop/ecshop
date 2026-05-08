<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AuctionLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AuctionLogCreateRequest',
    required: [
        self::getLogId,
        self::getActId,
        self::getBidUser,
        self::getBidPrice,
        self::getBidTime,
    ],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getActId, description: '', type: 'integer'),
        new OA\Property(property: self::getBidUser, description: '', type: 'integer'),
        new OA\Property(property: self::getBidPrice, description: '', type: 'string'),
        new OA\Property(property: self::getBidTime, description: '', type: 'integer'),
    ]
)]
class AuctionLogCreateRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getActId = 'actId';

    const string getBidUser = 'bidUser';

    const string getBidPrice = 'bidPrice';

    const string getBidTime = 'bidTime';

    public function rules(): array
    {
        return [
            self::getLogId => 'required',
            self::getActId => 'required',
            self::getBidUser => 'required',
            self::getBidPrice => 'required',
            self::getBidTime => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getLogId.'.required' => '请设置',
            self::getActId.'.required' => '请设置',
            self::getBidUser.'.required' => '请设置',
            self::getBidPrice.'.required' => '请设置',
            self::getBidTime.'.required' => '请设置',
        ];
    }
}
