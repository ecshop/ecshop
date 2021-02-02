<?php

namespace app\controller;

/**
 * 专题前台
 */
class TopicController extends InitController
{
    public function indexAction()
    {
        $topic_id = empty($_REQUEST['topic_id']) ? 0 : intval($_REQUEST['topic_id']);

        $sql = "SELECT template FROM " . table('topic') .
            "WHERE topic_id = '$topic_id' and  " . gmtime() . " >= start_time and " . gmtime() . "<= end_time";

        $topic = $db->getRow($sql);

        if (empty($topic)) {
            /* 如果没有找到任何记录则跳回到首页 */
            return redirect("./");
        }

        $templates = empty($topic['template']) ? 'topic.dwt' : $topic['template'];

        $sql = "SELECT * FROM " . table('topic') . " WHERE topic_id = '$topic_id'";

        $topic = $db->getRow($sql);
        $topic['data'] = addcslashes($topic['data'], "'");
        $tmp = @unserialize($topic["data"]);
        $arr = (array)$tmp;

        $goods_id = array();

        foreach ($arr as $key => $value) {
            foreach ($value as $k => $val) {
                $opt = explode('|', $val);
                $arr[$key][$k] = $opt[1];
                $goods_id[] = $opt[1];
            }
        }

        $sql = 'SELECT g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.is_new, g.is_best, g.is_hot, g.shop_price AS org_price, ' .
            "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, g.promote_price, " .
            'g.promote_start_date, g.promote_end_date, g.goods_brief, g.goods_thumb , g.goods_img ' .
            'FROM ' . table('goods') . ' AS g ' .
            'LEFT JOIN ' . table('member_price') . ' AS mp ' .
            "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' " .
            "WHERE " . db_create_in($goods_id, 'g.goods_id');

        $res = $GLOBALS['db']->query($sql);

        $sort_goods_arr = array();

        while ($row = $GLOBALS['db']->fetchRow($res)) {
            if ($row['promote_price'] > 0) {
                $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                $row['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
            } else {
                $row['promote_price'] = '';
            }

            if ($row['shop_price'] > 0) {
                $row['shop_price'] = price_format($row['shop_price']);
            } else {
                $row['shop_price'] = '';
            }

            $row['url'] = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
            $row['goods_style_name'] = add_style($row['goods_name'], $row['goods_name_style']);
            $row['short_name'] = config('shop.goods_name_length') > 0 ?
                sub_str($row['goods_name'], config('shop.goods_name_length')) : $row['goods_name'];
            $row['goods_thumb'] = get_image_path($row['goods_thumb']);
            $row['short_style_name'] = add_style($row['short_name'], $row['goods_name_style']);

            foreach ($arr as $key => $value) {
                foreach ($value as $val) {
                    if ($val == $row['goods_id']) {
                        $key = $key == 'default' ? $_LANG['all_goods'] : $key;
                        $sort_goods_arr[$key][] = $row;
                    }
                }
            }
        }

        /* 模板赋值 */
        $this->assign_template();
        $position = $this->assign_ur_here();
        $this->assign('page_title', $position['title']);       // 页面标题
        $this->assign('ur_here', $position['ur_here'] . '> ' . $topic['title']);     // 当前位置
        $this->assign('show_marketprice', config('shop.show_marketprice'));
        $this->assign('sort_goods_arr', $sort_goods_arr);          // 商品列表
        $this->assign('topic', $topic);                   // 专题信息
        $this->assign('keywords', $topic['keywords']);       // 专题信息
        $this->assign('description', $topic['description']);    // 专题信息
        $this->assign('title_pic', $topic['title_pic']);      // 分类标题图片地址
        $this->assign('base_style', '#' . $topic['base_style']);     // 基本风格样式颜色

        /* 显示模板 */
        return $this->display($templates);
    }
}
