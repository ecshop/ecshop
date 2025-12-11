<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\GroupGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'GroupGoodsUpdateRequest',
    required: [
        self::getId,
        self::getParentId,
        self::getGoodsId,
        self::getGoodsPrice,
        self::getAdminId,
    ],
    properties: [
        new OA\Property(property: self::getId, description: 'ID', type: 'integer'),
        new OA\Property(property: self::getParentId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsPrice, description: '', type: 'string'),
        new OA\Property(property: self::getAdminId, description: '', type: 'integer'),
    ]
)]
class GroupGoodsUpdateRequest extends FormRequest
{
    const string getId = 'id';

    const string getParentId = 'parentId';

    const string getGoodsId = 'goodsId';

    const string getGoodsPrice = 'goodsPrice';

    const string getAdminId = 'adminId';

    public function rules(): array
    {
        return [
            self::getId => 'required',
            self::getParentId => 'required',
            self::getGoodsId => 'required',
            self::getGoodsPrice => 'required',
            self::getAdminId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getId.'.required' => '请设置ID',
            self::getParentId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getGoodsPrice.'.required' => '请设置',
            self::getAdminId.'.required' => '请设置',
        ];
    }
}
