<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GoodsActivity;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GoodsActivityCreateRequest',
    required: [
        self::getActId,
        self::getActName,
        self::getActDesc,
        self::getActType,
        self::getGoodsId,
        self::getProductId,
        self::getGoodsName,
        self::getStartTime,
        self::getEndTime,
        self::getIsFinished,
        self::getExtInfo,
    ],
    properties: [
        new OA\Property(property: self::getActId, description: '', type: 'integer'),
        new OA\Property(property: self::getActName, description: '', type: 'string'),
        new OA\Property(property: self::getActDesc, description: '', type: 'string'),
        new OA\Property(property: self::getActType, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getProductId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsName, description: '', type: 'string'),
        new OA\Property(property: self::getStartTime, description: '', type: 'integer'),
        new OA\Property(property: self::getEndTime, description: '', type: 'integer'),
        new OA\Property(property: self::getIsFinished, description: '', type: 'integer'),
        new OA\Property(property: self::getExtInfo, description: '', type: 'string'),
    ]
)]
class GoodsActivityCreateRequest extends FormRequest
{
    const string getActId = 'actId';

    const string getActName = 'actName';

    const string getActDesc = 'actDesc';

    const string getActType = 'actType';

    const string getGoodsId = 'goodsId';

    const string getProductId = 'productId';

    const string getGoodsName = 'goodsName';

    const string getStartTime = 'startTime';

    const string getEndTime = 'endTime';

    const string getIsFinished = 'isFinished';

    const string getExtInfo = 'extInfo';

    public function rules(): array
    {
        return [
            self::getActId => 'required',
            self::getActName => 'required',
            self::getActDesc => 'required',
            self::getActType => 'required',
            self::getGoodsId => 'required',
            self::getProductId => 'required',
            self::getGoodsName => 'required',
            self::getStartTime => 'required',
            self::getEndTime => 'required',
            self::getIsFinished => 'required',
            self::getExtInfo => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getActId.'.required' => '请设置',
            self::getActName.'.required' => '请设置',
            self::getActDesc.'.required' => '请设置',
            self::getActType.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getProductId.'.required' => '请设置',
            self::getGoodsName.'.required' => '请设置',
            self::getStartTime.'.required' => '请设置',
            self::getEndTime.'.required' => '请设置',
            self::getIsFinished.'.required' => '请设置',
            self::getExtInfo.'.required' => '请设置',
        ];
    }
}
