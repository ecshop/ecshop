<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\CatRecommend;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CatRecommendUpdateRequest',
    required: [
        self::getId,
        self::getCatId,
        self::getRecommendType,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getCatId, description: '', type: 'integer'),
        new OA\Property(property: self::getRecommendType, description: '', type: 'integer'),
    ]
)]
class CatRecommendUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getCatId = 'catId';

    const string getRecommendType = 'recommendType';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getCatId => 'required',
            self::getRecommendType => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getCatId.'.required' => '请设置',
            self::getRecommendType.'.required' => '请设置',
        ];
    }
}
