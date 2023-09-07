<?php

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
assign_template();
$position = assign_ur_here(0, $_LANG['tag_cloud']);
$smarty->assign('page_title', $position['title']);    // 页面标题
$smarty->assign('ur_here', $position['ur_here']);  // 当前位置
$smarty->assign('categories', get_categories_tree()); // 分类树
$smarty->assign('helps', get_shop_help());       // 网店帮助
$smarty->assign('top_goods', get_top10());           // 销售排行
$smarty->assign('promotion_info', get_promotion_info());

/* 调查 */
$vote = get_vote();
if (!empty($vote)) {
    $smarty->assign('vote_id', $vote['id']);
    $smarty->assign('vote', $vote['content']);
}

assign_dynamic('tag_cloud');

$tags = get_tags();

if (!empty($tags)) {
    include_once(ROOT_PATH . 'includes/lib_clips.php');
    color_tag($tags);
}

$smarty->assign('tags', $tags);

$smarty->display('tag_cloud.dwt');
