<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CartQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getRecId, description: '', type: 'integer'),
        new OA\Property(property: self::getSessionId, description: '', type: 'string'),
    ]
)]
class CartQueryRequest extends FormRequest
{
    const string getRecId = 'recId';

    const string getSessionId = 'sessionId';

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
