<?php


require(dirname(__FILE__) . '/includes/init.php');

admin_priv('navigator');

$exc = new exchange($ecs->table("nav"), $db, 'id', 'name');

/*------------------------------------------------------ */
//-- 自定义导航栏列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list') {
    $smarty->assign('ur_here', $_LANG['navigator']);
    $smarty->assign('action_link', array('text' => $_LANG['add_new'], 'href' => 'navigator.php?act=add'));
    $smarty->assign('full_page', 1);

    $navdb = get_nav();

    $smarty->assign('navdb', $navdb['navdb']);
    $smarty->assign('filter', $navdb['filter']);
    $smarty->assign('record_count', $navdb['record_count']);
    $smarty->assign('page_count', $navdb['page_count']);

    assign_query_info();
    $smarty->display('navigator.htm');
}
/*------------------------------------------------------ */
//-- 自定义导航栏列表Ajax
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'query') {
    $navdb = get_nav();
    $smarty->assign('navdb', $navdb['navdb']);
    $smarty->assign('filter', $navdb['filter']);
    $smarty->assign('record_count', $navdb['record_count']);
    $smarty->assign('page_count', $navdb['page_count']);

    $sort_flag = sort_flag($navdb['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('navigator.htm'), '', array('filter' => $navdb['filter'], 'page_count' => $navdb['page_count']));
}
/*------------------------------------------------------ */
//-- 自定义导航栏增加
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'add') {
    if (empty($_REQUEST['step'])) {
        $rt = array('act' => 'add');

        $sysmain = get_sysnav();

        $smarty->assign('action_link', array('text' => $_LANG['go_list'], 'href' => 'navigator.php?act=list'));
        $smarty->assign('ur_here', $_LANG['navigator']);
        assign_query_info();
        $smarty->assign('sysmain', $sysmain);
        $smarty->assign('rt', $rt);
        $smarty->display('navigator_add.htm');
    } elseif ($_REQUEST['step'] == 2) {
        $item_name = $_REQUEST['item_name'];
        $item_url = $_REQUEST['item_url'];
        $item_ifshow = $_REQUEST['item_ifshow'];
        $item_opennew = $_REQUEST['item_opennew'];
        $item_type = $_REQUEST['item_type'];

        $vieworder = $db->getOne("SELECT max(vieworder) FROM " . $ecs->table('nav') . " WHERE type = '" . $item_type . "'");

        $item_vieworder = empty($_REQUEST['item_vieworder']) ? $vieworder + 1 : $_REQUEST['item_vieworder'];

        if ($item_ifshow == 1 && $item_type == 'middle') {
            //如果设置为在中部显示

            $arr = analyse_uri($item_url);  //分析URI
            if ($arr) {
                //如果为分类
                set_show_in_nav($arr['type'], $arr['id'], 1);   //设置显示
                $sql = "INSERT INTO " . $GLOBALS['ecs']->table('nav') . " (name,ctype,cid,ifshow,vieworder,opennew,url,type) VALUES('$item_name','" . $arr['type'] . "','" . $arr['id'] . "','$item_ifshow','$item_vieworder','$item_opennew','$item_url','$item_type')";
            }
        }

        if (empty($sql)) {
            $sql = "INSERT INTO " . $GLOBALS['ecs']->table('nav') . " (name,ifshow,vieworder,opennew,url,type) VALUES('$item_name','$item_ifshow','$item_vieworder','$item_opennew','$item_url','$item_type')";
        }
        $db->query($sql);
        clear_cache_files();
        $links[] = array('text' => $_LANG['navigator'], 'href' => 'navigator.php?act=list');
        $links[] = array('text' => $_LANG['add_new'], 'href' => 'navigator.php?act=add');
        sys_msg($_LANG['edit_ok'], 0, $links);
    }
}
/*------------------------------------------------------ */
//-- 自定义导航栏编辑
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit') {
    $id = $_REQUEST['id'];
    if (empty($_REQUEST['step'])) {
        $rt = array('act' => 'edit', 'id' => $id);
        $row = $db->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('nav') . " WHERE id='$id'");
        $rt['item_name'] = $row['name'];
        $rt['item_url'] = $row['url'];
        $rt['item_vieworder'] = $row['vieworder'];
        $rt['item_ifshow_' . $row['ifshow']] = 'selected';
        $rt['item_opennew_' . $row['opennew']] = 'selected';
        $rt['item_type_' . $row['type']] = 'selected';

        $sysmain = get_sysnav();

        $smarty->assign('action_link', array('text' => $_LANG['go_list'], 'href' => 'navigator.php?act=list'));
        $smarty->assign('ur_here', $_LANG['navigator']);
        assign_query_info();
        $smarty->assign('sysmain', $sysmain);
        $smarty->assign('rt', $rt);
        $smarty->display('navigator_add.htm');
    } elseif ($_REQUEST['step'] == 2) {
        $item_name = $_REQUEST['item_name'];
        $item_url = $_REQUEST['item_url'];
        $item_ifshow = $_REQUEST['item_ifshow'];
        $item_opennew = $_REQUEST['item_opennew'];
        $item_type = $_REQUEST['item_type'];
        $item_vieworder = (int)$_REQUEST['item_vieworder'];

        $row = $db->getRow("SELECT ctype,cid,ifshow,type FROM " . $GLOBALS['ecs']->table('nav') . " WHERE id = '$id'");
        $arr = analyse_uri($item_url);

        if ($arr) {
            //目标为分类
            if ($row['ctype'] == $arr['type'] && $row['cid'] == $arr['id']) {
                //没有修改分类
                if ($item_type != 'middle') {
                    //位置不在中部
                    set_show_in_nav($arr['type'], $arr['id'], 0);
                }
            } else {
                //修改了分类
                if ($row['ifshow'] == 1 && $row['type'] == 'middle') {
                    //原来在中部显示
                    set_show_in_nav($row['ctype'], $row['cid'], 0); //设置成不显示
                } elseif ($row['ifshow'] == 0 && $row['type'] == 'middle') {
                    //原来不显示
                }
            }

            //分类判断
            if ($item_ifshow != is_show_in_nav($arr['type'], $arr['id']) && $item_type == 'middle') {
                set_show_in_nav($arr['type'], $arr['id'], $item_ifshow);
            }
            $sql = "UPDATE " . $GLOBALS['ecs']->table('nav') .
                " SET name='$item_name',ctype='" . $arr['type'] . "',cid='" . $arr['id'] . "',ifshow='$item_ifshow',vieworder='$item_vieworder',opennew='$item_opennew',url='$item_url',type='$item_type' WHERE id='$id'";
        } else {
            //目标不是分类
            if ($row['ctype'] && $row['cid']) {
                //原来是分类
                set_show_in_nav($row['ctype'], $row['cid'], 0);
            }

            $sql = "UPDATE " . $GLOBALS['ecs']->table('nav') .
                " SET name='$item_name',ctype='',cid='',ifshow='$item_ifshow',vieworder='$item_vieworder',opennew='$item_opennew',url='$item_url',type='$item_type' WHERE id='$id'";
        }


        $db->query($sql);
        clear_cache_files();
        $links[] = array('text' => $_LANG['navigator'], 'href' => 'navigator.php?act=list');
        sys_msg($_LANG['edit_ok'], 0, $links);
    }
}
/*------------------------------------------------------ */
//-- 自定义导航栏删除
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'del') {
    $id = (int)$_GET['id'];
    $row = $db->getRow("SELECT ctype,cid,type FROM " . $GLOBALS['ecs']->table('nav') . " WHERE id = '$id' LIMIT 1");

    if ($row['type'] == 'middle' && $row['ctype'] && $row['cid']) {
        set_show_in_nav($row['ctype'], $row['cid'], 0);
    }

    $sql = " DELETE FROM " . $GLOBALS['ecs']->table('nav') . " WHERE id='$id' LIMIT 1";
    $db->query($sql);
    clear_cache_files();
    ecs_header("Location: navigator.php?act=list\n");
    exit;
}

