<?php

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require(ROOT_PATH . 'includes/cls_transport.php');
require(ROOT_PATH . 'includes/cls_json.php');

$data['api_ver'] = '1.0';
$data['version'] = VERSION;
$data['ecs_lang'] = $_CFG['lang'];
$data['release'] = RELEASE;
$data['charset'] = strtoupper(EC_CHARSET);
$data['certificate_id'] = $_CFG['certificate_id'];
$data['token'] = md5($_CFG['token']);
$data['certi'] = $_CFG['certi'];
$data['php_ver'] = PHP_VERSION;
$data['mysql_ver'] = $db->version();
$data['shop_url'] = urlencode($ecs->url());
$data['admin_url'] = urlencode($ecs->url() . ADMIN_PATH);
$data['sess_id'] = $GLOBALS['sess']->get_session_id();
$data['stamp'] = time();
$data['ent_id'] = $_CFG['ent_id'];
$data['ent_ac'] = $_CFG['ent_ac'];
$data['ent_sign'] = $_CFG['ent_sign'];
$data['ent_email'] = $_CFG['ent_email'];

$act = !empty($_REQUEST['act']) ? $_REQUEST['act'] : 'index';

$must = array('version', 'ecs_lang', 'charset', 'stamp', 'api_ver');

if ($act == 'default') {
    admin_priv('all');
    if (empty($_GET['act'])) {
        $act = 'index';
    } else {
        $query = '';
        $act = trim($_GET['act']);
        foreach ($_GET as $k => $v) {
            if (array_key_exists($k, $data)) {
                $query .= '&' . $k . '=' . $data[$k];
            }
        }
    }
    if (!empty($_GET['link'])) {
        $url = parse_url($_GET['link']);
        if (!empty($url['host'])) {
            ecs_header("Location: " . $url['scheme'] . "://" . $url['host'] . $url['path'] . "?" . $url['query'] . $query . "\n");
            exit();
        }
    }

    foreach ($must as $v) {
        $query .= '&' . $v . '=' . $data[$v];
    }
    ecs_header("Location: http://cloud.ecshop.com/api.php?act=" . $act . $query . "\n");
    exit();
}
