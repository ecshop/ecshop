<?php

define('IN_ECS', true);

/* 代码 */
require dirname(__FILE__).'/includes/init.php';

/* ------------------------------------------------------ */
// -- 列表编辑 ?act=list_edit
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'list_edit') {
    /* 检查权限 */
    admin_priv('shop_config');

    /* 可选语言 */
    $dir = opendir(ROOT_PATH.'languages');
    $lang_list = [];
    while (@$file = readdir($dir)) {
        if ($file != '.' && $file != '..' && $file != '.svn' && $file != '_svn' && is_dir(ROOT_PATH.'languages/'.$file)) {
            $lang_list[] = $file;
        }
    }
    @closedir($dir);

    $smarty->assign('lang_list', $lang_list);
    $smarty->assign('ur_here', $_LANG['01_shop_config']);
    $smarty->assign('group_list', get_settings(null, ['5']));
    $smarty->assign('countries', get_regions());

    if (strpos(strtolower($_SERVER['SERVER_SOFTWARE']), 'iis') !== false) {
        $rewrite_confirm = $_LANG['rewrite_confirm_iis'];
    } else {
        $rewrite_confirm = $_LANG['rewrite_confirm_apache'];
    }
    $smarty->assign('rewrite_confirm', $rewrite_confirm);

    if ($_CFG['shop_country'] > 0) {
        $smarty->assign('provinces', get_regions(1, $_CFG['shop_country']));
        if ($_CFG['shop_province']) {
            $smarty->assign('cities', get_regions(2, $_CFG['shop_province']));
        }
    }
    $smarty->assign('cfg', $_CFG);

    assign_query_info();
    $smarty->display('shop_config.htm');
}

/* ------------------------------------------------------ */
// -- 邮件服务器设置
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'mail_settings') {
    /* 检查权限 */
    admin_priv('shop_config');

    $arr = get_settings([5]);

    assign_query_info();

    $smarty->assign('ur_here', $_LANG['mail_settings']);
    $smarty->assign('cfg', $arr[5]['vars']);
    $smarty->display('shop_config_mail_settings.htm');
}

/* ------------------------------------------------------ */
// -- 提交   ?act=post
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'post') {
    $type = empty($_POST['type']) ? '' : $_POST['type'];

    /* 检查权限 */
    admin_priv('shop_config');

    /* 允许上传的文件类型 */
    $allow_file_types = '|GIF|JPG|PNG|BMP|SWF|DOC|XLS|PPT|MID|WAV|ZIP|RAR|PDF|CHM|RM|TXT|CERT|';

    /* 保存变量值 */
    $count = count($_POST['value']);

    $arr = [];
    $sql = 'SELECT id, value FROM '.$ecs->table('shop_config');
    $res = $db->query($sql);
    while ($row = $db->fetchRow($res)) {
        $arr[$row['id']] = $row['value'];
    }
    foreach ($_POST['value'] as $key => $val) {
        if ($arr[$key] != $val) {
            $sql = 'UPDATE '.$ecs->table('shop_config')." SET value = '".trim($val)."' WHERE id = '".$key."'";
            $db->query($sql);
        }
    }

    /* 处理上传文件 */
    $file_var_list = [];
    $sql = 'SELECT * FROM '.$ecs->table('shop_config')." WHERE parent_id > 0 AND type = 'file'";
    $res = $db->query($sql);
    while ($row = $db->fetchRow($res)) {
        $file_var_list[$row['code']] = $row;
    }

    foreach ($_FILES as $code => $file) {
        /* 判断用户是否选择了文件 */
        if ((isset($file['error']) && $file['error'] == 0) || (! isset($file['error']) && $file['tmp_name'] != 'none')) {
            /* 检查上传的文件类型是否合法 */
            if (! check_file_type($file['tmp_name'], $file['name'], $allow_file_types)) {
                sys_msg(sprintf($_LANG['msg_invalid_file'], $file['name']));
            } else {
                if ($code == 'shop_logo') {
                    include_once 'includes/lib_template.php';
                    $info = get_template_info($_CFG['template']);

                    $file_name = str_replace('{$template}', $_CFG['template'], $file_var_list[$code]['store_dir']).$info['logo'];
                } elseif ($code == 'watermark') {
                    $file_name_arr = explode('.', $file['name']);
                    $ext = array_pop($file_name_arr);
                    $file_name = $file_var_list[$code]['store_dir'].'watermark.'.$ext;
                    if (file_exists($file_var_list[$code]['value'])) {
                        @unlink($file_var_list[$code]['value']);
                    }
                } elseif ($code == 'wap_logo') {
                    $file_name_arr = explode('.', $file['name']);
                    $ext = array_pop($file_name_arr);
                    $file_name = $file_var_list[$code]['store_dir'].'wap_logo.'.$ext;
                    if (file_exists($file_var_list[$code]['value'])) {
                        @unlink($file_var_list[$code]['value']);
                    }
                } else {
                    $file_name = $file_var_list[$code]['store_dir'].$file['name'];
                }

                /* 判断是否上传成功 */
                if (move_upload_file($file['tmp_name'], $file_name)) {
                    $sql = 'UPDATE '.$ecs->table('shop_config')." SET value = '$file_name' WHERE code = '$code'";
                    $db->query($sql);
                } else {
                    sys_msg(sprintf($_LANG['msg_upload_failed'], $file['name'], $file_var_list[$code]['store_dir']));
                }
            }
        }
    }

    /* 处理发票类型及税率 */
    if (! empty($_POST['invoice_rate'])) {
        foreach ($_POST['invoice_rate'] as $key => $rate) {
            $rate = round(floatval($rate), 2);
            if ($rate < 0) {
                $rate = 0;
            }
            $_POST['invoice_rate'][$key] = $rate;
        }
        $invoice = [
            'type' => $_POST['invoice_type'],
            'rate' => $_POST['invoice_rate'],
        ];
        $sql = 'UPDATE '.$ecs->table('shop_config')." SET value = '".serialize($invoice)."' WHERE code = 'invoice_type'";
        $db->query($sql);
    }

    /* 记录日志 */
    admin_log('', 'edit', 'shop_config');

    /* 清除缓存 */
    clear_all_files();

    $_CFG = load_config();

    $shop_country = $db->getOne('SELECT region_name FROM '.$ecs->table('region')." WHERE region_id='$_CFG[shop_country]'");
    $shop_province = $db->getOne('SELECT region_name FROM '.$ecs->table('region')." WHERE region_id='$_CFG[shop_province]'");
    $shop_city = $db->getOne('SELECT region_name FROM '.$ecs->table('region')." WHERE region_id='$_CFG[shop_city]'");

    if ($type == 'mail_setting') {
        $links[] = ['text' => $_LANG['back_mail_settings'], 'href' => 'shop_config.php?act=mail_settings'];
        sys_msg($_LANG['mail_save_success'], 0, $links);
    } else {
        $links[] = ['text' => $_LANG['back_shop_config'], 'href' => 'shop_config.php?act=list_edit'];
        sys_msg($_LANG['save_success'], 0, $links);
    }
}

