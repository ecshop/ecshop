<?php

declare(strict_types=1);

namespace app\modules\admin\request\shipping;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ShippingCreateRequest',
    required: [
        'id',
        'shipping_code',
        'shipping_name',
        'shipping_desc',
        'insure',
        'support_cod',
        'enabled',
        'shipping_print',
        'print_bg',
        'config_lable',
        'print_model',
        'shipping_order',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '配送方式ID', type: 'integer'),
        new OA\Property(property: 'shipping_code', description: '配送方式代码', type: 'string'),
        new OA\Property(property: 'shipping_name', description: '配送方式名称', type: 'string'),
        new OA\Property(property: 'shipping_desc', description: '配送方式描述', type: 'string'),
        new OA\Property(property: 'insure', description: '保价费用(百分比或固定金额)', type: 'string'),
        new OA\Property(property: 'support_cod', description: '是否支持货到付款(0否 1是)', type: 'integer'),
        new OA\Property(property: 'enabled', description: '是否启用(0禁用 1启用)', type: 'integer'),
        new OA\Property(property: 'shipping_print', description: '打印模板内容', type: 'string'),
        new OA\Property(property: 'print_bg', description: '打印背景图片路径', type: 'string'),
        new OA\Property(property: 'config_lable', description: '配置标签', type: 'string'),
        new OA\Property(property: 'print_model', description: '打印模式(0普通 1热敏)', type: 'integer'),
        new OA\Property(property: 'shipping_order', description: '排序权重', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ShippingCreateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'shipping_code' => 'require',
        'shipping_name' => 'require',
        'shipping_desc' => 'require',
        'insure' => 'require',
        'support_cod' => 'require',
        'enabled' => 'require',
        'shipping_print' => 'require',
        'print_bg' => 'require',
        'config_lable' => 'require',
        'print_model' => 'require',
        'shipping_order' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置配送方式ID',
        'shipping_code.require' => '请设置配送方式代码',
        'shipping_name.require' => '请设置配送方式名称',
        'shipping_desc.require' => '请设置配送方式描述',
        'insure.require' => '请设置保价费用(百分比或固定金额)',
        'support_cod.require' => '请设置是否支持货到付款(0否 1是)',
        'enabled.require' => '请设置是否启用(0禁用 1启用)',
        'shipping_print.require' => '请设置打印模板内容',
        'print_bg.require' => '请设置打印背景图片路径',
        'config_lable.require' => '请设置配置标签',
        'print_model.require' => '请设置打印模式(0普通 1热敏)',
        'shipping_order.require' => '请设置排序权重',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
