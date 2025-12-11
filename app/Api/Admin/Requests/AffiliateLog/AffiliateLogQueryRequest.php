<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AffiliateLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AffiliateLogQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
    ]
)]
class AffiliateLogQueryRequest extends FormRequest
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
