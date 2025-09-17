<?php

declare(strict_types=1);

namespace app\modules\admin\request\userRank;

use OpenApi\Attributes as OA;
use think\Validate;

#[OA\Schema(
    schema: 'UserRankUpdateRequest',
    required: [
        'id',
        'rank_name',
        'min_points',
        'max_points',
        'discount',
        'show_price',
        'special_rank',
        'created_time',
        'updated_time',
        'deleted_time',
    ],
    properties: [
        new OA\Property(property: 'id', description: '等级ID', type: 'integer'),
        new OA\Property(property: 'rank_name', description: '等级名称', type: 'string'),
        new OA\Property(property: 'min_points', description: '最小积分值', type: 'integer'),
        new OA\Property(property: 'max_points', description: '最大积分值', type: 'integer'),
        new OA\Property(property: 'discount', description: '折扣百分比(0-100)', type: 'integer'),
        new OA\Property(property: 'show_price', description: '是否显示价格(0不显示 1显示)', type: 'integer'),
        new OA\Property(property: 'special_rank', description: '是否特殊等级(0普通 1特殊)', type: 'integer'),
        new OA\Property(property: 'created_time', description: '创建时间', type: 'string'),
        new OA\Property(property: 'updated_time', description: '更新时间', type: 'string'),
        new OA\Property(property: 'deleted_time', description: '删除时间', type: 'string'),
    ]
)]
class UserRankUpdateRequest extends Validate
{
    protected $rule = [
        'id' => 'require',
        'rank_name' => 'require',
        'min_points' => 'require',
        'max_points' => 'require',
        'discount' => 'require',
        'show_price' => 'require',
        'special_rank' => 'require',
        'created_time' => 'require',
        'updated_time' => 'require',
        'deleted_time' => 'require',
    ];

    protected $message = [
        'id.require' => '请设置等级ID',
        'rank_name.require' => '请设置等级名称',
        'min_points.require' => '请设置最小积分值',
        'max_points.require' => '请设置最大积分值',
        'discount.require' => '请设置折扣百分比(0-100)',
        'show_price.require' => '请设置是否显示价格(0不显示 1显示)',
        'special_rank.require' => '请设置是否特殊等级(0普通 1特殊)',
        'created_time.require' => '请设置创建时间',
        'updated_time.require' => '请设置更新时间',
        'deleted_time.require' => '请设置删除时间',
    ];
}
