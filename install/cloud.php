<?php

/**
 * 云服务接口
 */

define('IN_ECS', true);
session_start();
require(dirname(__FILE__) . '/includes/init.php');
require(ROOT_PATH . 'includes/inc_constant.php');
require(ROOT_PATH . 'includes/cls_ecshop.php');
require(ROOT_PATH . 'includes/cls_transport.php');
$t = new transport('-1', 5);

$data['api_ver'] = '1.0';
$data['version'] = VERSION;
$data['charset'] = strtoupper(EC_CHARSET);
$ecs_charset = $data['charset'];
$data['ecs_lang'] = !empty($_SESSION['ecs_lang']) ? $_SESSION['ecs_lang'] : 'zh_cn';
$data['release'] = RELEASE;
$step = isset($_REQUEST['step']) ? trim($_REQUEST['step']) : '';

$step_arr = array('welcome', 'check', 'setting_ui', 'done');

if (!in_array($step, $step_arr)) {
    @header('Location: index.php');
}

$apiget = "step={$step}&ecs_lang={$data['ecs_lang']}&release={$data['release']}&version={$data['version']}&charset={$data['charset']}&api_ver={$data['api_ver']}";

foreach ($_SESSION[$step] as $k => $v) {
    $smarty->assign($k, $v);
    $GLOBALS[$k] = $v;
}

$installer_lang_package_path = ROOT_PATH . 'install/languages/' . $data['ecs_lang'] . '.php';
if (file_exists($installer_lang_package_path)) {
    include_once($installer_lang_package_path);
    $lang = $_LANG;
    $smarty->assign('lang', $_LANG);
}

if ($step == 'welcome') {
    $smarty->display('welcome_content.php');
} elseif ($step == 'check') {
    $smarty->display('checking_content.php');
} elseif ($step == 'setting_ui') {
    $smarty->display('setting_content.php');
} elseif ($step == 'done') {
    $smarty->display('done_content.php');
}
