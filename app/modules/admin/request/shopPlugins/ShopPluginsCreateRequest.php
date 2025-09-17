<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopPlugins;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopPluginsCreateRequest',
    required: [
        'id',
        'code',
        'version',
        'library',
        'assign',
        'install_date',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'code', description: '插件代码标识', type: 'string'),
        new OA\Property(property: 'version', description: '插件版本号', type: 'string'),
        new OA\Property(property: 'library', description: '插件库文件路径', type: 'string'),
        new OA\Property(property: 'assign', description: '是否分配(0未分配 1已分配)', type: 'integer'),
        new OA\Property(property: 'install_date', description: '安装时间戳', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopPluginsCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'code' => 'require',
        'version' => 'require',
        'library' => 'require',
        'assign' => 'require',
        'install_date' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'code.require' => '请设置插件代码标识',
        'version.require' => '请设置插件版本号',
        'library.require' => '请设置插件库文件路径',
        'assign.require' => '请设置是否分配(0未分配 1已分配)',
        'install_date.require' => '请设置安装时间戳',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
