<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\UserRank;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserRankCreateRequest',
    required: [
        self::getRankId,
        self::getRankName,
        self::getMinPoints,
        self::getMaxPoints,
        self::getDiscount,
        self::getShowPrice,
        self::getSpecialRank,
    ],
    properties: [
        new OA\Property(property: self::getRankId, description: '', type: 'integer'),
        new OA\Property(property: self::getRankName, description: '', type: 'string'),
        new OA\Property(property: self::getMinPoints, description: '', type: 'integer'),
        new OA\Property(property: self::getMaxPoints, description: '', type: 'integer'),
        new OA\Property(property: self::getDiscount, description: '', type: 'integer'),
        new OA\Property(property: self::getShowPrice, description: '', type: 'integer'),
        new OA\Property(property: self::getSpecialRank, description: '', type: 'integer'),
    ]
)]
class UserRankCreateRequest extends FormRequest
{
    const string getRankId = 'rankId';

    const string getRankName = 'rankName';

    const string getMinPoints = 'minPoints';

    const string getMaxPoints = 'maxPoints';

    const string getDiscount = 'discount';

    const string getShowPrice = 'showPrice';

    const string getSpecialRank = 'specialRank';

    public function rules(): array
    {
        return [
            self::getRankId => 'required',
            self::getRankName => 'required',
            self::getMinPoints => 'required',
            self::getMaxPoints => 'required',
            self::getDiscount => 'required',
            self::getShowPrice => 'required',
            self::getSpecialRank => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getRankId.'.required' => '请设置',
            self::getRankName.'.required' => '请设置',
            self::getMinPoints.'.required' => '请设置',
            self::getMaxPoints.'.required' => '请设置',
            self::getDiscount.'.required' => '请设置',
            self::getShowPrice.'.required' => '请设置',
            self::getSpecialRank.'.required' => '请设置',
        ];
    }
}
