<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CardQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getCardId, description: '', type: 'integer'),
    ]
)]
class CardQueryRequest extends FormRequest
{
    const string getCardId = 'cardId';

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
