<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\MailTemplates;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'MailTemplatesQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getTemplateId, description: '', type: 'integer'),
        new OA\Property(property: self::getTemplateCode, description: '', type: 'string'),
        new OA\Property(property: self::getType, description: '', type: 'string'),
    ]
)]
class MailTemplatesQueryRequest extends FormRequest
{
    const string getTemplateId = 'templateId';

    const string getTemplateCode = 'templateCode';

    const string getType = 'type';

    public function rules(): array
    {
        return [
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}
