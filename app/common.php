<?php

/**
 * 递归方式的对变量中的特殊字符进行转义
 * @param $value
 * @return array|string
 */
function addslashes_deep($value)
{
    if (empty($value)) {
        return $value;
    } else {
        return is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);
    }
}

/**
 * 将对象成员变量或者数组的特殊字符进行转义
 * @param $obj
 * @return array|mixed|string
 */
function addslashes_deep_obj($obj)
{
    if (is_object($obj) == true) {
        foreach ($obj as $key => $val) {
            $obj->$key = addslashes_deep($val);
        }
    } else {
        $obj = addslashes_deep($obj);
    }

    return $obj;
}

/**
 * 递归方式的对变量中的特殊字符去除转义
 * @param $value
 * @return array|string
 */
function stripslashes_deep($value)
{
    if (empty($value)) {
        return $value;
    } else {
        return is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
    }
}

/**
 * 获取数据表完整表名
 * @param string $table
 * @return string
 */
function table(string $table): string
{
    $database = config('database.connections.' . config('database.default') . '.database');
    $prefix = config('database.connections.' . config('database.default') . '.prefix');
    return '`' . $database . '`.`' . $prefix . $table . '`';
}
