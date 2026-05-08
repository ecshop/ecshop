<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AdPosition;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdPositionCreateRequest',
    required: [
        self::getPositionId,
        self::getPositionName,
        self::getAdWidth,
        self::getAdHeight,
        self::getPositionDesc,
        self::getPositionStyle,
    ],
    properties: [
        new OA\Property(property: self::getPositionId, description: '', type: 'integer'),
        new OA\Property(property: self::getPositionName, description: '', type: 'string'),
        new OA\Property(property: self::getAdWidth, description: '', type: 'integer'),
        new OA\Property(property: self::getAdHeight, description: '', type: 'integer'),
        new OA\Property(property: self::getPositionDesc, description: '', type: 'string'),
        new OA\Property(property: self::getPositionStyle, description: '', type: 'string'),
    ]
)]
class AdPositionCreateRequest extends FormRequest
{
    const string getPositionId = 'positionId';

    const string getPositionName = 'positionName';

    const string getAdWidth = 'adWidth';

    const string getAdHeight = 'adHeight';

    const string getPositionDesc = 'positionDesc';

    const string getPositionStyle = 'positionStyle';

    public function rules(): array
    {
        return [
            self::getPositionId => 'required',
            self::getPositionName => 'required',
            self::getAdWidth => 'required',
            self::getAdHeight => 'required',
            self::getPositionDesc => 'required',
            self::getPositionStyle => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getPositionId.'.required' => '请设置',
            self::getPositionName.'.required' => '请设置',
            self::getAdWidth.'.required' => '请设置',
            self::getAdHeight.'.required' => '请设置',
            self::getPositionDesc.'.required' => '请设置',
            self::getPositionStyle.'.required' => '请设置',
        ];
    }
}
