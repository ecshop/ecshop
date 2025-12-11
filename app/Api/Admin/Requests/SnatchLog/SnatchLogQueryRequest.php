<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\SnatchLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'SnatchLogQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getSnatchId, description: '', type: 'integer'),
    ]
)]
class SnatchLogQueryRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getSnatchId = 'snatchId';

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
