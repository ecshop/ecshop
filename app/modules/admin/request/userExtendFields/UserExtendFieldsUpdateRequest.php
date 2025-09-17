<?php

declare(strict_types=1);

namespace app\modules\admin\request\userExtendFields;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserExtendFieldsUpdateRequest',
    required: [
        'id',
        'reg_field_name',
        'dis_order',
        'display',
        'type',
        'is_need',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: 'ID', type: 'integer'),
        new OA\Property(property: 'reg_field_name', description: '注册字段名称', type: 'string'),
        new OA\Property(property: 'dis_order', description: '显示顺序', type: 'integer'),
        new OA\Property(property: 'display', description: '是否显示(0隐藏 1显示)', type: 'integer'),
        new OA\Property(property: 'type', description: '字段类型(0文本 1单选 2多选 3下拉)', type: 'integer'),
        new OA\Property(property: 'is_need', description: '是否必填(0非必填 1必填)', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserExtendFieldsUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'reg_field_name' => 'require',
        'dis_order' => 'require',
        'display' => 'require',
        'type' => 'require',
        'is_need' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置ID',
        'reg_field_name.require' => '请设置注册字段名称',
        'dis_order.require' => '请设置显示顺序',
        'display.require' => '请设置是否显示(0隐藏 1显示)',
        'type.require' => '请设置字段类型(0文本 1单选 2多选 3下拉)',
        'is_need.require' => '请设置是否必填(0非必填 1必填)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
