<?php

namespace App\Http\Controllers;

/**
 * 品牌列表
 */
class BrandController extends InitController
{
    public function indexAction()
    {
        /* 获得请求的分类 ID */
        if (!empty($_REQUEST['id'])) {
            $brand_id = intval($_REQUEST['id']);
        }
        if (!empty($_REQUEST['brand'])) {
            $brand_id = intval($_REQUEST['brand']);
        }
        if (empty($brand_id)) {
            $this->assign_template();
            $position = $this->assign_ur_here('', $_LANG['all_brand']);
            $this->assign('page_title', $position['title']);    // 页面标题
            $this->assign('ur_here', $position['ur_here']);  // 当前位置

            $this->assign('categories', get_categories_tree()); // 分类树
            $this->assign('helps', get_shop_help());       // 网店帮助
            $this->assign('top_goods', get_top10());           // 销售排行

            $this->assign('brand_list', get_brands());

            return $this->display('brand_list.dwt');
        }

        /* 初始化分页信息 */
        $page = !empty($_REQUEST['page']) && intval($_REQUEST['page']) > 0 ? intval($_REQUEST['page']) : 1;
        $size = intval(config('shop.page_size')) > 0 ? intval(config('shop.page_size')) : 10;
        $cate = !empty($_REQUEST['cat']) && intval($_REQUEST['cat']) > 0 ? intval($_REQUEST['cat']) : 0;

        /* 排序、显示方式以及类型 */
        $default_display_type = config('shop.show_order_type') == '0' ? 'list' : (config('shop.show_order_type') == '1' ? 'grid' : 'text');
        $default_sort_order_method = config('shop.sort_order_method') == '0' ? 'DESC' : 'ASC';
        $default_sort_order_type = config('shop.sort_order_type') == '0' ? 'goods_id' : (config('shop.sort_order_type') == '1' ? 'shop_price' : 'last_update');

        $sort = (isset($_REQUEST['sort']) && in_array(trim(strtolower($_REQUEST['sort'])), array('goods_id', 'shop_price', 'last_update'))) ? trim($_REQUEST['sort']) : $default_sort_order_type;
        $order = (isset($_REQUEST['order']) && in_array(trim(strtoupper($_REQUEST['order'])), array('ASC', 'DESC'))) ? trim($_REQUEST['order']) : $default_sort_order_method;
        $display = (isset($_REQUEST['display']) && in_array(trim(strtolower($_REQUEST['display'])), array('list', 'grid', 'text'))) ? trim($_REQUEST['display']) : (isset($_COOKIE['ECS']['display']) ? $_COOKIE['ECS']['display'] : $default_display_type);
        $display = in_array($display, array('list', 'grid', 'text')) ? $display : 'text';
        setcookie('ECS[display]', $display, gmtime() + 86400 * 7, null, null, null, true);

        $brand_info = get_brand_info($brand_id);

        if (empty($brand_info)) {
            return redirect("./");
        }

        $this->assign('data_dir', DATA_DIR);
        $this->assign('keywords', htmlspecialchars($brand_info['brand_desc']));
        $this->assign('description', htmlspecialchars($brand_info['brand_desc']));

        /* 赋值固定内容 */
        $this->assign_template();
        $position = $this->assign_ur_here($cate, $brand_info['brand_name']);
        $this->assign('page_title', $position['title']);   // 页面标题
        $this->assign('ur_here', $position['ur_here']); // 当前位置
        $this->assign('brand_id', $brand_id);
        $this->assign('category', $cate);

        $this->assign('categories', get_categories_tree());        // 分类树
        $this->assign('helps', get_shop_help());              // 网店帮助
        $this->assign('top_goods', get_top10());                  // 销售排行
        $this->assign('show_marketprice', config('shop.show_marketprice'));
        $this->assign('brand_cat_list', brand_related_cat($brand_id)); // 相关分类
        $this->assign('feed_url', (config('shop.rewrite') == 1) ? "feed-b$brand_id.xml" : 'feed.php?brand=' . $brand_id);

        /* 调查 */
        $vote = get_vote();
        if (!empty($vote)) {
            $this->assign('vote_id', $vote['id']);
            $this->assign('vote', $vote['content']);
        }

        $this->assign('best_goods', brand_recommend_goods('best', $brand_id, $cate));
        $this->assign('promotion_goods', brand_recommend_goods('promote', $brand_id, $cate));
        $this->assign('brand', $brand_info);
        $this->assign('promotion_info', get_promotion_info());

        $count = goods_count_by_brand($brand_id, $cate);

        $goodslist = brand_get_goods($brand_id, $cate, $size, $page, $sort, $order);

        if ($display == 'grid') {
            if (count($goodslist) % 2 != 0) {
                $goodslist[] = array();
            }
        }
        $this->assign('goods_list', $goodslist);
        $this->assign('script_name', 'brand');

        assign_pager('brand', $cate, $count, $size, $sort, $order, $page, '', $brand_id, 0, 0, $display); // 分页
        $this->assign_dynamic('brand'); // 动态内容

        return $this->display('brand.dwt');
    }


