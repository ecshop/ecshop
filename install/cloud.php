<?php

session_start();

define('IN_ECS', true);

require(__DIR__ . '/includes/init.php');

$installer_lang = ROOT_PATH . 'install/languages/zh_cn.php';
if (file_exists($installer_lang)) {
    include_once($installer_lang);
    $lang = $_LANG;
    $smarty->assign('lang', $_LANG);
}

$step = isset($_REQUEST['step']) ? trim($_REQUEST['step']) : '';

$step_arr = array('welcome', 'check', 'setting_ui', 'done');

if (!in_array($step, $step_arr)) {
    @header('Location: index.php');
}

if (isset($_SESSION[$step])) {
    foreach ($_SESSION[$step] as $k => $v) {
        $smarty->assign($k, $v);
        $GLOBALS[$k] = $v;
    }
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
