<?php

declare(strict_types=1);

namespace app\bundles\supplier\model;

use think\Model;

class SupplierModel extends Model
{
    /**
     * 设置表
     */
    protected $name = 'supplier';

    /**
     * 设置字段
     */
    protected array $field = [
        'id',
        'supplier_name',
        'supplier_desc',
        'is_check',
        'created_time',
        'updated_time',
        'deleted_time',
    ];
}
