<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\BonusType;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'BonusTypeCreateRequest',
    required: [
        self::getTypeId,
        self::getTypeName,
        self::getTypeMoney,
        self::getSendType,
        self::getMinAmount,
        self::getMaxAmount,
        self::getSendStartDate,
        self::getSendEndDate,
        self::getUseStartDate,
        self::getUseEndDate,
        self::getMinGoodsAmount,
    ],
    properties: [
        new OA\Property(property: self::getTypeId, description: '', type: 'integer'),
        new OA\Property(property: self::getTypeName, description: '', type: 'string'),
        new OA\Property(property: self::getTypeMoney, description: '', type: 'string'),
        new OA\Property(property: self::getSendType, description: '', type: 'integer'),
        new OA\Property(property: self::getMinAmount, description: '', type: 'string'),
        new OA\Property(property: self::getMaxAmount, description: '', type: 'string'),
        new OA\Property(property: self::getSendStartDate, description: '', type: 'integer'),
        new OA\Property(property: self::getSendEndDate, description: '', type: 'integer'),
        new OA\Property(property: self::getUseStartDate, description: '', type: 'integer'),
        new OA\Property(property: self::getUseEndDate, description: '', type: 'integer'),
        new OA\Property(property: self::getMinGoodsAmount, description: '', type: 'string'),
    ]
)]
class BonusTypeCreateRequest extends FormRequest
{
    const string getTypeId = 'typeId';

    const string getTypeName = 'typeName';

    const string getTypeMoney = 'typeMoney';

    const string getSendType = 'sendType';

    const string getMinAmount = 'minAmount';

    const string getMaxAmount = 'maxAmount';

    const string getSendStartDate = 'sendStartDate';

    const string getSendEndDate = 'sendEndDate';

    const string getUseStartDate = 'useStartDate';

    const string getUseEndDate = 'useEndDate';

    const string getMinGoodsAmount = 'minGoodsAmount';

    public function rules(): array
    {
        return [
            self::getTypeId => 'required',
            self::getTypeName => 'required',
            self::getTypeMoney => 'required',
            self::getSendType => 'required',
            self::getMinAmount => 'required',
            self::getMaxAmount => 'required',
            self::getSendStartDate => 'required',
            self::getSendEndDate => 'required',
            self::getUseStartDate => 'required',
            self::getUseEndDate => 'required',
            self::getMinGoodsAmount => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getTypeId.'.required' => '请设置',
            self::getTypeName.'.required' => '请设置',
            self::getTypeMoney.'.required' => '请设置',
            self::getSendType.'.required' => '请设置',
            self::getMinAmount.'.required' => '请设置',
            self::getMaxAmount.'.required' => '请设置',
            self::getSendStartDate.'.required' => '请设置',
            self::getSendEndDate.'.required' => '请设置',
            self::getUseStartDate.'.required' => '请设置',
            self::getUseEndDate.'.required' => '请设置',
            self::getMinGoodsAmount.'.required' => '请设置',
        ];
    }
}
