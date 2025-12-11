<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\RegFields;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RegFieldsUpdateRequest',
    required: [
        self::getId,
        self::getRegFieldName,
        self::getDisOrder,
        self::getDisplay,
        self::getType,
        self::getIsNeed,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getRegFieldName, description: '', type: 'string'),
        new OA\Property(property: self::getDisOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getDisplay, description: '', type: 'integer'),
        new OA\Property(property: self::getType, description: '', type: 'integer'),
        new OA\Property(property: self::getIsNeed, description: '', type: 'integer'),
    ]
)]
class RegFieldsUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getRegFieldName = 'regFieldName';

    const string getDisOrder = 'disOrder';

    const string getDisplay = 'display';

    const string getType = 'type';

    const string getIsNeed = 'isNeed';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getRegFieldName => 'required',
            self::getDisOrder => 'required',
            self::getDisplay => 'required',
            self::getType => 'required',
            self::getIsNeed => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getRegFieldName.'.required' => '请设置',
            self::getDisOrder.'.required' => '请设置',
            self::getDisplay.'.required' => '请设置',
            self::getType.'.required' => '请设置',
            self::getIsNeed.'.required' => '请设置',
        ];
    }
}
