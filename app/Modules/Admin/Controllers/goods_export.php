<?php

define('IN_ECS', true);

require dirname(__FILE__).'/includes/init.php';

if ($_REQUEST['act'] == 'goods_export') {
    /* 检查权限 */
    admin_priv('goods_export');

    $smarty->assign('ur_here', $_LANG['14_goods_export']);
    $smarty->assign('cat_list', cat_list());
    $smarty->assign('brand_list', get_brand_list());
    $smarty->assign('goods_type_list', goods_type_list(0));
    $goods_fields = my_array_merge($_LANG['custom'], get_attributes());
    $data_format_array = [
        'ecshop' => $_LANG['export_ecshop'],
        'custom' => $_LANG['export_custom'],
    ];
    $smarty->assign('data_format', $data_format_array);
    $smarty->assign('goods_fields', $goods_fields);
    assign_query_info();
    $smarty->display('goods_export.htm');
}
if ($_REQUEST['act'] == 'act_export_ecshop') {
    /* 检查权限 */
    admin_priv('goods_export');

    include_once 'includes/cls_phpzip.php';
    $zip = new PHPZip;

    $where = get_export_where_sql($_POST);

    $sql = 'SELECT g.*, b.brand_name as brandname '.
        ' FROM '.$ecs->table('goods').' AS g LEFT JOIN '.$ecs->table('brand').' AS b '.
        'ON g.brand_id = b.brand_id'.$where;

    $res = $db->query($sql);

    /* csv文件数组 */
    $goods_value = [];
    $goods_value['goods_name'] = '""';
    $goods_value['goods_sn'] = '""';
    $goods_value['brand_name'] = '""';
    $goods_value['market_price'] = 0;
    $goods_value['shop_price'] = 0;
    $goods_value['integral'] = 0;
    $goods_value['original_img'] = '""';
    $goods_value['goods_img'] = '""';
    $goods_value['goods_thumb'] = '""';
    $goods_value['keywords'] = '""';
    $goods_value['goods_brief'] = '""';
    $goods_value['goods_desc'] = '""';
    $goods_value['goods_weight'] = 0;
    $goods_value['goods_number'] = 0;
    $goods_value['warn_number'] = 0;
    $goods_value['is_best'] = 0;
    $goods_value['is_new'] = 0;
    $goods_value['is_hot'] = 0;
    $goods_value['is_on_sale'] = 1;
    $goods_value['is_alone_sale'] = 1;
    $goods_value['is_real'] = 1;
    $content = '"'.implode('","', $_LANG['ecshop'])."\"\n";

    while ($row = $db->fetchRow($res)) {
        $goods_value['goods_name'] = '"'.$row['goods_name'].'"';
        $goods_value['goods_sn'] = '"'.$row['goods_sn'].'"';
        $goods_value['brand_name'] = '"'.$row['brandname'].'"';
        $goods_value['market_price'] = $row['market_price'];
        $goods_value['shop_price'] = $row['shop_price'];
        $goods_value['integral'] = $row['integral'];
        $goods_value['original_img'] = '"'.$row['original_img'].'"';
        $goods_value['goods_img'] = '"'.$row['goods_img'].'"';
        $goods_value['goods_thumb'] = '"'.$row['goods_thumb'].'"';
        $goods_value['keywords'] = '"'.$row['keywords'].'"';
        $goods_value['goods_brief'] = '"'.replace_special_char($row['goods_brief'], false).'"';
        $goods_value['goods_desc'] = '"'.replace_special_char($row['goods_desc'], false).'"';
        $goods_value['goods_weight'] = $row['goods_weight'];
        $goods_value['goods_number'] = $row['goods_number'];
        $goods_value['warn_number'] = $row['warn_number'];
        $goods_value['is_best'] = $row['is_best'];
        $goods_value['is_new'] = $row['is_new'];
        $goods_value['is_hot'] = $row['is_hot'];
        $goods_value['is_on_sale'] = $row['is_on_sale'];
        $goods_value['is_alone_sale'] = $row['is_alone_sale'];
        $goods_value['is_real'] = $row['is_real'];

        $content .= implode(',', $goods_value)."\n";

        /* 压缩图片 */
        if (! empty($row['goods_img']) && is_file(ROOT_PATH.$row['goods_img'])) {
            $zip->add_file(file_get_contents(ROOT_PATH.$row['goods_img']), $row['goods_img']);
        }
        if (! empty($row['original_img']) && is_file(ROOT_PATH.$row['original_img'])) {
            $zip->add_file(file_get_contents(ROOT_PATH.$row['original_img']), $row['original_img']);
        }
        if (! empty($row['goods_thumb']) && is_file(ROOT_PATH.$row['goods_thumb'])) {
            $zip->add_file(file_get_contents(ROOT_PATH.$row['goods_thumb']), $row['goods_thumb']);
        }
    }
    $charset = empty($_POST['charset']) ? 'UTF8' : trim($_POST['charset']);

    $zip->add_file(ecs_iconv(EC_CHARSET, $charset, $content), 'goods_list.csv');

    header('Content-Disposition: attachment; filename=goods_list.zip');
    header('Content-Type: application/unknown');
    exit($zip->file());
}
/* 处理Ajax调用 */
if ($_REQUEST['act'] == 'get_goods_fields') {
    $cat_id = isset($_REQUEST['cat_id']) ? intval($_REQUEST['cat_id']) : 0;
    $goods_fields = my_array_merge($_LANG['custom'], get_attributes($cat_id));
    make_json_result($goods_fields);
}
if ($_REQUEST['act'] == 'act_export_custom') {
    /* 检查输出列 */
    if (empty($_POST['custom_goods_export'])) {
        sys_msg($_LANG['custom_goods_field_not_null'], 1, [], false);
    }

    /* 检查权限 */
    admin_priv('goods_export');

    include_once 'includes/cls_phpzip.php';
    $zip = new PHPZip;

    $where = get_export_where_sql($_POST);

    $sql = 'SELECT g.*, b.brand_name as brandname '.
        ' FROM '.$ecs->table('goods').' AS g LEFT JOIN '.$ecs->table('brand').' AS b '.
        'ON g.brand_id = b.brand_id'.$where;

    $res = $db->query($sql);

    $goods_fields = explode(',', $_POST['custom_goods_export']);
    $goods_field_name = set_goods_field_name($goods_fields, $_LANG['custom']);

    /* csv文件数组 */
    $goods_field_value = [];
    foreach ($goods_fields as $field) {
        if ($field == 'market_price' || $field == 'shop_price' || $field == 'integral' || $field == 'goods_weight' || $field == 'goods_number' || $field == 'warn_number' || $field == 'is_best' || $field == 'is_new' || $field == 'is_hot') {
            $goods_field_value[$field] = 0;
        } elseif ($field == 'is_on_sale' || $field == 'is_alone_sale' || $field == 'is_real') {
            $goods_field_value[$field] = 1;
        } else {
            $goods_field_value[$field] = '""';
        }
    }

    $content = '"'.implode('","', $goods_field_name)."\"\n";
    while ($row = $db->fetchRow($res)) {
        $goods_value = $goods_field_value;
        isset($goods_value['goods_name']) && ($goods_value['goods_name'] = '"'.$row['goods_name'].'"');
        isset($goods_value['goods_sn']) && ($goods_value['goods_sn'] = '"'.$row['goods_sn'].'"');
        isset($goods_value['brand_name']) && ($goods_value['brand_name'] = $row['brandname']);
        isset($goods_value['market_price']) && ($goods_value['market_price'] = $row['market_price']);
        isset($goods_value['shop_price']) && ($goods_value['shop_price'] = $row['shop_price']);
        isset($goods_value['integral']) && ($goods_value['integral'] = $row['integral']);
        isset($goods_value['original_img']) && ($goods_value['original_img'] = '"'.$row['original_img'].'"');
        isset($goods_value['keywords']) && ($goods_value['keywords'] = '"'.$row['keywords'].'"');
        isset($goods_value['goods_brief']) && ($goods_value['goods_brief'] = '"'.replace_special_char($row['goods_brief']).'"');
        isset($goods_value['goods_desc']) && ($goods_value['goods_desc'] = '"'.replace_special_char($row['goods_desc']).'"');
        isset($goods_value['goods_weight']) && ($goods_value['goods_weight'] = $row['goods_weight']);
        isset($goods_value['goods_number']) && ($goods_value['goods_number'] = $row['goods_number']);
        isset($goods_value['warn_number']) && ($goods_value['warn_number'] = $row['warn_number']);
        isset($goods_value['is_best']) && ($goods_value['is_best'] = $row['is_best']);
        isset($goods_value['is_new']) && ($goods_value['is_new'] = $row['is_new']);
        isset($goods_value['is_hot']) && ($goods_value['is_hot'] = $row['is_hot']);
        isset($goods_value['is_on_sale']) && ($goods_value['is_on_sale'] = $row['is_on_sale']);
        isset($goods_value['is_alone_sale']) && ($goods_value['is_alone_sale'] = $row['is_alone_sale']);
        isset($goods_value['is_real']) && ($goods_value['is_real'] = $row['is_real']);

        $sql = 'SELECT `attr_id`, `attr_value` FROM '.$ecs->table('goods_attr')." WHERE `goods_id` = '".$row['goods_id']."'";
        $query = $db->query($sql);
        while ($attr = $db->fetchRow($query)) {
            if (in_array($attr['attr_id'], $goods_fields)) {
                $goods_value[$attr['attr_id']] = '"'.$attr['attr_value'].'"';
            }
        }

        $content .= implode(',', $goods_value)."\n";

        /* 压缩图片 */
        if (! empty($row['goods_img']) && is_file(ROOT_PATH.$row['goods_img'])) {
            $zip->add_file(file_get_contents(ROOT_PATH.$row['goods_img']), $row['goods_img']);
        }
    }
    $charset = empty($_POST['charset_custom']) ? 'UTF8' : trim($_POST['charset_custom']);
    $zip->add_file(ecs_iconv(EC_CHARSET, $charset, $content), 'goods_list.csv');

    header('Content-Disposition: attachment; filename=goods_list.zip');
    header('Content-Type: application/unknown');
    exit($zip->file());
}
if ($_REQUEST['act'] == 'get_goods_list') {
    include_once ROOT_PATH.'includes/cls_json.php';
    $json = new JSON;
    $filters = $json->decode($_REQUEST['JSON']);
    $arr = get_goods_list($filters);
    $opt = [];

    foreach ($arr as $key => $val) {
        $opt[] = ['goods_id' => $val['goods_id'],
            'goods_name' => $val['goods_name'],
        ];
    }
    make_json_result($opt);
}

