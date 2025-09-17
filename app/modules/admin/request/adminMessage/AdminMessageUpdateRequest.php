<?php

declare(strict_types=1);

namespace app\modules\admin\request\adminMessage;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'AdminMessageUpdateRequest',
    required: [
        'id',
        'sender_id',
        'receiver_id',
        'sent_time',
        'read_time',
        'readed',
        'deleted',
        'title',
        'message',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '消息ID', type: 'integer'),
        new OA\Property(property: 'sender_id', description: '发送者ID', type: 'integer'),
        new OA\Property(property: 'receiver_id', description: '接收者ID', type: 'integer'),
        new OA\Property(property: 'sent_time', description: '发送时间', type: 'integer'),
        new OA\Property(property: 'read_time', description: '阅读时间', type: 'integer'),
        new OA\Property(property: 'readed', description: '是否已读', type: 'integer'),
        new OA\Property(property: 'deleted', description: '是否删除', type: 'integer'),
        new OA\Property(property: 'title', description: '消息标题', type: 'string'),
        new OA\Property(property: 'message', description: '消息内容', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class AdminMessageUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'sender_id' => 'require',
        'receiver_id' => 'require',
        'sent_time' => 'require',
        'read_time' => 'require',
        'readed' => 'require',
        'deleted' => 'require',
        'title' => 'require',
        'message' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置消息ID',
        'sender_id.require' => '请设置发送者ID',
        'receiver_id.require' => '请设置接收者ID',
        'sent_time.require' => '请设置发送时间',
        'read_time.require' => '请设置阅读时间',
        'readed.require' => '请设置是否已读',
        'deleted.require' => '请设置是否删除',
        'title.require' => '请设置消息标题',
        'message.require' => '请设置消息内容',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