/*------------------------------------------------------ */
//-- 编辑排序
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit_sort_order') {
    check_authz_json('nav');

    $id = intval($_POST['id']);
    $order = json_str_iconv(trim($_POST['val']));

    /* 检查输入的值是否合法 */
    if (!preg_match("/^[0-9]+$/", $order)) {
        make_json_error(sprintf($_LANG['enter_int'], $order));
    } else {
        if ($exc->edit("vieworder = '$order'", $id)) {
            clear_cache_files();
            make_json_result(stripslashes($order));
        } else {
            make_json_error($db->error());
        }
    }
}

/*------------------------------------------------------ */
//-- 切换是否显示
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'toggle_ifshow') {
    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    $row = $db->getRow("SELECT type,ctype,cid FROM " . $GLOBALS['ecs']->table('nav') . " WHERE id = '$id' LIMIT 1");

    if ($row['type'] == 'middle' && $row['ctype'] && $row['cid']) {
        set_show_in_nav($row['ctype'], $row['cid'], $val);
    }

    if (nav_update($id, array('ifshow' => $val)) != false) {
        clear_cache_files();
        make_json_result($val);
    } else {
        make_json_error($db->error());
    }
}

/*------------------------------------------------------ */
//-- 切换是否新窗口
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'toggle_opennew') {
    $id = intval($_POST['id']);
    $val = intval($_POST['val']);

    if (nav_update($id, array('opennew' => $val)) != false) {
        clear_cache_files();
        make_json_result($val);
    } else {
        make_json_error($db->error());
    }
}


