<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\PayLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PayLogQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
    ]
)]
class PayLogQueryRequest extends FormRequest
{
    const string getLogId = 'logId';

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