/**
 * @return void
 */
function utf82u2($str)
{
    $len = strlen($str);
    $start = 0;
    $result = '';

    if ($len == 0) {
        return $result;
    }

    while ($start < $len) {
        $num = ord($str[$start]);
        if ($num < 127) {
            $result .= chr($num).chr($num >> 8);
            $start += 1;
        } else {
            if ($num < 192) {
                /* 无效字节 */
                $start++;
            } elseif ($num < 224) {
                if ($start + 1 < $len) {
                    $num = (ord($str[$start]) & 0x3F) << 6;
                    $num += ord($str[$start + 1]) & 0x3F;
                    $result .= chr($num & 0xFF).chr($num >> 8);
                }
                $start += 2;
            } elseif ($num < 240) {
                if ($start + 2 < $len) {
                    $num = (ord($str[$start]) & 0x1F) << 12;
                    $num += (ord($str[$start + 1]) & 0x3F) << 6;
                    $num += ord($str[$start + 2]) & 0x3F;

                    $result .= chr($num & 0xFF).chr($num >> 8);
                }
                $start += 3;
            } elseif ($num < 248) {
                if ($start + 3 < $len) {
                    $num = (ord($str[$start]) & 0x0F) << 18;
                    $num += (ord($str[$start + 1]) & 0x3F) << 12;
                    $num += (ord($str[$start + 2]) & 0x3F) << 6;
                    $num += ord($str[$start + 3]) & 0x3F;
                    $result .= chr($num & 0xFF).chr($num >> 8).chr($num >> 16);
                }
                $start += 4;
            } elseif ($num < 252) {
                if ($start + 4 < $len) {
                    /* 不做处理 */
                }
                $start += 5;
            } else {
                if ($start + 5 < $len) {
                    /* 不做处理 */
                }
                $start += 6;
            }
        }
    }

    return $result;
}

