<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\VoteOption;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'VoteOptionQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getOptionId, description: '', type: 'integer'),
        new OA\Property(property: self::getVoteId, description: '', type: 'integer'),
    ]
)]
class VoteOptionQueryRequest extends FormRequest
{
    const string getOptionId = 'optionId';

    const string getVoteId = 'voteId';

    public function rules(): array
    {
        return [
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}