/* ------------------------------------------------------ */
// -- 发送测试邮件
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'send_test_email') {
    /* 检查权限 */
    check_authz_json('shop_config');

    /* 取得参数 */
    $email = trim($_POST['email']);

    /* 更新配置 */
    $_CFG['mail_service'] = intval($_POST['mail_service']);
    $_CFG['smtp_host'] = trim($_POST['smtp_host']);
    $_CFG['smtp_port'] = trim($_POST['smtp_port']);
    $_CFG['smtp_user'] = json_str_iconv(trim($_POST['smtp_user']));
    $_CFG['smtp_pass'] = trim($_POST['smtp_pass']);
    $_CFG['smtp_mail'] = trim($_POST['reply_email']);
    $_CFG['mail_charset'] = trim($_POST['mail_charset']);

    if (send_mail('', $email, $_LANG['test_mail_title'], $_LANG['cfg_name']['email_content'], 0)) {
        make_json_result('', $_LANG['sendemail_success'].$email);
    } else {
        make_json_error(implode("\n", $err->_message));
    }
}

/* ------------------------------------------------------ */
// -- 删除上传文件
/* ------------------------------------------------------ */
if ($_REQUEST['act'] == 'del') {
    /* 检查权限 */
    check_authz_json('shop_config');

    /* 取得参数 */
    $code = trim($_GET['code']);

    $filename = $_CFG[$code];

    // 删除文件
    @unlink($filename);

    // 更新设置
    update_configure($code, '');

    /* 记录日志 */
    admin_log('', 'edit', 'shop_config');

    /* 清除缓存 */
    clear_all_files();

    sys_msg($_LANG['save_success'], 0);
}

/**
 * 设置系统设置
 *
 * @param  string  $key
 * @param  string  $val
 * @return bool
 */
function update_configure($key, $val = '')
{
    if (! empty($key)) {
        $sql = 'UPDATE '.$GLOBALS['ecs']->table('shop_config')." SET value='$val' WHERE code='$key'";

        return $GLOBALS['db']->query($sql);
    }

    return true;
}

/**
 * 获得设置信息
 *
 * @param  array  $groups  需要获得的设置组
 * @param  array  $excludes  不需要获得的设置组
 * @return array
 */
function get_settings($groups = null, $excludes = null)
{
    global $db, $ecs, $_LANG;

    $config_groups = '';
    $excludes_groups = '';

    if (! empty($groups)) {
        foreach ($groups as $key => $val) {
            $config_groups .= " AND (id='$val' OR parent_id='$val')";
        }
    }

    if (! empty($excludes)) {
        foreach ($excludes as $key => $val) {
            $excludes_groups .= " AND (parent_id<>'$val' AND id<>'$val')";
        }
    }

    /* 取出全部数据：分组和变量 */
    $sql = 'SELECT * FROM '.$ecs->table('shop_config').
        " WHERE type<>'hidden' $config_groups $excludes_groups ORDER BY parent_id, sort_order, id";
    $item_list = $db->getAll($sql);

    /* 整理数据 */
    $group_list = [];
    foreach ($item_list as $key => $item) {
        $pid = $item['parent_id'];
        $item['name'] = isset($_LANG['cfg_name'][$item['code']]) ? $_LANG['cfg_name'][$item['code']] : $item['code'];
        $item['desc'] = isset($_LANG['cfg_desc'][$item['code']]) ? $_LANG['cfg_desc'][$item['code']] : '';

        if ($item['code'] == 'sms_shop_mobile') {
            $item['url'] = 1;
        }
        if ($pid == 0) {
            /* 分组 */
            if ($item['type'] == 'group') {
                $group_list[$item['id']] = $item;
            }
        } else {
            /* 变量 */
            if (isset($group_list[$pid])) {
                if ($item['store_range']) {
                    $item['store_options'] = explode(',', $item['store_range']);

                    foreach ($item['store_options'] as $k => $v) {
                        $item['display_options'][$k] = isset($_LANG['cfg_range'][$item['code']][$v]) ?
                            $_LANG['cfg_range'][$item['code']][$v] : $v;
                    }
                }
                $group_list[$pid]['vars'][] = $item;
            }
        }
    }

    return $group_list;
}
