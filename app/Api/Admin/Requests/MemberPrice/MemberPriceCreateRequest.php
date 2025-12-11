<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\MemberPrice;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'MemberPriceCreateRequest',
    required: [
        self::getPriceId,
        self::getGoodsId,
        self::getUserRank,
        self::getUserPrice,
    ],
    properties: [
        new OA\Property(property: self::getPriceId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserRank, description: '', type: 'integer'),
        new OA\Property(property: self::getUserPrice, description: '', type: 'string'),
    ]
)]
class MemberPriceCreateRequest extends FormRequest
{
    const string getPriceId = 'priceId';

    const string getGoodsId = 'goodsId';

    const string getUserRank = 'userRank';

    const string getUserPrice = 'userPrice';

    public function rules(): array
    {
        return [
            self::getPriceId => 'required',
            self::getGoodsId => 'required',
            self::getUserRank => 'required',
            self::getUserPrice => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getPriceId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getUserRank.'.required' => '请设置',
            self::getUserPrice.'.required' => '请设置',
        ];
    }
}
