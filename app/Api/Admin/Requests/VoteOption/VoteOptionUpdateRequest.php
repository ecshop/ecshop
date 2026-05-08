<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\VoteOption;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'VoteOptionUpdateRequest',
    required: [
        self::getOptionId,
        self::getVoteId,
        self::getOptionName,
        self::getOptionCount,
        self::getOptionOrder,
    ],
    properties: [
        new OA\Property(property: self::getOptionId, description: '', type: 'integer'),
        new OA\Property(property: self::getVoteId, description: '', type: 'integer'),
        new OA\Property(property: self::getOptionName, description: '', type: 'string'),
        new OA\Property(property: self::getOptionCount, description: '', type: 'integer'),
        new OA\Property(property: self::getOptionOrder, description: '', type: 'integer'),
    ]
)]
class VoteOptionUpdateRequest extends FormRequest
{
    const string getOptionId = 'optionId';

    const string getVoteId = 'voteId';

    const string getOptionName = 'optionName';

    const string getOptionCount = 'optionCount';

    const string getOptionOrder = 'optionOrder';

    public function rules(): array
    {
        return [
            self::getOptionId => 'required',
            self::getVoteId => 'required',
            self::getOptionName => 'required',
            self::getOptionCount => 'required',
            self::getOptionOrder => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getOptionId.'.required' => '请设置',
            self::getVoteId.'.required' => '请设置',
            self::getOptionName.'.required' => '请设置',
            self::getOptionCount.'.required' => '请设置',
            self::getOptionOrder.'.required' => '请设置',
        ];
    }
}
