<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\EmailList;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'EmailListUpdateRequest',
    required: [
        self::getId,
        self::getEmail,
        self::getStat,
        self::getHash,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getStat, description: '', type: 'integer'),
        new OA\Property(property: self::getHash, description: '', type: 'string'),
    ]
)]
class EmailListUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getEmail = 'email';

    const string getStat = 'stat';

    const string getHash = 'hash';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getEmail => 'required',
            self::getStat => 'required',
            self::getHash => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getEmail.'.required' => '请设置',
            self::getStat.'.required' => '请设置',
            self::getHash.'.required' => '请设置',
        ];
    }
}
