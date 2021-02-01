<?php

namespace app\controller\admin;

/**
 * 管理中心品牌管理
 */
class BrandController extends InitController
{
    public function initialize()
    {
        parent::initialize();

        $image = new cls_image($_CFG['bgcolor']);

        $exc = new exchange(table("brand"), $db, 'brand_id', 'brand_name');
    }


    /*------------------------------------------------------ */
    //-- 品牌列表
    /*------------------------------------------------------ */
    public function listAction()
    {
        $this->assign('ur_here', $_LANG['06_goods_brand_list']);
        $this->assign('action_link', array('text' => $_LANG['07_brand_add'], 'href' => 'brand.php?act=add'));
        $this->assign('full_page', 1);

        $brand_list = get_brandlist();

        $this->assign('brand_list', $brand_list['brand']);
        $this->assign('filter', $brand_list['filter']);
        $this->assign('record_count', $brand_list['record_count']);
        $this->assign('page_count', $brand_list['page_count']);

        assign_query_info();
        return $this->display('brand_list.htm');
    }

    /*------------------------------------------------------ */
    //-- 添加品牌
    /*------------------------------------------------------ */
    public function addAction()
    {
        /* 权限判断 */
        admin_priv('brand_manage');

        $this->assign('ur_here', $_LANG['07_brand_add']);
        $this->assign('action_link', array('text' => $_LANG['06_goods_brand_list'], 'href' => 'brand.php?act=list'));
        $this->assign('form_action', 'insert');

        assign_query_info();
        $this->assign('brand', array('sort_order' => 50, 'is_show' => 1));
        return $this->display('brand_info.htm');
    }

    public function insertAction()
    {
        /*检查品牌名是否重复*/
        admin_priv('brand_manage');

        $is_show = isset($_REQUEST['is_show']) ? intval($_REQUEST['is_show']) : 0;

        $is_only = $exc->is_only('brand_name', $_POST['brand_name']);

        if (!$is_only) {
            sys_msg(sprintf($_LANG['brandname_exist'], stripslashes($_POST['brand_name'])), 1);
        }

        /*对描述处理*/
        if (!empty($_POST['brand_desc'])) {
            $_POST['brand_desc'] = $_POST['brand_desc'];
        }

        /*处理图片*/
        $img_name = basename($image->upload_image($_FILES['brand_logo'], 'brandlogo'));

        /*处理URL*/
        $site_url = sanitize_url($_POST['site_url']);

        /*插入数据*/

        $sql = "INSERT INTO " . table('brand') . "(brand_name, site_url, brand_desc, brand_logo, is_show, sort_order) " .
            "VALUES ('$_POST[brand_name]', '$site_url', '$_POST[brand_desc]', '$img_name', '$is_show', '$_POST[sort_order]')";
        $db->query($sql);

        admin_log($_POST['brand_name'], 'add', 'brand');

        /* 清除缓存 */
        clear_cache_files();

        $link[0]['text'] = $_LANG['continue_add'];
        $link[0]['href'] = 'brand.php?act=add';

        $link[1]['text'] = $_LANG['back_list'];
        $link[1]['href'] = 'brand.php?act=list';

        sys_msg($_LANG['brandadd_succed'], 0, $link);
    }

    /*------------------------------------------------------ */
    //-- 编辑品牌
    /*------------------------------------------------------ */
    public function editAction()
    {
        /* 权限判断 */
        admin_priv('brand_manage');
        $sql = "SELECT brand_id, brand_name, site_url, brand_logo, brand_desc, brand_logo, is_show, sort_order " .
            "FROM " . table('brand') . " WHERE brand_id='$_REQUEST[id]'";
        $brand = $db->getRow($sql);

        $this->assign('ur_here', $_LANG['brand_edit']);
        $this->assign('action_link', array('text' => $_LANG['06_goods_brand_list'], 'href' => 'brand.php?act=list&' . list_link_postfix()));
        $this->assign('brand', $brand);
        $this->assign('form_action', 'updata');

        assign_query_info();
        return $this->display('brand_info.htm');
    }

