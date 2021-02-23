<?php

namespace App\Service\Cart;

/**
 * 购物车
 * Class CartService
 * @package App\Service\Cart
 */
class CartService
{

    /**
     * 取得购物车商品
     * @param int $type 类型：默认普通商品
     * @return  array   购物车商品数组
     */
    public function cart_goods($type = CART_GENERAL_GOODS)
    {
        $sql = "SELECT c.rec_id, c.user_id, c.goods_id, c.goods_name, c.goods_sn, c.goods_number, " .
            "c.market_price, c.goods_price, c.goods_attr, c.is_real, c.extension_code, c.parent_id, c.is_gift, c.is_shipping, " .
            "c.goods_price * c.goods_number AS subtotal, g.goods_thumb " .
            "FROM " . table('cart') . 'AS c ' .
            'LEFT JOIN ' . table('goods') . ' AS g ON g.goods_id = c.goods_id ' .
            " WHERE session_id = '" . SESS_ID . "' " .
            "AND rec_type = '$type'";

        $arr = $GLOBALS['db']->getAll($sql);

        /* 格式化价格及礼包商品 */
        foreach ($arr as $key => $value) {
            $arr[$key]['formated_market_price'] = price_format($value['market_price'], false);
            $arr[$key]['formated_goods_price'] = price_format($value['goods_price'], false);
            $arr[$key]['formated_subtotal'] = price_format($value['subtotal'], false);

            if ($value['extension_code'] == 'package_buy') {
                $arr[$key]['package_goods_list'] = get_package_goods($value['goods_id']);
            }
        }

        return $arr;
    }

    /**
     * 取得购物车总金额
     * @params  boolean $include_gift   是否包括赠品
     * @param int $type 类型：默认普通商品
     * @return  float   购物车总金额
     */
    public function cart_amount($include_gift = true, $type = CART_GENERAL_GOODS)
    {
        $sql = "SELECT SUM(goods_price * goods_number) " .
            " FROM " . table('cart') .
            " WHERE session_id = '" . SESS_ID . "' " .
            "AND rec_type = '$type' ";

        if (!$include_gift) {
            $sql .= ' AND is_gift = 0 AND goods_id > 0';
        }

        return floatval($GLOBALS['db']->getOne($sql));
    }

    /**
     * 检查某商品是否已经存在于购物车
     *
     * @access  public
     * @param integer $id
     * @param array $spec
     * @param int $type 类型：默认普通商品
     * @return  boolean
     */
    public function cart_goods_exists($id, $spec, $type = CART_GENERAL_GOODS)
    {
        /* 检查该商品是否已经存在在购物车中 */
        $sql = "SELECT COUNT(*) FROM " . table('cart') .
            "WHERE session_id = '" . SESS_ID . "' AND goods_id = '$id' " .
            "AND parent_id = 0 AND goods_attr = '" . get_goods_attr_info($spec) . "' " .
            "AND rec_type = '$type'";

        return ($GLOBALS['db']->getOne($sql) > 0);
    }

