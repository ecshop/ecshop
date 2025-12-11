<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\AuctionLog;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AuctionLogQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getLogId, description: '', type: 'integer'),
        new OA\Property(property: self::getActId, description: '', type: 'integer'),
    ]
)]
class AuctionLogQueryRequest extends FormRequest
{
    const string getLogId = 'logId';

    const string getActId = 'actId';

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
