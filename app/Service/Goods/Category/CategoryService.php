<?php

namespace App\Service\Goods\Category;

/**
 * 商品品类
 * Class CategoryService
 * @package App\Service\Goods\Category
 */
class CategoryService
{
    /**
     * 获得指定分类下的子分类的数组
     *
     * @access  public
     * @param int $cat_id 分类的ID
     * @param int $selected 当前选中分类的ID
     * @param boolean $re_type 返回的类型: 值为真时返回下拉列表,否则返回数组
     * @param int $level 限定返回的级数。为0时返回所有级数
     * @param int $is_show_all 如果为true显示所有分类，如果为false隐藏不可见分类。
     * @return  mix
     */
    public function cat_list($cat_id = 0, $selected = 0, $re_type = true, $level = 0, $is_show_all = true)
    {
        static $res = null;

        if ($res === null) {
            $data = read_static_cache('cat_pid_releate');
            if ($data === false) {
                $sql = "SELECT c.cat_id, c.cat_name, c.measure_unit, c.parent_id, c.is_show, c.show_in_nav, c.grade, c.sort_order, COUNT(s.cat_id) AS has_children " .
                    'FROM ' . table('category') . " AS c " .
                    "LEFT JOIN " . table('category') . " AS s ON s.parent_id=c.cat_id " .
                    "GROUP BY c.cat_id " .
                    'ORDER BY c.parent_id, c.sort_order ASC';
                $res = $GLOBALS['db']->getAll($sql);

                $sql = "SELECT cat_id, COUNT(*) AS goods_num " .
                    " FROM " . table('goods') .
                    " WHERE is_delete = 0 AND is_on_sale = 1 " .
                    " GROUP BY cat_id";
                $res2 = $GLOBALS['db']->getAll($sql);

                $sql = "SELECT gc.cat_id, COUNT(*) AS goods_num " .
                    " FROM " . table('goods_cat') . " AS gc , " . table('goods') . " AS g " .
                    " WHERE g.goods_id = gc.goods_id AND g.is_delete = 0 AND g.is_on_sale = 1 " .
                    " GROUP BY gc.cat_id";
                $res3 = $GLOBALS['db']->getAll($sql);

                $newres = array();
                foreach ($res2 as $k => $v) {
                    $newres[$v['cat_id']] = $v['goods_num'];
                    foreach ($res3 as $ks => $vs) {
                        if ($v['cat_id'] == $vs['cat_id']) {
                            $newres[$v['cat_id']] = $v['goods_num'] + $vs['goods_num'];
                        }
                    }
                }

                foreach ($res as $k => $v) {
                    $res[$k]['goods_num'] = !empty($newres[$v['cat_id']]) ? $newres[$v['cat_id']] : 0;
                }
                //如果数组过大，不采用静态缓存方式
                if (count($res) <= 1000) {
                    write_static_cache('cat_pid_releate', $res);
                }
            } else {
                $res = $data;
            }
        }

        if (empty($res) == true) {
            return $re_type ? '' : array();
        }

        $options = cat_options($cat_id, $res); // 获得指定分类下的子分类的数组

        $children_level = 99999; //大于这个分类的将被删除
        if ($is_show_all == false) {
            foreach ($options as $key => $val) {
                if ($val['level'] > $children_level) {
                    unset($options[$key]);
                } else {
                    if ($val['is_show'] == 0) {
                        unset($options[$key]);
                        if ($children_level > $val['level']) {
                            $children_level = $val['level']; //标记一下，这样子分类也能删除
                        }
                    } else {
                        $children_level = 99999; //恢复初始值
                    }
                }
            }
        }

        /* 截取到指定的缩减级别 */
        if ($level > 0) {
            if ($cat_id == 0) {
                $end_level = $level;
            } else {
                $first_item = reset($options); // 获取第一个元素
                $end_level = $first_item['level'] + $level;
            }

            /* 保留level小于end_level的部分 */
            foreach ($options as $key => $val) {
                if ($val['level'] >= $end_level) {
                    unset($options[$key]);
                }
            }
        }

        if ($re_type == true) {
            $select = '';
            foreach ($options as $var) {
                $select .= '<option value="' . $var['cat_id'] . '" ';
                $select .= ($selected == $var['cat_id']) ? "selected='ture'" : '';
                $select .= '>';
                if ($var['level'] > 0) {
                    $select .= str_repeat('&nbsp;', $var['level'] * 4);
                }
                $select .= htmlspecialchars(addslashes($var['cat_name']), ENT_QUOTES) . '</option>';
            }

            return $select;
        } else {
            foreach ($options as $key => $value) {
                $options[$key]['url'] = build_uri('category', array('cid' => $value['cat_id']), $value['cat_name']);
            }

            return $options;
        }
    }