/**
 * @return string
 */
function image_path_format($content)
{
    $prefix = 'http://'.$_SERVER['SERVER_NAME'];
    $pattern = '/(background|src)=[\'|\"]((?!http:\/\/).*?)[\'|\"]/i';
    $replace = "$1='".$prefix."$2'";

    return preg_replace($pattern, $replace, $content);
}

/**
 * 获取商品类型属性
 *
 * @param  int  $cat_id  商品类型ID
 * @return array
 */
function get_attributes($cat_id = 0)
{
    $sql = 'SELECT `attr_id`, `cat_id`, `attr_name` FROM '.$GLOBALS['ecs']->table('attribute').' ';
    if (! empty($cat_id)) {
        $cat_id = intval($cat_id);
        $sql .= " WHERE `cat_id` = '{$cat_id}' ";
    }
    $sql .= ' ORDER BY `cat_id` ASC, `attr_id` ASC ';
    $attributes = [];
    $query = $GLOBALS['db']->query($sql);
    while ($row = $GLOBALS['db']->fetchRow($query)) {
        $attributes[$row['attr_id']] = $row['attr_name'];
    }

    return $attributes;
}

/**
 * 设置导出商品字段名
 *
 * @param  array  $array  字段数组
 * @param  array  $lang  字段名
 * @return array
 */
