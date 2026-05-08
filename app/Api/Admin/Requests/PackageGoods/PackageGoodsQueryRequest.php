<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\PackageGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PackageGoodsQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getProductId, description: '', type: 'integer'),
    ]
)]
class PackageGoodsQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getProductId = 'productId';

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
