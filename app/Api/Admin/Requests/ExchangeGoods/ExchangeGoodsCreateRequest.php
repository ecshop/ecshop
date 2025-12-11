<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ExchangeGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ExchangeGoodsCreateRequest',
    required: [
        self::getGoodsId,
        self::getExchangeIntegral,
        self::getIsExchange,
        self::getIsHot,
    ],
    properties: [
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getExchangeIntegral, description: '', type: 'integer'),
        new OA\Property(property: self::getIsExchange, description: '', type: 'integer'),
        new OA\Property(property: self::getIsHot, description: '', type: 'integer'),
    ]
)]
class ExchangeGoodsCreateRequest extends FormRequest
{
    const string getGoodsId = 'goodsId';

    const string getExchangeIntegral = 'exchangeIntegral';

    const string getIsExchange = 'isExchange';

    const string getIsHot = 'isHot';

    public function rules(): array
    {
        return [
            self::getGoodsId => 'required',
            self::getExchangeIntegral => 'required',
            self::getIsExchange => 'required',
            self::getIsHot => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getGoodsId.'.required' => '请设置',
            self::getExchangeIntegral.'.required' => '请设置',
            self::getIsExchange.'.required' => '请设置',
            self::getIsHot.'.required' => '请设置',
        ];
    }
}
