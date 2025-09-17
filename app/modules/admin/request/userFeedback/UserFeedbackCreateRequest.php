<?php

declare(strict_types=1);

namespace app\modules\admin\request\userFeedback;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserFeedbackCreateRequest',
    required: [
        'id',
        'parent_id',
        'user_id',
        'user_name',
        'user_email',
        'msg_title',
        'msg_type',
        'msg_status',
        'msg_content',
        'msg_time',
        'message_img',
        'order_id',
        'msg_area',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '反馈消息ID', type: 'integer'),
        new OA\Property(property: 'parent_id', description: '父消息ID(用于回复)', type: 'integer'),
        new OA\Property(property: 'user_id', description: '用户ID', type: 'integer'),
        new OA\Property(property: 'user_name', description: '用户名', type: 'string'),
        new OA\Property(property: 'user_email', description: '用户邮箱', type: 'string'),
        new OA\Property(property: 'msg_title', description: '反馈标题', type: 'string'),
        new OA\Property(property: 'msg_type', description: '反馈类型(0咨询 1投诉 2建议 3售后)', type: 'integer'),
        new OA\Property(property: 'msg_status', description: '处理状态(0未处理 1已处理)', type: 'integer'),
        new OA\Property(property: 'msg_content', description: '反馈内容', type: 'string'),
        new OA\Property(property: 'msg_time', description: '反馈时间', type: 'integer'),
        new OA\Property(property: 'message_img', description: '反馈图片', type: 'string'),
        new OA\Property(property: 'order_id', description: '关联订单ID', type: 'integer'),
        new OA\Property(property: 'msg_area', description: '反馈区域(0前台 1后台)', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserFeedbackCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'parent_id' => 'require',
        'user_id' => 'require',
        'user_name' => 'require',
        'user_email' => 'require',
        'msg_title' => 'require',
        'msg_type' => 'require',
        'msg_status' => 'require',
        'msg_content' => 'require',
        'msg_time' => 'require',
        'message_img' => 'require',
        'order_id' => 'require',
        'msg_area' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置反馈消息ID',
        'parent_id.require' => '请设置父消息ID(用于回复)',
        'user_id.require' => '请设置用户ID',
        'user_name.require' => '请设置用户名',
        'user_email.require' => '请设置用户邮箱',
        'msg_title.require' => '请设置反馈标题',
        'msg_type.require' => '请设置反馈类型(0咨询 1投诉 2建议 3售后)',
        'msg_status.require' => '请设置处理状态(0未处理 1已处理)',
        'msg_content.require' => '请设置反馈内容',
        'msg_time.require' => '请设置反馈时间',
        'message_img.require' => '请设置反馈图片',
        'order_id.require' => '请设置关联订单ID',
        'msg_area.require' => '请设置反馈区域(0前台 1后台)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
