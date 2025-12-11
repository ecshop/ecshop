<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AdminMessage;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdminMessageQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getMessageId, description: '', type: 'integer'),
        new OA\Property(property: self::getReceiverId, description: '', type: 'integer'),
    ]
)]
class AdminMessageQueryRequest extends FormRequest
{
    const string getMessageId = 'messageId';

    const string getReceiverId = 'receiverId';

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
