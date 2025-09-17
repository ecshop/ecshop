<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopPack;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopPackUpdateRequest',
    required: [
        'id',
        'pack_name',
        'pack_img',
        'pack_fee',
        'free_money',
        'pack_desc',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '礼包ID', type: 'integer'),
        new OA\Property(property: 'pack_name', description: '礼包名称', type: 'string'),
        new OA\Property(property: 'pack_img', description: '礼包图片路径', type: 'string'),
        new OA\Property(property: 'pack_fee', description: '礼包价格', type: 'float'),
        new OA\Property(property: 'free_money', description: '免运费金额(达到此金额免运费)', type: 'integer'),
        new OA\Property(property: 'pack_desc', description: '礼包描述', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopPackUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'pack_name' => 'require',
        'pack_img' => 'require',
        'pack_fee' => 'require',
        'free_money' => 'require',
        'pack_desc' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置礼包ID',
        'pack_name.require' => '请设置礼包名称',
        'pack_img.require' => '请设置礼包图片路径',
        'pack_fee.require' => '请设置礼包价格',
        'free_money.require' => '请设置免运费金额(达到此金额免运费)',
        'pack_desc.require' => '请设置礼包描述',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
