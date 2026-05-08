<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GroupGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GroupGoodsQueryRequest',
    required: [],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getAdminId, description: '', type: 'integer'),
    ]
)]
class GroupGoodsQueryRequest extends FormRequest
{
    const string getId = 'id';

    const string getAdminId = 'adminId';

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
