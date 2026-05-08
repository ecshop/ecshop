<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\EmailSendlist;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'EmailSendlistUpdateRequest',
    required: [
        self::getId,
        self::getEmail,
        self::getTemplateId,
        self::getEmailContent,
        self::getError,
        self::getPri,
        self::getLastSend,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getTemplateId, description: '', type: 'integer'),
        new OA\Property(property: self::getEmailContent, description: '', type: 'string'),
        new OA\Property(property: self::getError, description: '', type: 'integer'),
        new OA\Property(property: self::getPri, description: '', type: 'integer'),
        new OA\Property(property: self::getLastSend, description: '', type: 'integer'),
    ]
)]
class EmailSendlistUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getEmail = 'email';

    const string getTemplateId = 'templateId';

    const string getEmailContent = 'emailContent';

    const string getError = 'error';

    const string getPri = 'pri';

    const string getLastSend = 'lastSend';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getEmail => 'required',
            self::getTemplateId => 'required',
            self::getEmailContent => 'required',
            self::getError => 'required',
            self::getPri => 'required',
            self::getLastSend => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getEmail.'.required' => '请设置',
            self::getTemplateId.'.required' => '请设置',
            self::getEmailContent.'.required' => '请设置',
            self::getError.'.required' => '请设置',
            self::getPri.'.required' => '请设置',
            self::getLastSend.'.required' => '请设置',
        ];
    }
}
