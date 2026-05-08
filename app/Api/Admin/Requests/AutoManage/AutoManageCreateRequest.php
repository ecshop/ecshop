<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AutoManage;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AutoManageCreateRequest',
    required: [
        self::getItemId,
        self::getType,
        self::getStarttime,
        self::getEndtime,
    ],
    properties: [
        new OA\Property(property: self::getItemId, description: '', type: 'integer'),
        new OA\Property(property: self::getType, description: '', type: 'string'),
        new OA\Property(property: self::getStarttime, description: '', type: 'integer'),
        new OA\Property(property: self::getEndtime, description: '', type: 'integer'),
    ]
)]
class AutoManageCreateRequest extends FormRequest
{
    const string getItemId = 'itemId';

    const string getType = 'type';

    const string getStarttime = 'starttime';

    const string getEndtime = 'endtime';

    public function rules(): array
    {
        return [
            self::getItemId => 'required',
            self::getType => 'required',
            self::getStarttime => 'required',
            self::getEndtime => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getItemId.'.required' => '请设置',
            self::getType.'.required' => '请设置',
            self::getStarttime.'.required' => '请设置',
            self::getEndtime.'.required' => '请设置',
        ];
    }
}
