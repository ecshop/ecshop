<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\UserFeed;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserFeedUpdateRequest',
    required: [
        self::getFeedId,
        self::getUserId,
        self::getValueId,
        self::getGoodsId,
        self::getFeedType,
        self::getIsFeed,
    ],
    properties: [
        new OA\Property(property: self::getFeedId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getValueId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getFeedType, description: '', type: 'integer'),
        new OA\Property(property: self::getIsFeed, description: '', type: 'integer'),
    ]
)]
class UserFeedUpdateRequest extends FormRequest
{
    const string getFeedId = 'feedId';

    const string getUserId = 'userId';

    const string getValueId = 'valueId';

    const string getGoodsId = 'goodsId';

    const string getFeedType = 'feedType';

    const string getIsFeed = 'isFeed';

    public function rules(): array
    {
        return [
            self::getFeedId => 'required',
            self::getUserId => 'required',
            self::getValueId => 'required',
            self::getGoodsId => 'required',
            self::getFeedType => 'required',
            self::getIsFeed => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getFeedId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getValueId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getFeedType.'.required' => '请设置',
            self::getIsFeed.'.required' => '请设置',
        ];
    }
}
