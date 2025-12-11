<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Vote;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'VoteUpdateRequest',
    required: [
        self::getVoteId,
        self::getVoteName,
        self::getStartTime,
        self::getEndTime,
        self::getCanMulti,
        self::getVoteCount,
    ],
    properties: [
        new OA\Property(property: self::getVoteId, description: '', type: 'integer'),
        new OA\Property(property: self::getVoteName, description: '', type: 'string'),
        new OA\Property(property: self::getStartTime, description: '', type: 'integer'),
        new OA\Property(property: self::getEndTime, description: '', type: 'integer'),
        new OA\Property(property: self::getCanMulti, description: '', type: 'integer'),
        new OA\Property(property: self::getVoteCount, description: '', type: 'integer'),
    ]
)]
class VoteUpdateRequest extends FormRequest
{
    const string getVoteId = 'voteId';

    const string getVoteName = 'voteName';

    const string getStartTime = 'startTime';

    const string getEndTime = 'endTime';

    const string getCanMulti = 'canMulti';

    const string getVoteCount = 'voteCount';

    public function rules(): array
    {
        return [
            self::getVoteId => 'required',
            self::getVoteName => 'required',
            self::getStartTime => 'required',
            self::getEndTime => 'required',
            self::getCanMulti => 'required',
            self::getVoteCount => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getVoteId.'.required' => '请设置',
            self::getVoteName.'.required' => '请设置',
            self::getStartTime.'.required' => '请设置',
            self::getEndTime.'.required' => '请设置',
            self::getCanMulti.'.required' => '请设置',
            self::getVoteCount.'.required' => '请设置',
        ];
    }
}
