<?php

declare(strict_types=1);

namespace app\modules\admin\request\emailSend;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'EmailSendCreateRequest',
    required: [
        'id',
        'email',
        'template_id',
        'email_content',
        'error',
        'pri',
        'last_send',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '记录ID', type: 'integer'),
        new OA\Property(property: 'email', description: '收件人邮箱', type: 'string'),
        new OA\Property(property: 'template_id', description: '邮件模板ID', type: 'integer'),
        new OA\Property(property: 'email_content', description: '邮件内容', type: 'string'),
        new OA\Property(property: 'error', description: '发送错误标记(0成功 1失败)', type: 'integer'),
        new OA\Property(property: 'pri', description: '优先级', type: 'integer'),
        new OA\Property(property: 'last_send', description: '最后发送时间', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class EmailSendCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'email' => 'require',
        'template_id' => 'require',
        'email_content' => 'require',
        'error' => 'require',
        'pri' => 'require',
        'last_send' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置记录ID',
        'email.require' => '请设置收件人邮箱',
        'template_id.require' => '请设置邮件模板ID',
        'email_content.require' => '请设置邮件内容',
        'error.require' => '请设置发送错误标记(0成功 1失败)',
        'pri.require' => '请设置优先级',
        'last_send.require' => '请设置最后发送时间',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