    public function updataAction()
    {
        admin_priv('brand_manage');
        if ($_POST['brand_name'] != $_POST['old_brandname']) {
            /*检查品牌名是否相同*/
            $is_only = $exc->is_only('brand_name', $_POST['brand_name'], $_POST['id']);

            if (!$is_only) {
                sys_msg(sprintf($_LANG['brandname_exist'], stripslashes($_POST['brand_name'])), 1);
            }
        }

        /*对描述处理*/
        if (!empty($_POST['brand_desc'])) {
            $_POST['brand_desc'] = $_POST['brand_desc'];
        }

        $is_show = isset($_REQUEST['is_show']) ? intval($_REQUEST['is_show']) : 0;
        /*处理URL*/
        $site_url = sanitize_url($_POST['site_url']);

        /* 处理图片 */
        $img_name = basename($image->upload_image($_FILES['brand_logo'], 'brandlogo'));
        $param = "brand_name = '$_POST[brand_name]',  site_url='$site_url', brand_desc='$_POST[brand_desc]', is_show='$is_show', sort_order='$_POST[sort_order]' ";
        if (!empty($img_name)) {
            //有图片上传
            $param .= " ,brand_logo = '$img_name' ";
        }

        if ($exc->edit($param, $_POST['id'])) {
            /* 清除缓存 */
            clear_cache_files();

            admin_log($_POST['brand_name'], 'edit', 'brand');

            $link[0]['text'] = $_LANG['back_list'];
            $link[0]['href'] = 'brand.php?act=list&' . list_link_postfix();
            $note = vsprintf($_LANG['brandedit_succed'], $_POST['brand_name']);
            sys_msg($note, 0, $link);
        } else {
            die($db->error());
        }
    }

    /*------------------------------------------------------ */
    //-- 编辑品牌名称
    /*------------------------------------------------------ */
    public function edit_brand_nameAction()
    {
        check_authz_json('brand_manage');

        $id = intval($_POST['id']);
        $name = json_str_iconv(trim($_POST['val']));

        /* 检查名称是否重复 */
        if ($exc->num("brand_name", $name, $id) != 0) {
            return make_json_error(sprintf($_LANG['brandname_exist'], $name));
        } else {
            if ($exc->edit("brand_name = '$name'", $id)) {
                admin_log($name, 'edit', 'brand');
                return make_json_result(stripslashes($name));
            } else {
                return make_json_result(sprintf($_LANG['brandedit_fail'], $name));
            }
        }
    }

    public function add_brandAction()
    {
        $brand = empty($_REQUEST['brand']) ? '' : json_str_iconv(trim($_REQUEST['brand']));

        if (brand_exists($brand)) {
            return make_json_error($_LANG['brand_name_exist']);
        } else {
            $sql = "INSERT INTO " . table('brand') . "(brand_name)" .
                "VALUES ( '$brand')";

            $db->query($sql);
            $brand_id = $db->insert_id();

            $arr = array("id" => $brand_id, "brand" => $brand);

            return make_json_result($arr);
        }
    }
    /*------------------------------------------------------ */
    //-- 编辑排序序号
    /*------------------------------------------------------ */
    public function edit_sort_orderAction()
    {
        check_authz_json('brand_manage');

        $id = intval($_POST['id']);
        $order = intval($_POST['val']);
        $name = $exc->get_name($id);

        if ($exc->edit("sort_order = '$order'", $id)) {
            admin_log(addslashes($name), 'edit', 'brand');

            return make_json_result($order);
        } else {
            return make_json_error(sprintf($_LANG['brandedit_fail'], $name));
        }
    }

    /*------------------------------------------------------ */
    //-- 切换是否显示
    /*------------------------------------------------------ */
    public function toggle_showAction()
    {
        check_authz_json('brand_manage');

        $id = intval($_POST['id']);
        $val = intval($_POST['val']);

        $exc->edit("is_show='$val'", $id);

        return make_json_result($val);
    }

