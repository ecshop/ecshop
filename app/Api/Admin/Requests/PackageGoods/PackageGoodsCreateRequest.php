<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\PackageGoods;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PackageGoodsCreateRequest',
    required: [
        self::getPackageId,
        self::getGoodsId,
        self::getProductId,
        self::getGoodsNumber,
        self::getAdminId,
    ],
    properties: [
        new OA\Property(property: self::getPackageId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsId, description: '', type: 'integer'),
        new OA\Property(property: self::getProductId, description: '', type: 'integer'),
        new OA\Property(property: self::getGoodsNumber, description: '', type: 'integer'),
        new OA\Property(property: self::getAdminId, description: '', type: 'integer'),
    ]
)]
class PackageGoodsCreateRequest extends FormRequest
{
    const string getPackageId = 'packageId';

    const string getGoodsId = 'goodsId';

    const string getProductId = 'productId';

    const string getGoodsNumber = 'goodsNumber';

    const string getAdminId = 'adminId';

    public function rules(): array
    {
        return [
            self::getPackageId => 'required',
            self::getGoodsId => 'required',
            self::getProductId => 'required',
            self::getGoodsNumber => 'required',
            self::getAdminId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getPackageId.'.required' => '请设置',
            self::getGoodsId.'.required' => '请设置',
            self::getProductId.'.required' => '请设置',
            self::getGoodsNumber.'.required' => '请设置',
            self::getAdminId.'.required' => '请设置',
        ];
    }
}
