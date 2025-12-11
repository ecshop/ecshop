<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\Stats;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'StatsQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getAccessTime, description: '', type: 'integer'),
    ]
)]
class StatsQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getAccessTime = 'accessTime';

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
