<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopStats;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopStatsCreateRequest',
    required: [
        'id',
        'access_time',
        'ip_address',
        'visit_times',
        'browser',
        'system',
        'language',
        'area',
        'referer_domain',
        'referer_path',
        'access_url',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'access_time', description: '访问时间戳', type: 'integer'),
        new OA\Property(property: 'ip_address', description: '访问者IP地址', type: 'string'),
        new OA\Property(property: 'visit_times', description: '访问次数', type: 'integer'),
        new OA\Property(property: 'browser', description: '浏览器类型', type: 'string'),
        new OA\Property(property: 'system', description: '操作系统', type: 'string'),
        new OA\Property(property: 'language', description: '语言设置', type: 'string'),
        new OA\Property(property: 'area', description: '地区信息', type: 'string'),
        new OA\Property(property: 'referer_domain', description: '来源域名', type: 'string'),
        new OA\Property(property: 'referer_path', description: '来源路径', type: 'string'),
        new OA\Property(property: 'access_url', description: '访问URL', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopStatsCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'access_time' => 'require',
        'ip_address' => 'require',
        'visit_times' => 'require',
        'browser' => 'require',
        'system' => 'require',
        'language' => 'require',
        'area' => 'require',
        'referer_domain' => 'require',
        'referer_path' => 'require',
        'access_url' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'access_time.require' => '请设置访问时间戳',
        'ip_address.require' => '请设置访问者IP地址',
        'visit_times.require' => '请设置访问次数',
        'browser.require' => '请设置浏览器类型',
        'system.require' => '请设置操作系统',
        'language.require' => '请设置语言设置',
        'area.require' => '请设置地区信息',
        'referer_domain.require' => '请设置来源域名',
        'referer_path.require' => '请设置来源路径',
        'access_url.require' => '请设置访问URL',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