function get_nav()
{
    $result = get_filter();
    if ($result === false) {
        $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'type DESC, vieworder' : 'type DESC, ' . trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'ASC' : trim($_REQUEST['sort_order']);

        $sql = "SELECT count(*) FROM " . $GLOBALS['ecs']->table('nav');
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        /* 分页大小 */
        $filter = page_and_size($filter);

        /* 查询 */
        $sql = "SELECT id, name, ifshow, vieworder, opennew, url, type" .
            " FROM " . $GLOBALS['ecs']->table('nav') .
            " ORDER by " . $filter['sort_by'] . ' ' . $filter['sort_order'] .
            " LIMIT " . $filter['start'] . ',' . $filter['page_size'];

        set_filter($filter, $sql);
    } else {
        $sql = $result['sql'];
        $filter = $result['filter'];
    }

    $navdb = $GLOBALS['db']->getAll($sql);

    $type = "";
    $navdb2 = array();
    foreach ($navdb as $k => $v) {
        if (!empty($type) && $type != $v['type']) {
            $navdb2[] = array();
        }
        $navdb2[] = $v;
        $type = $v['type'];
    }

    $arr = array('navdb' => $navdb2, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

    return $arr;
}

/*------------------------------------------------------ */
//-- 排序相关
/*------------------------------------------------------ */
function sort_nav($a, $b)
{
    return $a['vieworder'] > $b['vieworder'] ? 1 : -1;
}

/*------------------------------------------------------ */
//-- 获得系统列表
/*------------------------------------------------------ */
function get_sysnav()
{
    global $_LANG;
    $sysmain = array(
        array($_LANG['view_cart'], 'flow.php'),
        array($_LANG['pick_out'], 'pick_out.php'),
        array($_LANG['group_buy_goods'], 'group_buy.php'),
        array($_LANG['snatch'], 'snatch.php'),
        array($_LANG['tag_cloud'], 'tag_cloud.php'),
        array($_LANG['user_center'], 'user.php'),
        array($_LANG['wholesale'], 'wholesale.php'),
        array($_LANG['activity'], 'activity.php'),
        array($_LANG['myship'], 'myship.php'),
        array($_LANG['message_board'], 'message.php'),
        array($_LANG['quotation'], 'quotation.php'),
    );

    $sysmain[] = array('-', '-');

    $catlist = array_merge(cat_list(0, 0, false), array('-'), article_cat_list(0, 0, false));
    foreach ($catlist as $key => $val) {
        $val['view_name'] = $val['cat_name'];
        for ($i = 0; $i < $val['level']; $i++) {
            $val['view_name'] = '&nbsp;&nbsp;&nbsp;&nbsp;' . $val['view_name'];
        }
        $val['url'] = str_replace('&amp;', '&', $val['url']);
        $val['url'] = str_replace('&', '&amp;', $val['url']);
        $sysmain[] = array($val['cat_name'], $val['url'], $val['view_name']);
    }
    return $sysmain;
}

/*------------------------------------------------------ */
//-- 列表项修改
/*------------------------------------------------------ */
function nav_update($id, $args)
{
    if (empty($args) || empty($id)) {
        return false;
    }

    return $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('nav'), $args, 'update', "id='$id'");
}

/*------------------------------------------------------ */
//-- 根据URI对导航栏项目进行分析，确定其为商品分类还是文章分类
/*------------------------------------------------------ */
function analyse_uri($uri)
{
    $uri = strtolower(str_replace('&amp;', '&', $uri));
    $arr = explode('-', $uri);
    switch ($arr[0]) {
        case 'category':
            return array('type' => 'c', 'id' => $arr[1]);
            break;
        case 'article_cat':
            return array('type' => 'a', 'id' => $arr[1]);
            break;
        default:

            break;
    }

    list($fn, $pm) = explode('?', $uri);

    if (strpos($uri, '&') === false) {
        $arr = array($pm);
    } else {
        $arr = explode('&', $pm);
    }
    switch ($fn) {
        case 'category.php':
            //商品分类
            foreach ($arr as $k => $v) {
                list($key, $val) = explode('=', $v);
                if ($key == 'id') {
                    return array('type' => 'c', 'id' => $val);
                }
            }
            break;
        case 'article_cat.php':
            //文章分类
            foreach ($arr as $k => $v) {
                list($key, $val) = explode('=', $v);
                if ($key == 'id') {
                    return array('type' => 'a', 'id' => $val);
                }
            }
            break;
        default:
            //未知
            return false;
            break;
    }
}

/*------------------------------------------------------ */
//-- 是否显示
/*------------------------------------------------------ */
function is_show_in_nav($type, $id)
{
    if ($type == 'c') {
        $tablename = $GLOBALS['ecs']->table('category');
    } else {
        $tablename = $GLOBALS['ecs']->table('article_cat');
    }
    return $GLOBALS['db']->getOne("SELECT show_in_nav FROM $tablename WHERE cat_id = '$id'");
}

/*------------------------------------------------------ */
//-- 设置是否显示
/*------------------------------------------------------ */
function set_show_in_nav($type, $id, $val)
{
    if ($type == 'c') {
        $tablename = $GLOBALS['ecs']->table('category');
    } else {
        $tablename = $GLOBALS['ecs']->table('article_cat');
    }
    $GLOBALS['db']->query("UPDATE $tablename SET show_in_nav = '$val' WHERE cat_id = '$id'");
    clear_cache_files();
}
