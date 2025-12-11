<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\EmailList;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'EmailListCreateRequest',
    required: [
        self::getEmail,
        self::getStat,
        self::getHash,
    ],
    properties: [
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getStat, description: '', type: 'integer'),
        new OA\Property(property: self::getHash, description: '', type: 'string'),
    ]
)]
class EmailListCreateRequest extends FormRequest
{
    const string getEmail = 'email';

    const string getStat = 'stat';

    const string getHash = 'hash';

    public function rules(): array
    {
        return [
            self::getEmail => 'required',
            self::getStat => 'required',
            self::getHash => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getEmail.'.required' => '请设置',
            self::getStat.'.required' => '请设置',
            self::getHash.'.required' => '请设置',
        ];
    }
}
