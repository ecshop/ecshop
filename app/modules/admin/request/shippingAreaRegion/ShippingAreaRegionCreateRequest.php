<?php

declare(strict_types=1);

namespace app\modules\admin\request\shippingAreaRegion;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShippingAreaRegionCreateRequest',
    required: [
        'id',
        'shipping_area_id',
        'region_id',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'shipping_area_id', description: '配送区域ID', type: 'integer'),
        new OA\Property(property: 'region_id', description: '地区ID', type: 'integer'),
    ]
)]
class ShippingAreaRegionCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'shipping_area_id' => 'require',
        'region_id' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'shipping_area_id.require' => '请设置配送区域ID',
        'region_id.require' => '请设置地区ID',
    ];
}