function set_goods_field_name($array, $lang)
{
    $tmp_fields = $array;
    foreach ($array as $key => $value) {
        if (isset($lang[$value])) {
            $tmp_fields[$key] = $lang[$value];
        } else {
            $tmp_fields[$key] = $GLOBALS['db']->getOne('SELECT `attr_name` FROM '.$GLOBALS['ecs']->table('attribute')." WHERE `attr_id` = '".intval($value)."'");
        }
    }

    return $tmp_fields;
}

/**
 * 数组合并
 *
 * @param  array  $array1  数组1
 * @param  array  $array2  数组2
 * @return array
 */
function my_array_merge($array1, $array2)
{
    $new_array = $array1;
    foreach ($array2 as $key => $val) {
        $new_array[$key] = $val;
    }

    return $new_array;
}

/**
 * 生成商品导出过滤条件
 *
 * @param  array  $filter  过滤条件数组
 * @return string
 */
function get_export_where_sql($filter)
{
    $where = '';
    if (! empty($filter['goods_ids'])) {
        $goods_ids = explode(',', $filter['goods_ids']);
        if (is_array($goods_ids) && ! empty($goods_ids)) {
            $goods_ids = array_unique($goods_ids);
            $goods_ids = "'".implode("','", $goods_ids)."'";
        } else {
            $goods_ids = "'0'";
        }
        $where = ' WHERE g.is_delete = 0 AND g.goods_id IN ('.$goods_ids.') ';
    } else {
        $_filter = new StdClass;
        $_filter->cat_id = $filter['cat_id'];
        $_filter->brand_id = $filter['brand_id'];
        $_filter->keyword = $filter['keyword'];
        $where = get_where_sql($_filter);
    }

    return $where;
}

/**
 * 替换影响csv文件的字符
 *
 * @param  $str  string 处理字符串
 */
function replace_special_char($str, $replace = true)
{
    $str = str_replace("\r\n", '', image_path_format($str));
    $str = str_replace("\t", '    ', $str);
    $str = str_replace("\n", '', $str);
    if ($replace == true) {
        $str = '"'.str_replace('"', '""', $str).'"';
    }

    return $str;
}
