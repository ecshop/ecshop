<?php

declare(strict_types=1);

namespace app\modules\admin\request\emailTemplate;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'EmailTemplateUpdateRequest',
    required: [
        'id',
        'template_code',
        'is_html',
        'template_subject',
        'template_content',
        'last_modify',
        'last_send',
        'type',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '模板ID', type: 'integer'),
        new OA\Property(property: 'template_code', description: '模板代码', type: 'string'),
        new OA\Property(property: 'is_html', description: '是否HTML格式(0否1是)', type: 'integer'),
        new OA\Property(property: 'template_subject', description: '邮件主题', type: 'string'),
        new OA\Property(property: 'template_content', description: '邮件内容', type: 'string'),
        new OA\Property(property: 'last_modify', description: '最后修改时间', type: 'integer'),
        new OA\Property(property: 'last_send', description: '最后发送时间', type: 'integer'),
        new OA\Property(property: 'type', description: '邮件类型', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class EmailTemplateUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'template_code' => 'require',
        'is_html' => 'require',
        'template_subject' => 'require',
        'template_content' => 'require',
        'last_modify' => 'require',
        'last_send' => 'require',
        'type' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置模板ID',
        'template_code.require' => '请设置模板代码',
        'is_html.require' => '请设置是否HTML格式(0否1是)',
        'template_subject.require' => '请设置邮件主题',
        'template_content.require' => '请设置邮件内容',
        'last_modify.require' => '请设置最后修改时间',
        'last_send.require' => '请设置最后发送时间',
        'type.require' => '请设置邮件类型',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
