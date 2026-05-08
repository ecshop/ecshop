<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\VirtualCard;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'VirtualCardQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getCardId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getCardSn, description: '', type: 'string'),
        new OA\Property(property: self::getIsSaled, description: '', type: 'integer'),
    ]
)]
class VirtualCardQueryRequest extends FormRequest
{
    const string getCardId = 'cardId';

    const string getGoodsId = 'goodsId';

    const string getCardSn = 'cardSn';

    const string getIsSaled = 'isSaled';

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
