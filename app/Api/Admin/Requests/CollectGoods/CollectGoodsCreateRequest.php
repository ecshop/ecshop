<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\CollectGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CollectGoodsCreateRequest',
    required: [
        self::getRecId,
        self::getUserId,
        self::getGoodsId,
        self::getAddTime,
        self::getIsAttention,
    ],
    properties: [
        new OA\Property(property: self::getRecId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getAddTime, description: '', type: 'integer'),
        new OA\Property(property: self::getIsAttention, description: '', type: 'integer'),
    ]
)]
class CollectGoodsCreateRequest extends FormRequest
{
    const string getRecId = 'recId';

    const string getUserId = 'userId';

    const string getGoodsId = 'goodsId';

    const string getAddTime = 'addTime';

    const string getIsAttention = 'isAttention';

    public function rules(): array
    {
        return [
            self::getRecId => 'required',
            self::getUserId => 'required',
            self::getGoodsId => 'required',
            self::getAddTime => 'required',
            self::getIsAttention => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getRecId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getAddTime.'.required' => '请设置',
            self::getIsAttention.'.required' => '请设置',
        ];
    }
}
