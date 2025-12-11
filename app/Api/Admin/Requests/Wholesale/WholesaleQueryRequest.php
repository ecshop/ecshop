<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Wholesale;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'WholesaleQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getActId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
    ]
)]
class WholesaleQueryRequest extends FormRequest
{
    const string getActId = 'actId';

    const string getGoodsId = 'goodsId';

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
