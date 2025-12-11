<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\MemberPrice;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'MemberPriceQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getPriceId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserRank, description: '', type: 'integer'),
    ]
)]
class MemberPriceQueryRequest extends FormRequest
{
    const string getPriceId = 'priceId';

    const string getUserRank = 'userRank';

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
