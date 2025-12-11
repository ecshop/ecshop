<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\LinkGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'LinkGoodsCreateRequest',
    required: [
        self::getGoodsId,
        self::getLinkGoodsId,
        self::getIsDouble,
        self::getAdminId,
    ],
    properties: [
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getLinkGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getIsDouble, description: '', type: 'integer'),
        new OA\Property(property: self::getAdminId, description: '', type: 'integer'),
    ]
)]
class LinkGoodsCreateRequest extends FormRequest
{
    const string getGoodsId = 'goodsId';

    const string getLinkGoodsId = 'linkGoodsId';

    const string getIsDouble = 'isDouble';

    const string getAdminId = 'adminId';

    public function rules(): array
    {
        return [
            self::getGoodsId => 'required',
            self::getLinkGoodsId => 'required',
            self::getIsDouble => 'required',
            self::getAdminId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getGoodsId.'.required' => '请设置',
            self::getLinkGoodsId.'.required' => '请设置',
            self::getIsDouble.'.required' => '请设置',
            self::getAdminId.'.required' => '请设置',
        ];
    }
}