    /*------------------------------------------------------ */
    //-- 删除品牌
    /*------------------------------------------------------ */
    public function removeAction()
    {
        check_authz_json('brand_manage');

        $id = intval($_GET['id']);

        /* 删除该品牌的图标 */
        $sql = "SELECT brand_logo FROM " . table('brand') . " WHERE brand_id = '$id'";
        $logo_name = $db->getOne($sql);
        if (!empty($logo_name)) {
            @unlink(ROOT_PATH . DATA_DIR . '/brandlogo/' . $logo_name);
        }

        $exc->drop($id);

        /* 更新商品的品牌编号 */
        $sql = "UPDATE " . table('goods') . " SET brand_id=0 WHERE brand_id='$id'";
        $db->query($sql);

        $url = 'brand.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

        return redirect($url);
    }

    /*------------------------------------------------------ */
    //-- 删除品牌图片
    /*------------------------------------------------------ */
    public function drop_logoAction()
    {
        /* 权限判断 */
        admin_priv('brand_manage');
        $brand_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        /* 取得logo名称 */
        $sql = "SELECT brand_logo FROM " . table('brand') . " WHERE brand_id = '$brand_id'";
        $logo_name = $db->getOne($sql);

        if (!empty($logo_name)) {
            @unlink(ROOT_PATH . DATA_DIR . '/brandlogo/' . $logo_name);
            $sql = "UPDATE " . table('brand') . " SET brand_logo = '' WHERE brand_id = '$brand_id'";
            $db->query($sql);
        }
        $link = array(array('text' => $_LANG['brand_edit_lnk'], 'href' => 'brand.php?act=edit&id=' . $brand_id), array('text' => $_LANG['brand_list_lnk'], 'href' => 'brand.php?act=list'));
        sys_msg($_LANG['drop_brand_logo_success'], 0, $link);
    }

    /*------------------------------------------------------ */
    //-- 排序、分页、查询
    /*------------------------------------------------------ */
    public function queryAction()
    {
        $brand_list = get_brandlist();
        $this->assign('brand_list', $brand_list['brand']);
        $this->assign('filter', $brand_list['filter']);
        $this->assign('record_count', $brand_list['record_count']);
        $this->assign('page_count', $brand_list['page_count']);

        return make_json_result(
            $smarty->fetch('brand_list.htm'),
            '',
            array('filter' => $brand_list['filter'], 'page_count' => $brand_list['page_count'])
        );
    }

    /**
     * 获取品牌列表
     *
     * @access  public
     * @return  array
     */
    public function get_brandlist()
    {
        $result = get_filter();
        if ($result === false) {
            /* 分页大小 */
            $filter = array();

            /* 记录总数以及页数 */
            if (isset($_POST['brand_name'])) {
                $sql = "SELECT COUNT(*) FROM " . table('brand') . ' WHERE brand_name = \'' . $_POST['brand_name'] . '\'';
            } else {
                $sql = "SELECT COUNT(*) FROM " . table('brand');
            }

            $filter['record_count'] = $GLOBALS['db']->getOne($sql);

            $filter = page_and_size($filter);

            /* 查询记录 */
            if (isset($_POST['brand_name'])) {
                if (strtoupper(EC_CHARSET) == 'GBK') {
                    $keyword = iconv("UTF-8", "gb2312", $_POST['brand_name']);
                } else {
                    $keyword = $_POST['brand_name'];
                }
                $sql = "SELECT * FROM " . table('brand') . " WHERE brand_name like '%{$keyword}%' ORDER BY sort_order ASC";
            } else {
                $sql = "SELECT * FROM " . table('brand') . " ORDER BY sort_order ASC";
            }

            set_filter($filter, $sql);
        } else {
            $sql = $result['sql'];
            $filter = $result['filter'];
        }
        $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);

        $arr = array();
        while ($rows = $GLOBALS['db']->fetchRow($res)) {
            $brand_logo = empty($rows['brand_logo']) ? '' :
                '<a href="../' . DATA_DIR . '/brandlogo/' . $rows['brand_logo'] . '" target="_brank"><img src="images/picflag.gif" width="16" height="16" border="0" alt=' . $GLOBALS['_LANG']['brand_logo'] . ' /></a>';
            $site_url = empty($rows['site_url']) ? 'N/A' : '<a href="' . $rows['site_url'] . '" target="_brank">' . $rows['site_url'] . '</a>';

            $rows['brand_logo'] = $brand_logo;
            $rows['site_url'] = $site_url;

            $arr[] = $rows;
        }

        return array('brand' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    }
}
