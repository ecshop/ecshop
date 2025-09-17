<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopCron;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopCronCreateRequest',
    required: [
        'id',
        'cron_code',
        'cron_name',
        'cron_desc',
        'cron_order',
        'cron_config',
        'thistime',
        'nextime',
        'day',
        'week',
        'hour',
        'minute',
        'enable',
        'run_once',
        'allow_ip',
        'alow_files',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '任务ID', type: 'integer'),
        new OA\Property(property: 'cron_code', description: '任务代码', type: 'string'),
        new OA\Property(property: 'cron_name', description: '任务名称', type: 'string'),
        new OA\Property(property: 'cron_desc', description: '任务描述', type: 'string'),
        new OA\Property(property: 'cron_order', description: '排序', type: 'integer'),
        new OA\Property(property: 'cron_config', description: '任务配置', type: 'string'),
        new OA\Property(property: 'thistime', description: '上次执行时间', type: 'integer'),
        new OA\Property(property: 'nextime', description: '下次执行时间', type: 'integer'),
        new OA\Property(property: 'day', description: '执行日(每月)', type: 'integer'),
        new OA\Property(property: 'week', description: '执行周(每周)', type: 'string'),
        new OA\Property(property: 'hour', description: '执行小时', type: 'string'),
        new OA\Property(property: 'minute', description: '执行分钟', type: 'string'),
        new OA\Property(property: 'enable', description: '是否启用', type: 'integer'),
        new OA\Property(property: 'run_once', description: '是否只运行一次', type: 'integer'),
        new OA\Property(property: 'allow_ip', description: '允许执行的IP', type: 'string'),
        new OA\Property(property: 'alow_files', description: '允许执行的文件', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopCronCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'cron_code' => 'require',
        'cron_name' => 'require',
        'cron_desc' => 'require',
        'cron_order' => 'require',
        'cron_config' => 'require',
        'thistime' => 'require',
        'nextime' => 'require',
        'day' => 'require',
        'week' => 'require',
        'hour' => 'require',
        'minute' => 'require',
        'enable' => 'require',
        'run_once' => 'require',
        'allow_ip' => 'require',
        'alow_files' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置任务ID',
        'cron_code.require' => '请设置任务代码',
        'cron_name.require' => '请设置任务名称',
        'cron_desc.require' => '请设置任务描述',
        'cron_order.require' => '请设置排序',
        'cron_config.require' => '请设置任务配置',
        'thistime.require' => '请设置上次执行时间',
        'nextime.require' => '请设置下次执行时间',
        'day.require' => '请设置执行日(每月)',
        'week.require' => '请设置执行周(每周)',
        'hour.require' => '请设置执行小时',
        'minute.require' => '请设置执行分钟',
        'enable.require' => '请设置是否启用',
        'run_once.require' => '请设置是否只运行一次',
        'allow_ip.require' => '请设置允许执行的IP',
        'alow_files.require' => '请设置允许执行的文件',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
