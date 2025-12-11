<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\UserAccount;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserAccountQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getIsPaid, description: '', type: 'integer'),
    ]
)]
class UserAccountQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getUserId = 'userId';

    const string getIsPaid = 'isPaid';

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