    /**
     * 获得购物车中商品的总重量、总价格、总数量
     *
     * @access  public
     * @param int $type 类型：默认普通商品
     * @return  array
     */
    public function cart_weight_price($type = CART_GENERAL_GOODS)
    {
        $package_row['weight'] = 0;
        $package_row['amount'] = 0;
        $package_row['number'] = 0;

        $packages_row['free_shipping'] = 1;

        /* 计算超值礼包内商品的相关配送参数 */
        $sql = 'SELECT goods_id, goods_number, goods_price FROM ' . table('cart') . " WHERE extension_code = 'package_buy' AND session_id = '" . SESS_ID . "'";
        $row = $GLOBALS['db']->getAll($sql);

        if ($row) {
            $packages_row['free_shipping'] = 0;
            $free_shipping_count = 0;

            foreach ($row as $val) {
                // 如果商品全为免运费商品，设置一个标识变量
                $sql = 'SELECT count(*) FROM ' .
                    table('package_goods') . ' AS pg, ' .
                    table('goods') . ' AS g ' .
                    "WHERE g.goods_id = pg.goods_id AND g.is_shipping = 0 AND pg.package_id = '" . $val['goods_id'] . "'";
                $shipping_count = $GLOBALS['db']->getOne($sql);

                if ($shipping_count > 0) {
                    // 循环计算每个超值礼包商品的重量和数量，注意一个礼包中可能包换若干个同一商品
                    $sql = 'SELECT SUM(g.goods_weight * pg.goods_number) AS weight, ' .
                        'SUM(pg.goods_number) AS number FROM ' .
                        table('package_goods') . ' AS pg, ' .
                        table('goods') . ' AS g ' .
                        "WHERE g.goods_id = pg.goods_id AND g.is_shipping = 0 AND pg.package_id = '" . $val['goods_id'] . "'";

                    $goods_row = $GLOBALS['db']->getRow($sql);
                    $package_row['weight'] += floatval($goods_row['weight']) * $val['goods_number'];
                    $package_row['amount'] += floatval($val['goods_price']) * $val['goods_number'];
                    $package_row['number'] += intval($goods_row['number']) * $val['goods_number'];
                } else {
                    $free_shipping_count++;
                }
            }

            $packages_row['free_shipping'] = $free_shipping_count == count($row) ? 1 : 0;
        }

        /* 获得购物车中非超值礼包商品的总重量 */
        $sql = 'SELECT SUM(g.goods_weight * c.goods_number) AS weight, ' .
            'SUM(c.goods_price * c.goods_number) AS amount, ' .
            'SUM(c.goods_number) AS number ' .
            'FROM ' . table('cart') . ' AS c ' .
            'LEFT JOIN ' . table('goods') . ' AS g ON g.goods_id = c.goods_id ' .
            "WHERE c.session_id = '" . SESS_ID . "' " .
            "AND rec_type = '$type' AND g.is_shipping = 0 AND c.extension_code != 'package_buy'";
        $row = $GLOBALS['db']->getRow($sql);

        $packages_row['weight'] = floatval($row['weight']) + $package_row['weight'];
        $packages_row['amount'] = floatval($row['amount']) + $package_row['amount'];
        $packages_row['number'] = intval($row['number']) + $package_row['number'];
        /* 格式化重量 */
        $packages_row['formated_weight'] = formated_weight($packages_row['weight']);

        return $packages_row;
    }

    /**
     * 添加商品到购物车
     *
     * @access  public
     * @param integer $goods_id 商品编号
     * @param integer $num 商品数量
     * @param array $spec 规格值对应的id数组
     * @param integer $parent 基本件
     * @return  boolean
     */
    public function addto_cart($goods_id, $num = 1, $spec = array(), $parent = 0, $rec_type = CART_GENERAL_GOODS)
    {
        $GLOBALS['err']->clean();
        $_parent_id = $parent;

        /* 取得商品信息 */
        $sql = "SELECT g.goods_name, g.goods_sn, g.is_on_sale, g.is_real, " .
            "g.market_price, g.shop_price AS org_price, g.promote_price, g.promote_start_date, " .
            "g.promote_end_date, g.goods_weight, g.integral, g.extension_code, " .
            "g.goods_number, g.is_alone_sale, g.is_shipping," .
            "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price " .
            " FROM " . table('goods') . " AS g " .
            " LEFT JOIN " . table('member_price') . " AS mp " .
            "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' " .
            " WHERE g.goods_id = '$goods_id'" .
            " AND g.is_delete = 0";
        $goods = $GLOBALS['db']->getRow($sql);

        if (empty($goods)) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['goods_not_exists'], ERR_NOT_EXISTS);

