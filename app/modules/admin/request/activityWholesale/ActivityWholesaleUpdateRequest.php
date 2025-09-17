<?php

declare(strict_types=1);

namespace app\modules\admin\request\activityWholesale;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'ActivityWholesaleUpdateRequest',
    required: [
        'id',
        'goods_id',
        'product_id',
        'goods_name',
        'rank_ids',
        'prices',
        'enabled',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '批发活动ID', type: 'integer'),
        new OA\Property(property: 'goods_id', description: '关联商品ID', type: 'integer'),
        new OA\Property(property: 'product_id', description: '关联货品ID', type: 'integer'),
        new OA\Property(property: 'goods_name', description: '商品名称', type: 'string'),
        new OA\Property(property: 'rank_ids', description: '适用会员等级ID列表', type: 'string'),
        new OA\Property(property: 'prices', description: '批发价格设置(JSON格式)', type: 'string'),
        new OA\Property(property: 'enabled', description: '是否启用(0禁用 1启用)', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class ActivityWholesaleUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'goods_id' => 'require',
        'product_id' => 'require',
        'goods_name' => 'require',
        'rank_ids' => 'require',
        'prices' => 'require',
        'enabled' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置批发活动ID',
        'goods_id.require' => '请设置关联商品ID',
        'product_id.require' => '请设置关联货品ID',
        'goods_name.require' => '请设置商品名称',
        'rank_ids.require' => '请设置适用会员等级ID列表',
        'prices.require' => '请设置批发价格设置(JSON格式)',
        'enabled.require' => '请设置是否启用(0禁用 1启用)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
