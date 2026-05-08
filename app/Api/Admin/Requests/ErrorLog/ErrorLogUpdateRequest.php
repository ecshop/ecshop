<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\ErrorLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ErrorLogUpdateRequest',
    required: [
        self::getId,
        self::getInfo,
        self::getFile,
        self::getTime,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getInfo, description: '', type: 'string'),
        new OA\Property(property: self::getFile, description: '', type: 'string'),
        new OA\Property(property: self::getTime, description: '', type: 'integer'),
    ]
)]
class ErrorLogUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getInfo = 'info';

    const string getFile = 'file';

    const string getTime = 'time';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getInfo => 'required',
            self::getFile => 'required',
            self::getTime => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getInfo.'.required' => '请设置',
            self::getFile.'.required' => '请设置',
            self::getTime.'.required' => '请设置',
        ];
    }
}
