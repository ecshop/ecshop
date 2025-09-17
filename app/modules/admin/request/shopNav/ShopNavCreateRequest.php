<?php

declare(strict_types=1);

namespace app\modules\admin\request\shopNav;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShopNavCreateRequest',
    required: [
        'id',
        'ctype',
        'cid',
        'name',
        'ifshow',
        'vieworder',
        'opennew',
        'url',
        'type',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '导航ID', type: 'integer'),
        new OA\Property(property: 'ctype', description: '关联内容类型', type: 'string'),
        new OA\Property(property: 'cid', description: '关联内容ID', type: 'integer'),
        new OA\Property(property: 'name', description: '导航名称', type: 'string'),
        new OA\Property(property: 'ifshow', description: '是否显示(0否1是)', type: 'integer'),
        new OA\Property(property: 'vieworder', description: '排序权重', type: 'integer'),
        new OA\Property(property: 'opennew', description: '是否新窗口打开(0否1是)', type: 'integer'),
        new OA\Property(property: 'url', description: '导航链接', type: 'string'),
        new OA\Property(property: 'type', description: '导航类型', type: 'string'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShopNavCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'ctype' => 'require',
        'cid' => 'require',
        'name' => 'require',
        'ifshow' => 'require',
        'vieworder' => 'require',
        'opennew' => 'require',
        'url' => 'require',
        'type' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置导航ID',
        'ctype.require' => '请设置关联内容类型',
        'cid.require' => '请设置关联内容ID',
        'name.require' => '请设置导航名称',
        'ifshow.require' => '请设置是否显示(0否1是)',
        'vieworder.require' => '请设置排序权重',
        'opennew.require' => '请设置是否新窗口打开(0否1是)',
        'url.require' => '请设置导航链接',
        'type.require' => '请设置导航类型',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
