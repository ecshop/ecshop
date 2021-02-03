<?php

namespace App\Http\Controllers;

/**
 * RSS Feed 生成程序
 */
class FeedController extends InitController
{
    public function indexAction()
    {
        $ver = isset($_REQUEST['ver']) ? $_REQUEST['ver'] : '2.00';
        $cat = isset($_REQUEST['cat']) ? ' AND ' . get_children(intval($_REQUEST['cat'])) : '';
        $brd = isset($_REQUEST['brand']) ? ' AND g.brand_id=' . intval($_REQUEST['brand']) . ' ' : '';

        $uri = $ecs->url();

        $rss = new RSSBuilder(EC_CHARSET, $uri, htmlspecialchars(config('shop.shop_name')), htmlspecialchars(config('shop.shop_desc')), $uri . 'favicon.ico');
        $rss->addDCdata('', 'http://www.ecshop.com', date('r'));

        if (isset($_REQUEST['type'])) {
            if ($_REQUEST['type'] == 'group_buy') {
                $now = gmtime();
                $sql = 'SELECT act_id, act_name, act_desc, start_time ' .
                    "FROM " . table('goods_activity') .
                    "WHERE act_type = '" . GAT_GROUP_BUY . "' " .
                    "AND start_time <= '$now' AND is_finished < 3 ORDER BY start_time DESC";
                $res = $db->query($sql);

                if ($res !== false) {
                    while ($row = $db->fetchRow($res)) {
                        $item_url = build_uri('group_buy', array('gbid' => $row['act_id']), $row['act_name']);
                        $separator = (strpos($item_url, '?') === false) ? '?' : '&amp;';
                        $about = $uri . $item_url;
                        $title = htmlspecialchars($row['act_name']);
                        $link = $uri . $item_url . $separator . 'from=rss';
                        $desc = htmlspecialchars($row['act_desc']);
                        $subject = $_LANG['group_buy'];
                        $date = local_date('r', $row['start_time']);

                        $rss->addItem($about, $title, $link, $desc, $subject, $date);
                    }

                    $rss->outputRSS($ver);
                }
            } elseif ($_REQUEST['type'] == 'snatch') {
                $now = gmtime();
                $sql = 'SELECT act_id, act_name, act_desc, start_time ' .
                    "FROM " . table('goods_activity') .
                    "WHERE act_type = '" . GAT_SNATCH . "' " .
                    "AND start_time <= '$now' AND is_finished < 3 ORDER BY start_time DESC";
                $res = $db->query($sql);

                if ($res !== false) {
                    while ($row = $db->fetchRow($res)) {
                        $item_url = build_uri('snatch', array('sid' => $row['act_id']), $row['act_name']);
                        $separator = (strpos($item_url, '?') === false) ? '?' : '&amp;';
                        $about = $uri . $item_url;
                        $title = htmlspecialchars($row['act_name']);
                        $link = $uri . $item_url . $separator . 'from=rss';
                        $desc = htmlspecialchars($row['act_desc']);
                        $subject = $_LANG['snatch'];
                        $date = local_date('r', $row['start_time']);

                        $rss->addItem($about, $title, $link, $desc, $subject, $date);
                    }

                    $rss->outputRSS($ver);
                }
            } elseif ($_REQUEST['type'] == 'auction') {
                $now = gmtime();
                $sql = 'SELECT act_id, act_name, act_desc, start_time ' .
                    "FROM " . table('goods_activity') .
                    "WHERE act_type = '" . GAT_AUCTION . "' " .
                    "AND start_time <= '$now' AND is_finished < 3 ORDER BY start_time DESC";
                $res = $db->query($sql);

                if ($res !== false) {
                    while ($row = $db->fetchRow($res)) {
                        $item_url = build_uri('auction', array('auid' => $row['act_id']), $row['act_name']);
                        $separator = (strpos($item_url, '?') === false) ? '?' : '&amp;';
                        $about = $uri . $item_url;
                        $title = htmlspecialchars($row['act_name']);
                        $link = $uri . $item_url . $separator . 'from=rss';
                        $desc = htmlspecialchars($row['act_desc']);
                        $subject = $_LANG['auction'];
                        $date = local_date('r', $row['start_time']);

                        $rss->addItem($about, $title, $link, $desc, $subject, $date);
                    }

                    $rss->outputRSS($ver);
                }
            } elseif ($_REQUEST['type'] == 'exchange') {
                $sql = 'SELECT g.goods_id, g.goods_name, g.goods_brief, g.last_update ' .
                    "FROM " . table('exchange_goods') . " AS eg, " .
                    table('goods') . " AS g " .
                    "WHERE eg.goods_id = g.goods_id";
                $res = $db->query($sql);

                if ($res !== false) {
                    while ($row = $db->fetchRow($res)) {
                        $item_url = build_uri('exchange_goods', array('gid' => $row['goods_id']), $row['goods_name']);
                        $separator = (strpos($item_url, '?') === false) ? '?' : '&amp;';
                        $about = $uri . $item_url;
                        $title = htmlspecialchars($row['goods_name']);
                        $link = $uri . $item_url . $separator . 'from=rss';
                        $desc = htmlspecialchars($row['goods_brief']);
                        $subject = $_LANG['exchange'];
                        $date = local_date('r', $row['last_update']);

                        $rss->addItem($about, $title, $link, $desc, $subject, $date);
                    }

                    $rss->outputRSS($ver);
                }
            } elseif ($_REQUEST['type'] == 'activity') {
                $now = gmtime();
                $sql = 'SELECT act_id, act_name, start_time ' .
                    "FROM " . table('favourable_activity') .
                    " WHERE start_time <= '$now' AND end_time >= '$now'";
                $res = $db->query($sql);

                if ($res !== false) {
                    while ($row = $db->fetchRow($res)) {
                        $item_url = 'activity.php';
                        $separator = (strpos($item_url, '?') === false) ? '?' : '&amp;';
                        $about = $uri . $item_url;
                        $title = htmlspecialchars($row['act_name']);
                        $link = $uri . $item_url . $separator . 'from=rss';
                        $desc = '';
                        $subject = $_LANG['favourable'];
                        $date = local_date('r', $row['start_time']);

                        $rss->addItem($about, $title, $link, $desc, $subject, $date);
                    }

                    $rss->outputRSS($ver);
                }
            } elseif ($_REQUEST['type'] == 'package') {
                $now = gmtime();
                $sql = 'SELECT act_id, act_name, act_desc, start_time ' .
                    "FROM " . table('goods_activity') .
                    "WHERE act_type = '" . GAT_PACKAGE . "' " .
                    "AND start_time <= '$now' AND is_finished < 3 ORDER BY start_time DESC";
                $res = $db->query($sql);

                if ($res !== false) {
                    while ($row = $db->fetchRow($res)) {
                        $item_url = 'package.php';
                        $separator = (strpos($item_url, '?') === false) ? '?' : '&amp;';
                        $about = $uri . $item_url;
                        $title = htmlspecialchars($row['act_name']);
                        $link = $uri . $item_url . $separator . 'from=rss';
                        $desc = htmlspecialchars($row['act_desc']);
                        $subject = $_LANG['remark_package'];
                        $date = local_date('r', $row['start_time']);

                        $rss->addItem($about, $title, $link, $desc, $subject, $date);
                    }

                    $rss->outputRSS($ver);
                }
            } elseif (substr($_REQUEST['type'], 0, 11) == 'article_cat') {
                $sql = 'SELECT article_id, title, author, add_time' .
                    ' FROM ' . table('article') .
                    ' WHERE is_open = 1 AND ' . get_article_children(substr($_REQUEST['type'], 11)) .
                    ' ORDER BY add_time DESC LIMIT ' . config('shop.article_page_size');
                $res = $db->query($sql);

                if ($res !== false) {
                    while ($row = $db->fetchRow($res)) {
                        $item_url = build_uri('article', array('aid' => $row['article_id']), $row['title']);
                        $separator = (strpos($item_url, '?') === false) ? '?' : '&amp;';
                        $about = $uri . $item_url;
                        $title = htmlspecialchars($row['title']);
                        $link = $uri . $item_url . $separator . 'from=rss';
                        $desc = '';
                        $subject = htmlspecialchars($row['author']);
                        $date = local_date('r', $row['add_time']);

                        $rss->addItem($about, $title, $link, $desc, $subject, $date);
                    }

                    $rss->outputRSS($ver);
                }
            }
        } else {
            $in_cat = $cat > 0 ? ' AND ' . get_children($cat) : '';

            $sql = 'SELECT c.cat_name, g.goods_id, g.goods_name, g.goods_brief, g.last_update ' .
                'FROM ' . table('category') . ' AS c, ' . table('goods') . ' AS g ' .
                'WHERE c.cat_id = g.cat_id AND g.is_delete = 0 AND g.is_alone_sale = 1 ' . $brd . $cat .
                'ORDER BY g.last_update DESC';
            $res = $db->query($sql);

            if ($res !== false) {
                while ($row = $db->fetchRow($res)) {
                    $item_url = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
                    $separator = (strpos($item_url, '?') === false) ? '?' : '&amp;';
                    $about = $uri . $item_url;
                    $title = htmlspecialchars($row['goods_name']);
                    $link = $uri . $item_url . $separator . 'from=rss';
                    $desc = htmlspecialchars($row['goods_brief']);
                    $subject = htmlspecialchars($row['cat_name']);
                    $date = local_date('r', $row['last_update']);

                    $rss->addItem($about, $title, $link, $desc, $subject, $date);
                }

                $rss->outputRSS($ver);
            }
        }
    }
}