            return false;
        }

        /* 如果是作为配件添加到购物车的，需要先检查购物车里面是否已经有基本件 */
        if ($parent > 0) {
            $sql = "SELECT COUNT(*) FROM " . table('cart') .
                " WHERE goods_id='$parent' AND session_id='" . SESS_ID . "' AND extension_code <> 'package_buy'";
            if ($GLOBALS['db']->getOne($sql) == 0) {
                $GLOBALS['err']->add($GLOBALS['_LANG']['no_basic_goods'], ERR_NO_BASIC_GOODS);

                return false;
            }
        }

        /* 是否正在销售 */
        if ($goods['is_on_sale'] == 0) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['not_on_sale'], ERR_NOT_ON_SALE);

            return false;
        }

        /* 不是配件时检查是否允许单独销售 */
        if (empty($parent) && $goods['is_alone_sale'] == 0) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['cannt_alone_sale'], ERR_CANNT_ALONE_SALE);

            return false;
        }

        /* 如果商品有规格则取规格商品信息 配件除外 */
        $sql = "SELECT * FROM " . table('products') . " WHERE goods_id = '$goods_id' LIMIT 0, 1";
        $prod = $GLOBALS['db']->getRow($sql);

        if (is_spec($spec) && !empty($prod)) {
            $product_info = get_products_info($goods_id, $spec);
        }
        if (empty($product_info)) {
            $product_info = array('product_number' => '', 'product_id' => 0);
        }

        /* 检查：库存 */
        if (config('shop.use_storage') == 1) {
            //检查：商品购买数量是否大于总库存
            if ($num > $goods['goods_number']) {
                $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['shortage'], $goods['goods_number']), ERR_OUT_OF_STOCK);

                return false;
            }

            //商品存在规格 是货品 检查该货品库存
            if (is_spec($spec) && !empty($prod)) {
                if (!empty($spec)) {
                    /* 取规格的货品库存 */
                    if ($num > $product_info['product_number']) {
                        $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['shortage'], $product_info['product_number']), ERR_OUT_OF_STOCK);

                        return false;
                    }
                }
            }
        }

        /* 计算商品的促销价格 */
        $spec_price = spec_price($spec);
        $goods_price = get_final_price($goods_id, $num, true, $spec);
        $goods['market_price'] += $spec_price;
        $goods_attr = get_goods_attr_info($spec);
        $goods_attr_id = join(',', $spec);

        /* 初始化要插入购物车的基本件数据 */
        $parent = array(
            'user_id' => $_SESSION['user_id'],
            'session_id' => SESS_ID,
            'goods_id' => $goods_id,
            'goods_sn' => addslashes($goods['goods_sn']),
            'product_id' => $product_info['product_id'],
            'goods_name' => addslashes($goods['goods_name']),
            'market_price' => $goods['market_price'],
            'goods_attr' => addslashes($goods_attr),
            'goods_attr_id' => $goods_attr_id,
            'is_real' => $goods['is_real'],
            'extension_code' => $goods['extension_code'],
            'is_gift' => 0,
            'is_shipping' => $goods['is_shipping'],
            'rec_type' => $rec_type
        );

        /* 如果该配件在添加为基本件的配件时，所设置的“配件价格”比原价低，即此配件在价格上提供了优惠， */
        /* 则按照该配件的优惠价格卖，但是每一个基本件只能购买一个优惠价格的“该配件”，多买的“该配件”不享 */
        /* 受此优惠 */
        $basic_list = array();
        $sql = "SELECT parent_id, goods_price " .
            "FROM " . table('group_goods') .
            " WHERE goods_id = '$goods_id'" .
            " AND goods_price < '$goods_price'" .
            " AND parent_id = '$_parent_id'" .
            " ORDER BY goods_price";
        $res = $GLOBALS['db']->query($sql);
        while ($row = $GLOBALS['db']->fetchRow($res)) {
            $basic_list[$row['parent_id']] = $row['goods_price'];
        }

        /* 取得购物车中该商品每个基本件的数量 */
        $basic_count_list = array();
        if ($basic_list) {
            $sql = "SELECT goods_id, SUM(goods_number) AS count " .
                "FROM " . table('cart') .
                " WHERE session_id = '" . SESS_ID . "'" .
                " AND parent_id = 0" .
                " AND extension_code <> 'package_buy' " .
                " AND goods_id " . db_create_in(array_keys($basic_list)) .
                " GROUP BY goods_id";
            $res = $GLOBALS['db']->query($sql);
            while ($row = $GLOBALS['db']->fetchRow($res)) {
                $basic_count_list[$row['goods_id']] = $row['count'];
            }
        }

        /* 取得购物车中该商品每个基本件已有该商品配件数量，计算出每个基本件还能有几个该商品配件 */
        /* 一个基本件对应一个该商品配件 */
        if ($basic_count_list) {
            $sql = "SELECT parent_id, SUM(goods_number) AS count " .
                "FROM " . table('cart') .
                " WHERE session_id = '" . SESS_ID . "'" .
                " AND goods_id = '$goods_id'" .
                " AND extension_code <> 'package_buy' " .
                " AND parent_id " . db_create_in(array_keys($basic_count_list)) .
                " GROUP BY parent_id";
            $res = $GLOBALS['db']->query($sql);
            while ($row = $GLOBALS['db']->fetchRow($res)) {
                $basic_count_list[$row['parent_id']] -= $row['count'];
            }
        }

        /* 循环插入配件 如果是配件则用其添加数量依次为购物车中所有属于其的基本件添加足够数量的该配件 */
        foreach ($basic_list as $parent_id => $fitting_price) {
            /* 如果已全部插入，退出 */
            if ($num <= 0) {
                break;
            }

            /* 如果该基本件不再购物车中，执行下一个 */
            if (!isset($basic_count_list[$parent_id])) {
                continue;
            }

            /* 如果该基本件的配件数量已满，执行下一个基本件 */
            if ($basic_count_list[$parent_id] <= 0) {
                continue;
            }

            /* 作为该基本件的配件插入 */
            $parent['goods_price'] = max($fitting_price, 0) + $spec_price; //允许该配件优惠价格为0
            $parent['goods_number'] = min($num, $basic_count_list[$parent_id]);
            $parent['parent_id'] = $parent_id;

            /* 添加 */
            $GLOBALS['db']->autoExecute(table('cart'), $parent, 'INSERT');

            /* 改变数量 */
            $num -= $parent['goods_number'];
        }

        /* 如果数量不为0，作为基本件插入 */
        if ($num > 0) {
            /* 检查该商品是否已经存在在购物车中 */
            $sql = "SELECT goods_number FROM " . table('cart') .
                " WHERE session_id = '" . SESS_ID . "' AND goods_id = '$goods_id' " .
                " AND parent_id = 0 AND goods_attr = '" . get_goods_attr_info($spec) . "' " .
                " AND extension_code <> 'package_buy' " .
                " AND rec_type = 'CART_GENERAL_GOODS'";

            $row = $GLOBALS['db']->getRow($sql);

            if ($row) { //如果购物车已经有此物品，则更新
                $num += $row['goods_number'];
                if (is_spec($spec) && !empty($prod)) {
                    $goods_storage = $product_info['product_number'];
                } else {
                    $goods_storage = $goods['goods_number'];
                }
                if (config('shop.use_storage') == 0 || $num <= $goods_storage) {
                    $goods_price = get_final_price($goods_id, $num, true, $spec);
                    $sql = "UPDATE " . table('cart') . " SET goods_number = '$num'" .
                        " , goods_price = '$goods_price'" .
                        " WHERE session_id = '" . SESS_ID . "' AND goods_id = '$goods_id' " .
                        " AND parent_id = 0 AND goods_attr = '" . get_goods_attr_info($spec) . "' " .
                        " AND extension_code <> 'package_buy' " .
                        "AND rec_type = 'CART_GENERAL_GOODS'";
                    $GLOBALS['db']->query($sql);
                } else {
                    $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['shortage'], $num), ERR_OUT_OF_STOCK);

                    return false;
                }
            } else { //购物车没有此物品，则插入
                $goods_price = get_final_price($goods_id, $num, true, $spec);
                $parent['goods_price'] = max($goods_price, 0);
                $parent['goods_number'] = $num;
                $parent['parent_id'] = 0;
                $GLOBALS['db']->autoExecute(table('cart'), $parent, 'INSERT');
            }
        }

        /* 把赠品删除 */
        $sql = "DELETE FROM " . table('cart') . " WHERE session_id = '" . SESS_ID . "' AND is_gift <> 0";
        $GLOBALS['db']->query($sql);

        return true;
    }

    /**
     * 清空购物车
     * @param int $type 类型：默认普通商品
     */
    public function clear_cart($type = CART_GENERAL_GOODS)
    {
        $sql = "DELETE FROM " . table('cart') .
            " WHERE session_id = '" . SESS_ID . "' AND rec_type = '$type'";
        $GLOBALS['db']->query($sql);
    }

    /**
     * 获得购物车中的商品
     *
     * @access  public
     * @return  array
     */
    public function get_cart_goods($rec_type = CART_GENERAL_GOODS)
    {
        /* 初始化 */
        $goods_list = array();
        $total = array(
            'goods_price' => 0, // 本店售价合计（有格式）
            'market_price' => 0, // 市场售价合计（有格式）
            'saving' => 0, // 节省金额（有格式）
            'save_rate' => 0, // 节省百分比
            'goods_amount' => 0, // 本店售价合计（无格式）
        );

        /* 循环、统计 */
        if ($_SESSION['user_id'] > 0) {
            $where = " user_id = '" . $_SESSION['user_id'] . "'";
        } else {
            $where = " session_id = '" . SESS_ID . "'";
        }
        $sql = "SELECT *, IF(parent_id, parent_id, goods_id) AS pid " .
            " FROM " . table('cart') . " " .
            " WHERE " . $where . " AND rec_type = '" . $rec_type . "'" .
            " ORDER BY pid, parent_id";
        $res = $GLOBALS['db']->query($sql);

        /* 用于统计购物车中实体商品和虚拟商品的个数 */
        $virtual_goods_count = 0;
        $real_goods_count = 0;

        while ($row = $GLOBALS['db']->fetchRow($res)) {
            $total['goods_price'] += $row['goods_price'] * $row['goods_number'];
            $total['market_price'] += $row['market_price'] * $row['goods_number'];

            $row['subtotal'] = price_format($row['goods_price'] * $row['goods_number'], false);
            $row['goods_price'] = price_format($row['goods_price'], false);
            $row['market_price'] = price_format($row['market_price'], false);

            /* 统计实体商品和虚拟商品的个数 */
            if ($row['is_real']) {
                $real_goods_count++;
            } else {
                $virtual_goods_count++;
            }

            /* 查询规格 */
            if (trim($row['goods_attr']) != '') {
                $row['goods_attr'] = addslashes($row['goods_attr']);
                $sql = "SELECT attr_value FROM " . table('goods_attr') . " WHERE goods_attr_id " .
                    db_create_in($row['goods_attr']);
                $attr_list = $GLOBALS['db']->getCol($sql);
                foreach ($attr_list as $attr) {
                    $row['goods_name'] .= ' [' . $attr . '] ';
                }
            }
            /* 增加是否在购物车里显示商品图 */
            if ((config('shop.show_goods_in_cart') == "2" || config('shop.show_goods_in_cart') == "3") && $row['extension_code'] != 'package_buy') {
                $goods_thumb = $GLOBALS['db']->getOne("SELECT `goods_thumb` FROM " . table('goods') . " WHERE `goods_id`='{$row['goods_id']}'");
                $row['goods_thumb'] = get_image_path($goods_thumb);
            }
            if ($row['extension_code'] == 'package_buy') {
                $row['package_goods_list'] = get_package_goods($row['goods_id']);
            }
            $goods_list[] = $row;
        }
        $total['goods_amount'] = $total['goods_price'];
        $total['saving'] = price_format($total['market_price'] - $total['goods_price'], false);
        if ($total['market_price'] > 0) {
            $total['save_rate'] = $total['market_price'] ? round(($total['market_price'] - $total['goods_price']) *
                    100 / $total['market_price']) . '%' : 0;
        }
        $total['goods_price'] = price_format($total['goods_price'], false);
        $total['market_price'] = price_format($total['market_price'], false);
        $total['real_goods_count'] = $real_goods_count;
        $total['virtual_goods_count'] = $virtual_goods_count;

        return array('goods_list' => $goods_list, 'total' => $total);
    }

}
