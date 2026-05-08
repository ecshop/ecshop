<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\MailTemplates;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'MailTemplatesUpdateRequest',
    required: [
        self::getTemplateId,
        self::getTemplateCode,
        self::getIsHtml,
        self::getTemplateSubject,
        self::getTemplateContent,
        self::getLastModify,
        self::getLastSend,
        self::getType,
    ],
    properties: [
        new OA\Property(property: self::getTemplateId, description: '', type: 'integer'),
        new OA\Property(property: self::getTemplateCode, description: '', type: 'string'),
        new OA\Property(property: self::getIsHtml, description: '', type: 'integer'),
        new OA\Property(property: self::getTemplateSubject, description: '', type: 'string'),
        new OA\Property(property: self::getTemplateContent, description: '', type: 'string'),
        new OA\Property(property: self::getLastModify, description: '', type: 'integer'),
        new OA\Property(property: self::getLastSend, description: '', type: 'integer'),
        new OA\Property(property: self::getType, description: '', type: 'string'),
    ]
)]
class MailTemplatesUpdateRequest extends FormRequest
{
    const string getTemplateId = 'templateId';

    const string getTemplateCode = 'templateCode';

    const string getIsHtml = 'isHtml';

    const string getTemplateSubject = 'templateSubject';

    const string getTemplateContent = 'templateContent';

    const string getLastModify = 'lastModify';

    const string getLastSend = 'lastSend';

    const string getType = 'type';

    public function rules(): array
    {
        return [
            self::getTemplateId => 'required',
            self::getTemplateCode => 'required',
            self::getIsHtml => 'required',
            self::getTemplateSubject => 'required',
            self::getTemplateContent => 'required',
            self::getLastModify => 'required',
            self::getLastSend => 'required',
            self::getType => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getTemplateId.'.required' => '请设置',
            self::getTemplateCode.'.required' => '请设置',
            self::getIsHtml.'.required' => '请设置',
            self::getTemplateSubject.'.required' => '请设置',
            self::getTemplateContent.'.required' => '请设置',
            self::getLastModify.'.required' => '请设置',
            self::getLastSend.'.required' => '请设置',
            self::getType.'.required' => '请设置',
        ];
    }
}
