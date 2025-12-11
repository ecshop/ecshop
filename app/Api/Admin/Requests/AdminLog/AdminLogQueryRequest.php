<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AdminLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AdminLogQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getLogTime, description: '', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
    ]
)]
class AdminLogQueryRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getLogTime = 'logTime';

    const string getUserId = 'userId';

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
