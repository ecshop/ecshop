<?php

namespace App\Http\Controllers;

/**
 * 报价单
 */
class QuotationController extends InitController
{
    public function indexAction()
    {
        $action = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';
        if ($action == 'print_quotation') {
            $smarty->template_dir = DATA_DIR;
            $this->assign('shop_name', config('shop.shop_title'));
            $this->assign('cfg', config('shop'));
            $where = get_quotation_where($_POST);
            $sql = "SELECT g.goods_id, g.goods_name, g.shop_price, g.goods_number, c.cat_name AS goods_category,p.product_id,p.product_number,p.goods_attr" .
                " FROM " . table('goods') . " AS g LEFT JOIN " . table('category') . " AS c ON g.cat_id = c.cat_id LEFT JOIN " . table('products') . "as p  On g.goods_id=p.goods_id" . $where . " AND is_on_sale = 1 AND is_alone_sale = 1 ";
            $goods_list = $db->getAll($sql);

            foreach ($goods_list as $key => $val) {
                if (!empty($val['product_id'])) {
                    $goods_list[$key]['goods_number'] = $val['product_number'];
                    $product_info = product_info($val['goods_attr'], $val['goods_id']);
                    $goods_list[$key]['members_price'] = $val['shop_price'];
                    $goods_list[$key]['shop_price'] += $product_info['attr_price'];
                    $goods_list[$key]['product_name'] = $product_info['attr_value'];
                    $goods_list[$key]['attr_price'] = $product_info['attr_price'];
                } else {
                    $goods_list[$key]['members_price'] = $val['shop_price'];
                    $goods_list[$key]['product_name'] = '&nbsp;';
                    $goods_list[$key]['product_price'] = 0;
                }
                $goods_list[$key]['goods_key'] = $key;
            }
            $user_rank = $db->getAll("SELECT * FROM " . table('user_rank') . "WHERE show_price = 1 OR rank_id = '$_SESSION[user_rank]'");
            $rank_point = 0;
            if (!empty($_SESSION['user_id'])) {
                $rank_point = $db->getOne("SELECT rank_points FROM " . table('users') . " WHERE user_id = '$_SESSION[user_id]'");
            }
            $user_rank = calc_user_rank($user_rank, $rank_point);
            $user_men = serve_user($goods_list);
            $this->assign('extend_price', $user_rank['ext_price']);
            $this->assign('extend_rank', $user_men);
            $this->assign('goods_list', $goods_list);

            return $smarty->fetch('quotation_print.html');
        }

        $this->assign_template();

        $position = $this->assign_ur_here(0, $_LANG['quotation']);
        $this->assign('page_title', $position['title']);   // 页面标题
        $this->assign('ur_here', $position['ur_here']); // 当前位置

        $this->assign('cat_list', cat_list());
        $this->assign('brand_list', get_brand_list());

        if (is_null($smarty->get_template_vars('helps'))) {
            $this->assign('helps', get_shop_help()); // 网店帮助
        }

        return $this->display('quotation.dwt');
    }


    public function get_quotation_where($filter)
    {
        $_filter = new StdClass();
        $_filter->cat_id = $filter['cat_id'];
        $_filter->brand_id = $filter['brand_id'];
        $where = get_where_sql($_filter);
        $_filter->keyword = $filter['keyword'];
        $where .= isset($_filter->keyword) && trim($_filter->keyword) != '' ? " AND (g.goods_name LIKE '%" . mysql_like_quote($_filter->keyword) . "%' OR g.goods_sn LIKE '%" . mysql_like_quote($_filter->keyword) . "%' OR g.goods_id LIKE '%" . mysql_like_quote($_filter->keyword) . "%') " : '';
        return $where;
    }

    public function calc_user_rank($rank, $rank_point)
    {
        $_tmprank = array();
        foreach ($rank as $_rank) {
            if ($_rank['show_price']) {
                $_tmprank['ext_price'][] = $_rank['rank_name'];
                $_tmprank['ext_rank'][] = $_rank['discount'];
            } else {
                if (!empty($_SESSION['user_id']) && ($rank_point >= $_rank['min_points'])) {
                    $_tmprank['ext_price'][] = $_rank['rank_name'];
                    $_tmprank['ext_rank'][] = $_rank['discount'];
                }
            }
        }
        return $_tmprank;
    }

    public function serve_user($goods_list)
    {
        foreach ($goods_list as $key => $all_list) {
            $goods_id = $all_list['goods_id'];
            $goods_key = $all_list['goods_key'];
            $price = $all_list['members_price'];
            $sql = "SELECT rank_id, IFNULL(mp.user_price, r.discount * $price / 100) AS price, r.rank_name, r.discount " .
                'FROM ' . table('user_rank') . ' AS r ' .
                'LEFT JOIN ' . table('member_price') . " AS mp " .
                "ON mp.goods_id = '$goods_id' AND mp.user_rank = r.rank_id " .
                "WHERE r.show_price = 1 OR r.rank_id = '$_SESSION[user_rank]'";
            $res = $GLOBALS['db']->getAll($sql);

            foreach ($res as $row) {
                $arr[$row['rank_id']] = array(
                    'rank_name' => htmlspecialchars($row['rank_name']),
                    'price' => price_format($row['price'] + $all_list['attr_price']));
            }
            $arr_list[$goods_key] = $arr;
        }
        return $arr_list;
    }

    public function product_info($goods_attr, $goods_id)
    {
        $goods_attr = str_replace('|', ' OR goods_attr_id=', $goods_attr);
        $sql = "SELECT attr_value,attr_price FROM " . table('goods_attr') . " WHERE goods_id='$goods_id' AND (goods_attr_id = $goods_attr)";
        $result = $GLOBALS['db']->getAll($sql);
        $i = 1;
        $count = count($result);
        foreach ($result as $val) {
            $i == $count ? $f = '' : $f = '<br/>';
            $product_info['attr_value'] .= $val['attr_value'] . $f;
            $product_info['attr_price'] += $val['attr_price'];
            $i++;
        }
        return ($product_info);
    }
}
