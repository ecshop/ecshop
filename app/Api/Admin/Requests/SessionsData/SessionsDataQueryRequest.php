<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\SessionsData;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'SessionsDataQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getSesskey, description: '', type: 'string'),
        new OA\Property(property: self::getExpiry, description: '', type: 'integer'),
    ]
)]
class SessionsDataQueryRequest extends FormRequest
{
    const string getSesskey = 'sesskey';

    const string getExpiry = 'expiry';

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
