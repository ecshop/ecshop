<?php

declare(strict_types=1);

namespace app\modules\admin\request\goodsVirtualCard;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'GoodsVirtualCardUpdateRequest',
    required: [
        'id',
        'goods_id',
        'product_id',
        'card_sn',
        'card_password',
        'add_date',
        'end_date',
        'is_saled',
        'order_sn',
        'crc32',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '虚拟卡ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '关联商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '关联货品ID', type: 'integer'),
        new OA\Property(property: 'card_sn', description: '卡序列号', type: 'string'),
        new OA\Property(property: 'card_password', description: '卡密码', type: 'string'),
        new OA\Property(property: 'add_date', description: '添加时间戳', type: 'integer'),
        new OA\Property(property: 'end_date', description: '过期时间戳', type: 'integer'),
        new OA\Property(property: 'is_saled', description: '是否已售(0未售 1已售)', type: 'integer'),
        new OA\Property(property: 'order_sn', description: '关联订单号', type: 'string'),
        new OA\Property(property: 'crc32', description: 'CRC32校验值', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class GoodsVirtualCardUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'card_sn' => 'require',
        'card_password' => 'require',
        'add_date' => 'require',
        'end_date' => 'require',
        'is_saled' => 'require',
        'order_sn' => 'require',
        'crc32' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置虚拟卡ID',
        'goods_id.require' => '请设置关联商品ID',
        'product_id.require' => '请设置关联货品ID',
        'card_sn.require' => '请设置卡序列号',
        'card_password.require' => '请设置卡密码',
        'add_date.require' => '请设置添加时间戳',
        'end_date.require' => '请设置过期时间戳',
        'is_saled.require' => '请设置是否已售(0未售 1已售)',
        'order_sn.require' => '请设置关联订单号',
        'crc32.require' => '请设置CRC32校验值',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
