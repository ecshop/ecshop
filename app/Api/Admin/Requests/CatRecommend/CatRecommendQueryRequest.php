<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\CatRecommend;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CatRecommendQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getRecommendType, description: '', type: 'integer'),
    ]
)]
class CatRecommendQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getRecommendType = 'recommendType';

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
