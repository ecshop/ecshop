<?php

define('IN_ECS', true);

require dirname(__FILE__).'/includes/init.php';

if (! DEBUG_MODE) {
    $smarty->caching = true;
}

// $charset = empty($_GET['charset']) ? 'UTF8' : $_GET['charset'];
$display_mode = empty($_GET['display_mode']) ? 'javascript' : $_GET['display_mode'];

if ($display_mode == 'javascript') {
    $charset_array = ['UTF8', 'GBK', 'gbk', 'utf8', 'GB2312', 'gb2312'];
    if (! in_array($charset, $charset_array)) {
        $charset = 'UTF8';
    }
    header('content-type: application/x-javascript; charset='.($charset == 'UTF8' ? 'utf-8' : $charset));
}

/* ------------------------------------------------------ */
// -- 判断是否存在缓存，如果存在则调用缓存，反之读取相应内容
/* ------------------------------------------------------ */
/* 缓存编号 */
$cache_id = sprintf('%X', crc32($_SERVER['QUERY_STRING']));

$goodsid = intval($_GET['gid']);
$userid = intval($_GET['u']);
$type = intval($_GET['type']);

$tpl = ROOT_PATH.DATA_DIR.'/affiliate.html';
if (! $smarty->is_cached($tpl, $cache_id)) {
    $time = gmtime();
    /* 根据参数生成查询语句 */

    $goods_url = $ecs->url()."goods.php?u=$userid&id=";
    $goods = get_goods_info($goodsid);
    $goods['goods_thumb'] = (strpos($goods['goods_thumb'], 'http://') === false && strpos($goods['goods_thumb'], 'https://') === false) ? $ecs->url().$goods['goods_thumb'] : $goods['goods_thumb'];
    $goods['goods_img'] = (strpos($goods['goods_img'], 'http://') === false && strpos($goods['goods_img'], 'https://') === false) ? $ecs->url().$goods['goods_img'] : $goods['goods_img'];
    $goods['shop_price'] = price_format($goods['shop_price']);

    /*if ($charset != 'UTF8')
    {
        $goods['goods_name']  = ecs_iconv('UTF8', $charset, htmlentities($goods['goods_name'], ENT_QUOTES, 'UTF-8'));
        $goods['shop_price'] = ecs_iconv('UTF8', $charset, $goods['shop_price']);
    }*/

    $smarty->assign('goods', $goods);
    $smarty->assign('userid', $userid);
    $smarty->assign('type', $type);

    $smarty->assign('url', $ecs->url());
    $smarty->assign('goods_url', $goods_url);
}
$output = $smarty->fetch($tpl, $cache_id);
$output = str_replace("\r", '', $output);
$output = str_replace("\n", '', $output);

if ($display_mode == 'javascript') {
    echo "document.write('$output');";
} elseif ($display_mode == 'iframe') {
    echo $output;
}
