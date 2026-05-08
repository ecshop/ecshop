<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Plugins;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PluginsCreateRequest',
    required: [
        self::getCode,
        self::getVersion,
        self::getLibrary,
        self::getAssign,
        self::getInstallDate,
    ],
    properties: [
        new OA\Property(property: self::getCode, description: '', type: 'string'),
        new OA\Property(property: self::getVersion, description: '', type: 'string'),
        new OA\Property(property: self::getLibrary, description: '', type: 'string'),
        new OA\Property(property: self::getAssign, description: '', type: 'integer'),
        new OA\Property(property: self::getInstallDate, description: '', type: 'integer'),
    ]
)]
class PluginsCreateRequest extends FormRequest
{
    const string getCode = 'code';

    const string getVersion = 'version';

    const string getLibrary = 'library';

    const string getAssign = 'assign';

    const string getInstallDate = 'installDate';

    public function rules(): array
    {
        return [
            self::getCode => 'required',
            self::getVersion => 'required',
            self::getLibrary => 'required',
            self::getAssign => 'required',
            self::getInstallDate => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getCode.'.required' => '请设置',
            self::getVersion.'.required' => '请设置',
            self::getLibrary.'.required' => '请设置',
            self::getAssign.'.required' => '请设置',
            self::getInstallDate.'.required' => '请设置',
        ];
    }
}
