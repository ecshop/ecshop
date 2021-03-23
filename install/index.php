<?php

define('IN_ECS', true);

session_start();
require(dirname(__FILE__) . '/includes/init.php');
require(ROOT_PATH . 'includes/inc_constant.php');

/* 加载安装程序所使用的语言包 */
$installer_lang = ROOT_PATH . 'install/languages/zh_cn.php';
if (file_exists($installer_lang)) {
    include_once($installer_lang);
    $smarty->assign('lang', $_LANG);
} else {
    die('Can\'t find language package!');
}

/* 初始化流程控制变量 */
$step = isset($_REQUEST['step']) ? $_REQUEST['step'] : 'welcome';
if (file_exists(ROOT_PATH . 'data/install.lock') && $step != 'done') {
    $step = 'error';
    $err->add($_LANG['has_locked_installer']);

    if (isset($_REQUEST['IS_AJAX_REQUEST'])
        && $_REQUEST['IS_AJAX_REQUEST'] === 'yes') {
        die(implode(',', $err->get_all()));
    }
}

switch ($step) {
    case 'welcome':
        $smarty->display('welcome.php');

        break;

    case 'check':
        include_once(ROOT_PATH . 'install/includes/lib_env_checker.php');
        include_once(ROOT_PATH . 'install/includes/checking_dirs.php');
        $dir_checking = check_dirs_priv($checking_dirs);

        $templates_root = array(
            'dwt' => ROOT_PATH . 'themes/default/',
            'lbi' => ROOT_PATH . 'themes/default/library/');
        $template_checking = check_templates_priv($templates_root);

        $rename_priv = check_rename_priv();

        $disabled = '';
        if ($dir_checking['result'] === 'ERROR'
            || !empty($template_checking)
            || !empty($rename_priv)
            || !function_exists('mysqli_connect')) {
            $disabled = 'disabled="true"';
        }

        $has_unwritable_tpl = 'yes';
        if (empty($template_checking)) {
            $template_checking = $_LANG['all_are_writable'];
            $has_unwritable_tpl = 'no';
        }

        $ui = (!empty($_POST['user_interface'])) ? $_POST['user_interface'] : $_GET['ui'];
        $_SESSION['check']['system_info'] = get_system_info();
        $_SESSION['check']['dir_checking'] = $dir_checking['detail'];
        $_SESSION['check']['has_unwritable_tpl'] = $has_unwritable_tpl;
        $_SESSION['check']['template_checking'] = $template_checking;
        $_SESSION['check']['rename_priv'] = $rename_priv;
        $_SESSION['check']['disabled'] = $disabled;
        $smarty->assign('system_info', get_system_info());
        $smarty->assign('dir_checking', $dir_checking['detail']);
        $smarty->assign('has_unwritable_tpl', $has_unwritable_tpl);
        $smarty->assign('template_checking', $template_checking);
        $smarty->assign('rename_priv', $rename_priv);
        $smarty->assign('disabled', $disabled);
        $smarty->display('checking.php');

        break;

    case 'setting_ui':
        $prefix = 'ecs_';
        $goods_types = array();

        if (!has_supported_gd()) {
            $checked = 'checked="checked"';
            $disabled = 'disabled="true"';
        } else {
            $checked = '';
            $disabled = '';
        }

        $show_timezone = 'yes';
        $timezones = get_timezone_list();
        $_SESSION['setting_ui']['checked'] = $checked;
        $_SESSION['setting_ui']['disabled'] = $disabled;
        $_SESSION['setting_ui']['goods_types'] = $goods_types;
        $_SESSION['setting_ui']['show_timezone'] = $show_timezone;
        $_SESSION['setting_ui']['local_timezone'] = get_local_timezone();
        $_SESSION['setting_ui']['timezones'] = $timezones;
        $smarty->assign('checked', $checked);
        $smarty->assign('disabled', $disabled);
        $smarty->assign('goods_types', $goods_types);
        $smarty->assign('show_timezone', $show_timezone);
        $smarty->assign('local_timezone', get_local_timezone());
        $smarty->assign('timezones', $timezones);
        $smarty->display('setting.php');

        break;

    case 'get_db_list':
        $db_host = isset($_POST['db_host']) ? trim($_POST['db_host']) : '';
        $db_port = isset($_POST['db_port']) ? trim($_POST['db_port']) : '';
        $db_user = isset($_POST['db_user']) ? trim($_POST['db_user']) : '';
        $db_pass = isset($_POST['db_pass']) ? trim($_POST['db_pass']) : '';

        include_once(ROOT_PATH . 'includes/cls_json.php');
        $json = new JSON();

        $databases = get_db_list($db_host, $db_port, $db_user, $db_pass);
        if ($databases === false) {
            echo $json->encode(implode(',', $err->get_all()));
        } else {
            $result = array('msg' => 'OK', 'list' => implode(',', $databases));
            echo $json->encode($result);
        }

        break;

    case 'create_config_file':
        $db_host = isset($_POST['db_host']) ? trim($_POST['db_host']) : '';
        $db_port = isset($_POST['db_port']) ? trim($_POST['db_port']) : '';
        $db_user = isset($_POST['db_user']) ? trim($_POST['db_user']) : '';
        $db_pass = isset($_POST['db_pass']) ? trim($_POST['db_pass']) : '';
        $db_name = isset($_POST['db_name']) ? trim($_POST['db_name']) : '';
        $prefix = isset($_POST['db_prefix']) ? trim($_POST['db_prefix']) : '';
        $timezone = isset($_POST['timezone']) ? trim($_POST['timezone']) : 'Asia/Shanghai';

        $result = create_config_file($db_host, $db_port, $db_user, $db_pass, $db_name, $prefix, $timezone);
        if ($result === false) {
            echo implode(',', $err->get_all());
        } else {
            echo 'OK';
        }

        break;

    case 'create_database':
        $db_host = isset($_POST['db_host']) ? trim($_POST['db_host']) : '';
        $db_port = isset($_POST['db_port']) ? trim($_POST['db_port']) : '';
        $db_user = isset($_POST['db_user']) ? trim($_POST['db_user']) : '';
        $db_pass = isset($_POST['db_pass']) ? trim($_POST['db_pass']) : '';
        $db_name = isset($_POST['db_name']) ? trim($_POST['db_name']) : '';

        $result = create_database($db_host, $db_port, $db_user, $db_pass, $db_name);
        if ($result === false) {
            echo implode(',', $err->get_all());
        } else {
            echo 'OK';
        }

        break;

    case 'install_base_data':
        $sql_files = array(
            ROOT_PATH . 'install/data/structure.sql',
            ROOT_PATH . 'install/data/data.sql',
        );

        $result = install_data($sql_files);

        if ($result === false) {
            echo implode(',', $err->get_all());
        } else {
            echo 'OK';
        }

        break;

    case 'create_admin_passport':
        $admin_name = isset($_POST['admin_name']) ? json_str_iconv(trim($_POST['admin_name'])) : '';
        $admin_password = isset($_POST['admin_password']) ? trim($_POST['admin_password']) : '';
        $admin_password2 = isset($_POST['admin_password2']) ? trim($_POST['admin_password2']) : '';
        $admin_email = isset($_POST['admin_email']) ? trim($_POST['admin_email']) : '';

        $result = create_admin_passport(
            $admin_name,
            $admin_password,
            $admin_password2,
            $admin_email
        );
        if ($result === false) {
            echo implode(',', $err->get_all());
        } else {
            echo 'OK';
        }

        break;

    case 'do_others':
        $system_lang = 'zh_cn';
        $captcha = isset($_POST['disable_captcha']) ? intval($_POST['disable_captcha']) : '0';

        $result = do_others($system_lang, $captcha);
        if ($result === false) {
            echo implode(',', $err->get_all());
        } else {
            echo 'OK';
        }

        break;

    case 'done':
        $result = deal_aftermath();
        if ($result === false) {
            $err_msg = implode(',', $err->get_all());
            $smarty->assign('err_msg', $err_msg);
            $smarty->display('error.php');
        } else {
            @unlink(ROOT_PATH . 'data/config_temp.php');
            $smarty->display('done.php');
        }

        break;

    case 'error':
        $err_msg = implode(',', $err->get_all());
        $smarty->assign('err_msg', $err_msg);
        $smarty->display('error.php');

        break;

    default:
        die('Error, unknown step!');
}
