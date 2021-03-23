<?php

$lang = (!empty($_GET['lang'])) ? trim($_GET['lang']) : 'zh_cn';

if (!file_exists('../languages/' . $lang . '/calendar.php') || strrchr($lang, '.')) {
    $lang = 'zh_cn';
}

require(dirname(dirname(__FILE__)) . '/data/config.php');
header('Content-type: application/x-javascript; charset=' . EC_CHARSET);

include_once('../languages/' . $lang . '/calendar.php');

foreach ($_LANG['calendar_lang'] as $cal_key => $cal_data) {
    echo 'var ' . $cal_key . " = \"" . $cal_data . "\";\r\n";
}

include_once('./calendar/calendar.js');