    /**
     * 获得指定品牌的详细信息
     *
     * @access  private
     * @param integer $id
     * @return  void
     */
    public function get_brand_info($id)
    {
        $sql = 'SELECT * FROM ' . table('brand') . " WHERE brand_id = '$id'";

        return $GLOBALS['db']->getRow($sql);
    }

    /**
     * 获得指定品牌下的推荐和促销商品
     *
     * @access  private
     * @param string $type
     * @param integer $brand
     * @return  array
     */
    public function brand_recommend_goods($type, $brand, $cat = 0)
    {
        static $result = null;

        $time = gmtime();

        if ($result === null) {
            if ($cat > 0) {
                $cat_where = "AND " . get_children($cat);
            } else {
                $cat_where = '';
            }

            $sql = 'SELECT g.goods_id, g.goods_name, g.market_price, g.shop_price AS org_price, g.promote_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, " .
                'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, ' .
                'b.brand_name, g.is_best, g.is_new, g.is_hot, g.is_promote ' .
                'FROM ' . table('goods') . ' AS g ' .
                'LEFT JOIN ' . table('brand') . ' AS b ON b.brand_id = g.brand_id ' .
                'LEFT JOIN ' . table('member_price') . ' AS mp ' .
                "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' " .
                "WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.brand_id = '$brand' AND " .
                "(g.is_best = 1 OR (g.is_promote = 1 AND promote_start_date <= '$time' AND " .
                "promote_end_date >= '$time')) $cat_where" .
                'ORDER BY g.sort_order, g.last_update DESC';
            $result = $GLOBALS['db']->getAll($sql);
        }

        /* 取得每一项的数量限制 */
        $num = 0;
        $type2lib = array('best' => 'recommend_best', 'new' => 'recommend_new', 'hot' => 'recommend_hot', 'promote' => 'recommend_promotion');
        $num = get_library_number($type2lib[$type]);

        $idx = 0;
        $goods = array();
        foreach ($result as $row) {
            if ($idx >= $num) {
                break;
            }

            if (($type == 'best' && $row['is_best'] == 1) ||
                ($type == 'promote' && $row['is_promote'] == 1 &&
                    $row['promote_start_date'] <= $time && $row['promote_end_date'] >= $time)) {
                if ($row['promote_price'] > 0) {
                    $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                    $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
                } else {
                    $goods[$idx]['promote_price'] = '';
                }

                $goods[$idx]['id'] = $row['goods_id'];
                $goods[$idx]['name'] = $row['goods_name'];
                $goods[$idx]['brief'] = $row['goods_brief'];
                $goods[$idx]['brand_name'] = $row['brand_name'];
                $goods[$idx]['short_style_name'] = config('shop.goods_name_length') > 0 ?
                    sub_str($row['goods_name'], config('shop.goods_name_length')) : $row['goods_name'];
                $goods[$idx]['market_price'] = price_format($row['market_price']);
                $goods[$idx]['shop_price'] = price_format($row['shop_price']);
                $goods[$idx]['thumb'] = get_image_path($row['goods_thumb']);
                $goods[$idx]['goods_img'] = get_image_path($row['goods_img']);
                $goods[$idx]['url'] = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);

                $idx++;
            }
        }

