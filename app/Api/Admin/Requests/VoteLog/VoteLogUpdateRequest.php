<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\VoteLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'VoteLogUpdateRequest',
    required: [
        self::getLogId,
        self::getVoteId,
        self::getIpAddress,
        self::getVoteTime,
    ],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getVoteId, description: '', type: 'integer'),
        new OA\Property(property: self::getIpAddress, description: '', type: 'string'),
        new OA\Property(property: self::getVoteTime, description: '', type: 'integer'),
    ]
)]
class VoteLogUpdateRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getVoteId = 'voteId';

    const string getIpAddress = 'ipAddress';

    const string getVoteTime = 'voteTime';

    public function rules(): array
    {
        return [
            self::getLogId => 'required',
            self::getVoteId => 'required',
            self::getIpAddress => 'required',
            self::getVoteTime => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getLogId.'.required' => '请设置',
            self::getVoteId.'.required' => '请设置',
            self::getIpAddress.'.required' => '请设置',
            self::getVoteTime.'.required' => '请设置',
        ];
    }
}