    /**
     * 过滤和排序所有分类，返回一个带有缩进级别的数组
     *
     * @access  private
     * @param int $cat_id 上级分类ID
     * @param array $arr 含有所有分类的数组
     * @param int $level 级别
     * @return  void
     */
    public function cat_options($spec_cat_id, $arr)
    {
        static $cat_options = array();

        if (isset($cat_options[$spec_cat_id])) {
            return $cat_options[$spec_cat_id];
        }

        if (!isset($cat_options[0])) {
            $level = $last_cat_id = 0;
            $options = $cat_id_array = $level_array = array();
            $data = read_static_cache('cat_option_static');
            if ($data === false) {
                while (!empty($arr)) {
                    foreach ($arr as $key => $value) {
                        $cat_id = $value['cat_id'];
                        if ($level == 0 && $last_cat_id == 0) {
                            if ($value['parent_id'] > 0) {
                                break;
                            }

                            $options[$cat_id] = $value;
                            $options[$cat_id]['level'] = $level;
                            $options[$cat_id]['id'] = $cat_id;
                            $options[$cat_id]['name'] = $value['cat_name'];
                            unset($arr[$key]);

                            if ($value['has_children'] == 0) {
                                continue;
                            }
                            $last_cat_id = $cat_id;
                            $cat_id_array = array($cat_id);
                            $level_array[$last_cat_id] = ++$level;
                            continue;
                        }

                        if ($value['parent_id'] == $last_cat_id) {
                            $options[$cat_id] = $value;
                            $options[$cat_id]['level'] = $level;
                            $options[$cat_id]['id'] = $cat_id;
                            $options[$cat_id]['name'] = $value['cat_name'];
                            unset($arr[$key]);

                            if ($value['has_children'] > 0) {
                                if (end($cat_id_array) != $last_cat_id) {
                                    $cat_id_array[] = $last_cat_id;
                                }
                                $last_cat_id = $cat_id;
                                $cat_id_array[] = $cat_id;
                                $level_array[$last_cat_id] = ++$level;
                            }
                        } elseif ($value['parent_id'] > $last_cat_id) {
                            break;
                        }
                    }

                    $count = count($cat_id_array);
                    if ($count > 1) {
                        $last_cat_id = array_pop($cat_id_array);
                    } elseif ($count == 1) {
                        if ($last_cat_id != end($cat_id_array)) {
                            $last_cat_id = end($cat_id_array);
                        } else {
                            $level = 0;
                            $last_cat_id = 0;
                            $cat_id_array = array();
                            continue;
                        }
                    }

                    if ($last_cat_id && isset($level_array[$last_cat_id])) {
                        $level = $level_array[$last_cat_id];
                    } else {
                        $level = 0;
                    }
                }
                //如果数组过大，不采用静态缓存方式
                if (count($options) <= 2000) {
                    write_static_cache('cat_option_static', $options);
                }
            } else {
                $options = $data;
            }
            $cat_options[0] = $options;
        } else {
            $options = $cat_options[0];
        }

        if (!$spec_cat_id) {
            return $options;
        } else {
            if (empty($options[$spec_cat_id])) {
                return array();
            }

            $spec_cat_id_level = $options[$spec_cat_id]['level'];

            foreach ($options as $key => $value) {
                if ($key != $spec_cat_id) {
                    unset($options[$key]);
                } else {
                    break;
                }
            }

            $spec_cat_id_array = array();
            foreach ($options as $key => $value) {
                if (($spec_cat_id_level == $value['level'] && $value['cat_id'] != $spec_cat_id) ||
                    ($spec_cat_id_level > $value['level'])) {
                    break;
                } else {
                    $spec_cat_id_array[$key] = $value;
                }
            }
            $cat_options[$spec_cat_id] = $spec_cat_id_array;

            return $spec_cat_id_array;
        }
    }

}
