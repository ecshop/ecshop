<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GroupGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GroupGoodsCreateRequest',
    required: [
        self::getParentId,
        self::getGoodsId,
        self::getGoodsPrice,
        self::getAdminId,
    ],
    properties: [
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsPrice, description: '', type: 'string'),
        new OA\Property(property: self::getAdminId, description: '', type: 'integer'),
    ]
)]
class GroupGoodsCreateRequest extends FormRequest
{
    const string getParentId = 'parentId';

    const string getGoodsId = 'goodsId';

    const string getGoodsPrice = 'goodsPrice';

    const string getAdminId = 'adminId';

    public function rules(): array
    {
        return [
            self::getParentId => 'required',
            self::getGoodsId => 'required',
            self::getGoodsPrice => 'required',
            self::getAdminId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getParentId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getGoodsPrice.'.required' => '请设置',
            self::getAdminId.'.required' => '请设置',
        ];
    }
}
