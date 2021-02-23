<?php

require __DIR__ . '/constant.php';

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

/**
 * 获得当前格林威治时间的时间戳
 * @return false|int|string
 */
function gmtime()
{
    return (time() - date('Z'));
}

/**
 * 获得服务器的时区
 * @return float|int|string
 */
function server_timezone()
{
    if (function_exists('date_default_timezone_get')) {
        return date_default_timezone_get();
    } else {
        return date('Z') / 3600;
    }
}

/**
 *  生成一个用户自定义时区日期的GMT时间戳
 *
 * @access  public
 * @param int $hour
 * @param int $minute
 * @param int $second
 * @param int $month
 * @param int $day
 * @param int $year
 *
 * @return void
 */
function local_mktime($hour = null, $minute = null, $second = null, $month = null, $day = null, $year = null)
{
    $timezone = isset($_SESSION['timezone']) ? $_SESSION['timezone'] : config('shop.timezone');

    /**
     * $time = mktime($hour, $minute, $second, $month, $day, $year) - date('Z') + (date('Z') - $timezone * 3600)
     * 先用mktime生成时间戳，再减去date('Z')转换为GMT时间，然后修正为用户自定义时间。以下是化简后结果
     **/
    return mktime($hour, $minute, $second, $month, $day, $year) - $timezone * 3600;
}


/**
 * 将GMT时间戳格式化为用户自定义时区日期
 *
 * @param string $format
 * @param integer $time 该参数必须是一个GMT的时间戳
 *
 * @return  string
 */
function local_date($format, $time = null)
{
    $timezone = isset($_SESSION['timezone']) ? $_SESSION['timezone'] : config('shop.timezone');

    if ($time === null) {
        $time = gmtime();
    } elseif ($time <= 0) {
        return '';
    }

    $time += ($timezone * 3600);

    return date($format, $time);
}

/**
 * 转换字符串形式的时间表达式为GMT时间戳
 * @param $str
 * @return false|int|string
 */
function gmstr2time($str)
{
    $time = strtotime($str);

    if ($time > 0) {
        $time -= date('Z');
    }

    return $time;
}

/**
 *  将一个用户自定义时区的日期转为GMT时间戳
 * @param string $str
 * @return  integer
 */
function local_strtotime($str)
{
    $timezone = isset($_SESSION['timezone']) ? $_SESSION['timezone'] : config('shop.timezone');

    /**
     * $time = mktime($hour, $minute, $second, $month, $day, $year) - date('Z') + (date('Z') - $timezone * 3600)
     * 先用mktime生成时间戳，再减去date('Z')转换为GMT时间，然后修正为用户自定义时间。以下是化简后结果
     **/
    return strtotime($str) - $timezone * 3600;
}

/**
 * 获得用户所在时区指定的时间戳
 * @param   $timestamp  integer     该时间戳必须是一个服务器本地的时间戳
 * @return  array
 */
function local_gettime($timestamp = null)
{
    $tmp = local_getdate($timestamp);
    return $tmp[0];
}

/**
 * 获得用户所在时区指定的日期和时间信息
 * @param   $timestamp  integer     该时间戳必须是一个服务器本地的时间戳
 * @return  array
 */
function local_getdate($timestamp = null)
{
    $timezone = isset($_SESSION['timezone']) ? $_SESSION['timezone'] : config('shop.timezone');

    /* 如果时间戳为空，则获得服务器的当前时间 */
    if ($timestamp === null) {
        $timestamp = time();
    }

    $gmt = $timestamp - date('Z');       // 得到该时间的格林威治时间
    $local_time = $gmt + ($timezone * 3600);    // 转换为用户所在时区的时间戳

    return getdate($local_time);
}
