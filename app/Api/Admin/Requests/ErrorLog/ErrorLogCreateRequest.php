<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ErrorLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ErrorLogCreateRequest',
    required: [
        self::getInfo,
        self::getFile,
        self::getTime,
    ],
    properties: [
        new OA\Property(property: self::getInfo, description: '', type: 'string'),
        new OA\Property(property: self::getFile, description: '', type: 'string'),
        new OA\Property(property: self::getTime, description: '', type: 'integer'),
    ]
)]
class ErrorLogCreateRequest extends FormRequest
{
    const string getInfo = 'info';

    const string getFile = 'file';

    const string getTime = 'time';

    public function rules(): array
    {
        return [
            self::getInfo => 'required',
            self::getFile => 'required',
            self::getTime => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getInfo.'.required' => '请设置',
            self::getFile.'.required' => '请设置',
            self::getTime.'.required' => '请设置',
        ];
    }
}
