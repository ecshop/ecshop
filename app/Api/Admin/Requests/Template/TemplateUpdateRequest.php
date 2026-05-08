<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'TemplateUpdateRequest',
    required: [
        self::getId,
        self::getFilename,
        self::getRegion,
        self::getLibrary,
        self::getSortOrder,
        self::getIdValue,
        self::getNumber,
        self::getType,
        self::getTheme,
        self::getRemarks,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getFilename, description: '', type: 'string'),
        new OA\Property(property: self::getRegion, description: '', type: 'string'),
        new OA\Property(property: self::getLibrary, description: '', type: 'string'),
        new OA\Property(property: self::getSortOrder, description: '', type: 'integer'),
        new OA\Property(property: self::getIdValue, description: '', type: 'integer'),
        new OA\Property(property: self::getNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getType, description: '', type: 'integer'),
        new OA\Property(property: self::getTheme, description: '', type: 'string'),
        new OA\Property(property: self::getRemarks, description: '', type: 'string'),
    ]
)]
class TemplateUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getFilename = 'filename';

    const string getRegion = 'region';

    const string getLibrary = 'library';

    const string getSortOrder = 'sortOrder';

    const string getIdValue = 'idValue';

    const string getNumber = 'number';

    const string getType = 'type';

    const string getTheme = 'theme';

    const string getRemarks = 'remarks';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getFilename => 'required',
            self::getRegion => 'required',
            self::getLibrary => 'required',
            self::getSortOrder => 'required',
            self::getIdValue => 'required',
            self::getNumber => 'required',
            self::getType => 'required',
            self::getTheme => 'required',
            self::getRemarks => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getFilename.'.required' => '请设置',
            self::getRegion.'.required' => '请设置',
            self::getLibrary.'.required' => '请设置',
            self::getSortOrder.'.required' => '请设置',
            self::getIdValue.'.required' => '请设置',
            self::getNumber.'.required' => '请设置',
            self::getType.'.required' => '请设置',
            self::getTheme.'.required' => '请设置',
            self::getRemarks.'.required' => '请设置',
        ];
    }
}
