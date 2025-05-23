<?php

define('IN_ECS', true);

require dirname(__FILE__).'/includes/init.php';
require_once ROOT_PATH.'includes/lib_order.php';
include_once ROOT_PATH.'includes/lib_transaction.php';

/* 载入语言文件 */
require_once ROOT_PATH.'languages/'.$_CFG['lang'].'/shopping_flow.php';
require_once ROOT_PATH.'languages/'.$_CFG['lang'].'/user.php';

/* ------------------------------------------------------ */
// -- PROCESSOR
/* ------------------------------------------------------ */

assign_template();
assign_dynamic('activity');
$position = assign_ur_here(0, $_LANG['shopping_activity']);
$smarty->assign('page_title', $position['title']);    // 页面标题
$smarty->assign('ur_here', $position['ur_here']);  // 当前位置

// 数据准备

/* 取得用户等级 */
$user_rank_list = [];
$user_rank_list[0] = $_LANG['not_user'];
$sql = 'SELECT rank_id, rank_name FROM '.$ecs->table('user_rank');
$res = $db->query($sql);
while ($row = $db->fetchRow($res)) {
    $user_rank_list[$row['rank_id']] = $row['rank_name'];
}

// 开始工作

$sql = 'SELECT * FROM '.$ecs->table('favourable_activity').' ORDER BY `sort_order` ASC,`end_time` DESC';
$res = $db->query($sql);

$list = [];
while ($row = $db->fetchRow($res)) {
    $row['start_time'] = local_date('Y-m-d H:i', $row['start_time']);
    $row['end_time'] = local_date('Y-m-d H:i', $row['end_time']);

    // 享受优惠会员等级
    $user_rank = explode(',', $row['user_rank']);
    $row['user_rank'] = [];
    foreach ($user_rank as $val) {
        if (isset($user_rank_list[$val])) {
            $row['user_rank'][] = $user_rank_list[$val];
        }
    }

    // 优惠范围类型、内容
    if ($row['act_range'] != FAR_ALL && ! empty($row['act_range_ext'])) {
        if ($row['act_range'] == FAR_CATEGORY) {
            $row['act_range'] = $_LANG['far_category'];
            $row['program'] = 'category.php?id=';
            $sql = 'SELECT cat_id AS id, cat_name AS name FROM '.$ecs->table('category').
                ' WHERE cat_id '.db_create_in($row['act_range_ext']);
        } elseif ($row['act_range'] == FAR_BRAND) {
            $row['act_range'] = $_LANG['far_brand'];
            $row['program'] = 'brand.php?id=';
            $sql = 'SELECT brand_id AS id, brand_name AS name FROM '.$ecs->table('brand').
                ' WHERE brand_id '.db_create_in($row['act_range_ext']);
        } else {
            $row['act_range'] = $_LANG['far_goods'];
            $row['program'] = 'goods.php?id=';
            $sql = 'SELECT goods_id AS id, goods_name AS name FROM '.$ecs->table('goods').
                ' WHERE goods_id '.db_create_in($row['act_range_ext']);
        }
        $act_range_ext = $db->getAll($sql);
        $row['act_range_ext'] = $act_range_ext;
    } else {
        $row['act_range'] = $_LANG['far_all'];
    }

    // 优惠方式

    switch ($row['act_type']) {
        case 0:
            $row['act_type'] = $_LANG['fat_goods'];
            $row['gift'] = unserialize($row['gift']);
            if (is_array($row['gift'])) {
                foreach ($row['gift'] as $k => $v) {
                    $row['gift'][$k]['thumb'] = get_image_path($db->getOne('SELECT goods_thumb FROM '.$ecs->table('goods')." WHERE goods_id = '".$v['id']."'"));
                }
            }
            break;
        case 1:
            $row['act_type'] = $_LANG['fat_price'];
            $row['act_type_ext'] .= $_LANG['unit_yuan'];
            $row['gift'] = [];
            break;
        case 2:
            $row['act_type'] = $_LANG['fat_discount'];
            $row['act_type_ext'] .= '%';
            $row['gift'] = [];
            break;
    }

    $list[] = $row;
}

$smarty->assign('list', $list);

$smarty->assign('helps', get_shop_help());       // 网店帮助
$smarty->assign('lang', $_LANG);

$smarty->assign('feed_url', ($_CFG['rewrite'] == 1) ? 'feed-typeactivity.xml' : 'feed.php?type=activity'); // RSS URL
$smarty->display('activity.dwt');
