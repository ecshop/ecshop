<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Wholesale;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'WholesaleCreateRequest',
    required: [
        self::getActId,
        self::getGoodsId,
        self::getGoodsName,
        self::getRankIds,
        self::getPrices,
        self::getEnabled,
    ],
    properties: [
        new OA\Property(property: self::getActId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsName, description: '', type: 'string'),
        new OA\Property(property: self::getRankIds, description: '', type: 'string'),
        new OA\Property(property: self::getPrices, description: '', type: 'string'),
        new OA\Property(property: self::getEnabled, description: '', type: 'integer'),
    ]
)]
class WholesaleCreateRequest extends FormRequest
{
    const string getActId = 'actId';

    const string getGoodsId = 'goodsId';

    const string getGoodsName = 'goodsName';

    const string getRankIds = 'rankIds';

    const string getPrices = 'prices';

    const string getEnabled = 'enabled';

    public function rules(): array
    {
        return [
            self::getActId => 'required',
            self::getGoodsId => 'required',
            self::getGoodsName => 'required',
            self::getRankIds => 'required',
            self::getPrices => 'required',
            self::getEnabled => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getActId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getGoodsName.'.required' => '请设置',
            self::getRankIds.'.required' => '请设置',
            self::getPrices.'.required' => '请设置',
            self::getEnabled.'.required' => '请设置',
        ];
    }
}
