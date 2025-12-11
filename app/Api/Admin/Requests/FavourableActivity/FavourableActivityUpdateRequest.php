<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\FavourableActivity;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'FavourableActivityUpdateRequest',
    required: [
        self::getActId,
        self::getActName,
        self::getStartTime,
        self::getEndTime,
        self::getUserRank,
        self::getActRange,
        self::getActRangeExt,
        self::getMinAmount,
        self::getMaxAmount,
        self::getActType,
        self::getActTypeExt,
        self::getGift,
        self::getSortOrder,
    ],
    properties: [
        new OA\Property(property: self::getActId, description: '', type: 'integer'),
        new OA\Property(property: self::getActName, description: '', type: 'string'),
        new OA\Property(property: self::getStartTime, description: '', type: 'integer'),
        new OA\Property(property: self::getEndTime, description: '', type: 'integer'),
        new OA\Property(property: self::getUserRank, description: '', type: 'string'),
        new OA\Property(property: self::getActRange, description: '', type: 'integer'),
        new OA\Property(property: self::getActRangeExt, description: '', type: 'string'),
        new OA\Property(property: self::getMinAmount, description: '', type: 'string'),
        new OA\Property(property: self::getMaxAmount, description: '', type: 'string'),
        new OA\Property(property: self::getActType, description: '', type: 'integer'),
        new OA\Property(property: self::getActTypeExt, description: '', type: 'string'),
        new OA\Property(property: self::getGift, description: '', type: 'string'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
    ]
)]
class FavourableActivityUpdateRequest extends FormRequest
{
    const string getActId = 'actId';

    const string getActName = 'actName';

    const string getStartTime = 'startTime';

    const string getEndTime = 'endTime';

    const string getUserRank = 'userRank';

    const string getActRange = 'actRange';

    const string getActRangeExt = 'actRangeExt';

    const string getMinAmount = 'minAmount';

    const string getMaxAmount = 'maxAmount';

    const string getActType = 'actType';

    const string getActTypeExt = 'actTypeExt';

    const string getGift = 'gift';

    const string getSortOrder = 'sortOrder';

    public function rules(): array
    {
        return [
            self::getActId => 'required',
            self::getActName => 'required',
            self::getStartTime => 'required',
            self::getEndTime => 'required',
            self::getUserRank => 'required',
            self::getActRange => 'required',
            self::getActRangeExt => 'required',
            self::getMinAmount => 'required',
            self::getMaxAmount => 'required',
            self::getActType => 'required',
            self::getActTypeExt => 'required',
            self::getGift => 'required',
            self::getSortOrder => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getActId.'.required' => '请设置',
            self::getActName.'.required' => '请设置',
            self::getStartTime.'.required' => '请设置',
            self::getEndTime.'.required' => '请设置',
            self::getUserRank.'.required' => '请设置',
            self::getActRange.'.required' => '请设置',
            self::getActRangeExt.'.required' => '请设置',
            self::getMinAmount.'.required' => '请设置',
            self::getMaxAmount.'.required' => '请设置',
            self::getActType.'.required' => '请设置',
            self::getActTypeExt.'.required' => '请设置',
            self::getGift.'.required' => '请设置',
            self::getSortOrder.'.required' => '请设置',
        ];
    }
}