        return $goods;
    }

    /**
     * 获得指定的品牌下的商品总数
     *
     * @access  private
     * @param integer $brand_id
     * @param integer $cate
     * @return  integer
     */
    public function goods_count_by_brand($brand_id, $cate = 0)
    {
        $sql = 'SELECT COUNT(*) FROM ' . table('goods') . ' AS g ' .
            "WHERE brand_id = '$brand_id' AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0";

        if ($cate > 0) {
            $sql .= " AND " . get_children($cate);
        }

        return $GLOBALS['db']->getOne($sql);
    }

    /**
     * 获得品牌下的商品
     *
     * @access  private
     * @param integer $brand_id
     * @return  array
     */
    public function brand_get_goods($brand_id, $cate, $size, $page, $sort, $order)
    {
        $cate_where = ($cate > 0) ? 'AND ' . get_children($cate) : '';

        /* 获得商品列表 */
        $sql = 'SELECT g.goods_id, g.goods_name, g.market_price, g.shop_price AS org_price, ' .
            "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, g.promote_price, " .
            'g.promote_start_date, g.promote_end_date, g.goods_brief, g.goods_thumb , g.goods_img ' .
            'FROM ' . table('goods') . ' AS g ' .
            'LEFT JOIN ' . table('member_price') . ' AS mp ' .
            "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' " .
            "WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.brand_id = '$brand_id' $cate_where" .
            "ORDER BY $sort $order";

        $res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);

        $arr = array();
        while ($row = $GLOBALS['db']->fetchRow($res)) {
            if ($row['promote_price'] > 0) {
                $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
            } else {
                $promote_price = 0;
            }

            $arr[$row['goods_id']]['goods_id'] = $row['goods_id'];
            if ($GLOBALS['display'] == 'grid') {
                $arr[$row['goods_id']]['goods_name'] = config('shop.goods_name_length') > 0 ? sub_str($row['goods_name'], config('shop.goods_name_length')) : $row['goods_name'];
            } else {
                $arr[$row['goods_id']]['goods_name'] = $row['goods_name'];
            }
            $arr[$row['goods_id']]['market_price'] = price_format($row['market_price']);
            $arr[$row['goods_id']]['shop_price'] = price_format($row['shop_price']);
            $arr[$row['goods_id']]['promote_price'] = ($promote_price > 0) ? price_format($promote_price) : '';
            $arr[$row['goods_id']]['goods_brief'] = $row['goods_brief'];
            $arr[$row['goods_id']]['goods_thumb'] = get_image_path($row['goods_thumb']);
            $arr[$row['goods_id']]['goods_img'] = get_image_path($row['goods_img']);
            $arr[$row['goods_id']]['url'] = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
        }

        return $arr;
    }

    /**
     * 获得与指定品牌相关的分类
     *
     * @access  public
     * @param integer $brand
     * @return  array
     */
    public function brand_related_cat($brand)
    {
        $arr[] = array('cat_id' => 0,
            'cat_name' => $GLOBALS['_LANG']['all_category'],
            'url' => build_uri('brand', array('bid' => $brand), $GLOBALS['_LANG']['all_category']));

        $sql = "SELECT c.cat_id, c.cat_name, COUNT(g.goods_id) AS goods_count FROM " .
            table('category') . " AS c, " .
            table('goods') . " AS g " .
            "WHERE g.brand_id = '$brand' AND c.cat_id = g.cat_id " .
            "GROUP BY g.cat_id";
        $res = $GLOBALS['db']->query($sql);

        while ($row = $GLOBALS['db']->fetchRow($res)) {
            $row['url'] = build_uri('brand', array('cid' => $row['cat_id'], 'bid' => $brand), $row['cat_name']);
            $arr[] = $row;
        }

        return $arr;
    }
}
