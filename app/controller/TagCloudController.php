<?php

namespace app\controller;

/**
 * 标签云
 */
class TagCloudController extends InitController
{
    public function indexAction()
    {
        $this->assign_template();
        $position = $this->assign_ur_here(0, $_LANG['tag_cloud']);
        $this->assign('page_title', $position['title']);    // 页面标题
        $this->assign('ur_here', $position['ur_here']);  // 当前位置
        $this->assign('categories', get_categories_tree()); // 分类树
        $this->assign('helps', get_shop_help());       // 网店帮助
        $this->assign('top_goods', get_top10());           // 销售排行
        $this->assign('promotion_info', get_promotion_info());

        /* 调查 */
        $vote = get_vote();
        if (!empty($vote)) {
            $this->assign('vote_id', $vote['id']);
            $this->assign('vote', $vote['content']);
        }

        $this->assign_dynamic('tag_cloud');

        $tags = get_tags();

        if (!empty($tags)) {
            color_tag($tags);
        }

        $this->assign('tags', $tags);

        return $this->display('tag_cloud.dwt');
    }
}
