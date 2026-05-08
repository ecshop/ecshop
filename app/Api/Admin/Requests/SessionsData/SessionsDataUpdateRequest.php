<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\SessionsData;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'SessionsDataUpdateRequest',
    required: [
        self::getSesskey,
        self::getExpiry,
        self::getData,
    ],
    properties: [
        new OA\Property(property: self::getSesskey, description: '', type: 'string'),
        new OA\Property(property: self::getExpiry, description: '', type: 'integer'),
        new OA\Property(property: self::getData, description: '', type: 'string'),
    ]
)]
class SessionsDataUpdateRequest extends FormRequest
{
    const string getSesskey = 'sesskey';

    const string getExpiry = 'expiry';

    const string getData = 'data';

    public function rules(): array
    {
        return [
            self::getSesskey => 'required',
            self::getExpiry => 'required',
            self::getData => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getSesskey.'.required' => '请设置',
            self::getExpiry.'.required' => '请设置',
            self::getData.'.required' => '请设置',
        ];
    }
}
