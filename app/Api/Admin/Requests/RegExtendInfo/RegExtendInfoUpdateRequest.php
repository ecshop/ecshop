<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\RegExtendInfo;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'RegExtendInfoUpdateRequest',
    required: [
        self::getId,
        self::getUserId,
        self::getRegFieldId,
        self::getContent,
    ],
    properties: [
        new OA\Property(property: self::getId, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getRegFieldId, description: '', type: 'integer'),
        new OA\Property(property: self::getContent, description: '', type: 'string'),
    ]
)]
class RegExtendInfoUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getUserId = 'userId';

    const string getRegFieldId = 'regFieldId';

    const string getContent = 'content';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getUserId => 'required',
            self::getRegFieldId => 'required',
            self::getContent => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getRegFieldId.'.required' => '请设置',
            self::getContent.'.required' => '请设置',
        ];
    }
}
