<?php

define('IN_ECS', true);

require dirname(__FILE__).'/includes/init.php';

if (! DEBUG_MODE) {
    $smarty->caching = true;
}

if (! $smarty->is_cached('catalog.dwt')) {
    /* 取出所有分类 */
    $cat_list = cat_list(0, 0, false);

    foreach ($cat_list as $key => $val) {
        if ($val['is_show'] == 0) {
            unset($cat_list[$key]);
        }
    }

    assign_template();
    assign_dynamic('catalog');
    $position = assign_ur_here(0, $_LANG['catalog']);
    $smarty->assign('page_title', $position['title']);   // 页面标题
    $smarty->assign('ur_here', $position['ur_here']); // 当前位置

    $smarty->assign('helps', get_shop_help()); // 网店帮助
    $smarty->assign('cat_list', $cat_list);       // 分类列表
    $smarty->assign('brand_list', get_brands());    // 所以品牌赋值
    $smarty->assign('promotion_info', get_promotion_info());
}

$smarty->display('catalog.dwt');

/**
 * 计算指定分类的商品数量
 *
 * @param  int  $cat_id
 * @return void
 */
function calculate_goods_num($cat_list, $cat_id)
{
    $goods_num = 0;

    foreach ($cat_list as $cat) {
        if ($cat['parent_id'] == $cat_id && ! empty($cat['goods_num'])) {
            $goods_num += $cat['goods_num'];
        }
    }

    return $goods_num;
}
