<?php

declare(strict_types=1);

namespace app\modules\admin\request\userBooking;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserBookingUpdateRequest',
    required: [
        'id',
        'user_id',
        'email',
        'link_man',
        'tel',
        'goods_id',
        'product_id',
        'goods_desc',
        'goods_number',
        'booking_time',
        'is_dispose',
        'dispose_user',
        'dispose_time',
        'dispose_note',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '预订记录ID', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'email', description: '用户邮箱', type: 'string'),
        new OA\Property(property: 'link_man', description: '联系人', type: 'string'),
        new OA\Property(property: 'tel', description: '联系电话', type: 'string'),
        new OA\Property(property: 'goods_id', description: '商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '货品ID', type: 'integer'),
        new OA\Property(property: 'goods_desc', description: '商品描述', type: 'string'),
        new OA\Property(property: 'goods_number', description: '预订数量', type: 'integer'),
        new OA\Property(property: 'booking_time', description: '预订时间', type: 'integer'),
        new OA\Property(property: 'is_dispose', description: '是否处理', type: 'integer'),
        new OA\Property(property: 'dispose_user', description: '处理人', type: 'string'),
        new OA\Property(property: 'dispose_time', description: '处理时间', type: 'integer'),
        new OA\Property(property: 'dispose_note', description: '处理备注', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserBookingUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'user_id' => 'require',
        'email' => 'require',
        'link_man' => 'require',
        'tel' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'goods_desc' => 'require',
        'goods_number' => 'require',
        'booking_time' => 'require',
        'is_dispose' => 'require',
        'dispose_user' => 'require',
        'dispose_time' => 'require',
        'dispose_note' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置预订记录ID',
        'user_id.require' => '请设置用户ID',
        'email.require' => '请设置用户邮箱',
        'link_man.require' => '请设置联系人',
        'tel.require' => '请设置联系电话',
        'goods_id.require' => '请设置商品ID',
        'product_id.require' => '请设置货品ID',
        'goods_desc.require' => '请设置商品描述',
        'goods_number.require' => '请设置预订数量',
        'booking_time.require' => '请设置预订时间',
        'is_dispose.require' => '请设置是否处理',
        'dispose_user.require' => '请设置处理人',
        'dispose_time.require' => '请设置处理时间',
        'dispose_note.require' => '请设置处理备注',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
