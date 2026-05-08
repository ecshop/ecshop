<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\VolumePrice;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'VolumePriceCreateRequest',
    required: [
        self::getPriceType,
        self::getGoodsId,
        self::getVolumeNumber,
        self::getVolumePrice,
    ],
    properties: [
        new OA\Property(property: self::getPriceType, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getVolumeNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getVolumePrice, description: '', type: 'string'),
    ]
)]
class VolumePriceCreateRequest extends FormRequest
{
    const string getPriceType = 'priceType';

    const string getGoodsId = 'goodsId';

    const string getVolumeNumber = 'volumeNumber';

    const string getVolumePrice = 'volumePrice';

    public function rules(): array
    {
        return [
            self::getPriceType => 'required',
            self::getGoodsId => 'required',
            self::getVolumeNumber => 'required',
            self::getVolumePrice => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getPriceType.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getVolumeNumber.'.required' => '请设置',
            self::getVolumePrice.'.required' => '请设置',
        ];
    }
}
