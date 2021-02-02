<?php

namespace app\controller;

/**
 * 留言板
 */
class MessageController extends InitController
{
    public function initialize()
    {
        if (empty(config('shop.message_board'))) {
            return $this->show_message($_LANG['message_board_close']);
        }
    }

    public function act_add_messageAction()
    {

        /* 验证码防止灌水刷屏 */
        if ((intval(config('shop.captcha')) & CAPTCHA_MESSAGE) && gd_version() > 0) {
            $validator = new captcha();
            if (!$validator->check_word($_POST['captcha'])) {
                return $this->show_message($_LANG['invalid_captcha']);
            }
        } else {
            /* 没有验证码时，用时间来限制机器人发帖或恶意发评论 */
            if (!isset($_SESSION['send_time'])) {
                $_SESSION['send_time'] = 0;
            }

            $cur_time = gmtime();
            if (($cur_time - $_SESSION['send_time']) < 30) { // 小于30秒禁止发评论
                return $this->show_message($_LANG['cmt_spam_warning']);
            }
        }
        $user_name = '';
        if (empty($_POST['anonymous']) && !empty($_SESSION['user_name'])) {
            $user_name = $_SESSION['user_name'];
        } elseif (!empty($_POST['anonymous']) && !isset($_POST['user_name'])) {
            $user_name = $_LANG['anonymous'];
        } elseif (empty($_POST['user_name'])) {
            $user_name = $_LANG['anonymous'];
        } else {
            $user_name = htmlspecialchars(trim($_POST['user_name']));
        }

        $user_id = !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        $message = array(
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => isset($_POST['user_email']) ? htmlspecialchars(trim($_POST['user_email'])) : '',
            'msg_type' => isset($_POST['msg_type']) ? intval($_POST['msg_type']) : 0,
            'msg_title' => isset($_POST['msg_title']) ? trim($_POST['msg_title']) : '',
            'msg_content' => isset($_POST['msg_content']) ? trim($_POST['msg_content']) : '',
            'order_id' => 0,
            'msg_area' => 1,
            'upload' => array()
        );

        if (add_message($message)) {
            if (intval(config('shop.captcha')) & CAPTCHA_MESSAGE) {
                unset($_SESSION[$validator->session_word]);
            } else {
                $_SESSION['send_time'] = $cur_time;
            }
            $msg_info = config('shop.message_check') ? $_LANG['message_submit_wait'] : $_LANG['message_submit_done'];
            return $this->show_message($msg_info, $_LANG['message_list_lnk'], 'message.php');
        } else {
            $this->assign_template();
            return $err->show($_LANG['message_list_lnk'], 'message.php');
        }
    }

    public function defaultAction()
    {
        $this->assign_template();
        $position = $this->assign_ur_here(0, $_LANG['message_board']);
        $this->assign('page_title', $position['title']);    // 页面标题
        $this->assign('ur_here', $position['ur_here']);  // 当前位置
        $this->assign('helps', get_shop_help());       // 网店帮助

        $this->assign('categories', get_categories_tree()); // 分类树
        $this->assign('top_goods', get_top10());           // 销售排行
        $this->assign('cat_list', cat_list(0, 0, true, 2, false));
        $this->assign('brand_list', get_brand_list());
        $this->assign('promotion_info', get_promotion_info());

        $this->assign('enabled_mes_captcha', (intval(config('shop.captcha')) & CAPTCHA_MESSAGE));

        $sql = "SELECT COUNT(*) FROM " . table('comment') . " WHERE STATUS =1 AND comment_type =0 ";
        $record_count = $db->getOne($sql);
        $sql = "SELECT COUNT(*) FROM " . table('feedback') . " WHERE `msg_area`='1' AND `msg_status` = '1' ";
        $record_count += $db->getOne($sql);

        /* 获取留言的数量 */
        $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
        $pagesize = get_library_number('message_list', 'message_board');
        $pager = get_pager('message.php', array(), $record_count, $page, $pagesize);
        $msg_lists = get_msg_list($pagesize, $pager['start']);
        $this->assign_dynamic('message_board');
        $this->assign('rand', mt_rand());
        $this->assign('msg_lists', $msg_lists);
        $this->assign('pager', $pager);
        return $this->display('message_board.dwt');
    }

    /**
     * 获取留言的详细信息
     *
     * @param integer $num
     * @param integer $start
     *
     * @return  array
     */
    public function get_msg_list($num, $start)
    {
        /* 获取留言数据 */
        $msg = array();

        $sql = "(SELECT 'comment' AS tablename,   comment_id AS ID, content AS msg_content, null AS msg_title, add_time AS msg_time, id_value AS id_value, comment_rank AS comment_rank, null AS message_img, user_name AS user_name, '6' AS msg_type ";
        $sql .= " FROM " . table('comment');
        $sql .= "WHERE STATUS =1 AND comment_type =0) ";
        $sql .= " UNION ";
        $sql .= "(SELECT 'feedback' AS tablename, msg_id AS ID, msg_content AS msg_content, msg_title AS msg_title, msg_time AS msg_time, null AS id_value, null AS comment_rank, message_img AS message_img, user_name AS user_name, msg_type AS msg_type ";
        $sql .= " FROM " . table('feedback');
        $sql .= " WHERE `msg_area`='1' AND `msg_status` = '1') ";
        $sql .= " ORDER BY msg_time DESC ";

        $res = $GLOBALS['db']->selectLimit($sql, $num, $start);

        while ($rows = $GLOBALS['db']->fetchRow($res)) {
            for ($i = 0; $i < count($rows); $i++) {
                $msg[$rows['msg_time']]['user_name'] = htmlspecialchars($rows['user_name']);
                $msg[$rows['msg_time']]['msg_content'] = str_replace('\r\n', '<br />', htmlspecialchars($rows['msg_content']));
                $msg[$rows['msg_time']]['msg_content'] = str_replace('\n', '<br />', $msg[$rows['msg_time']]['msg_content']);
                $msg[$rows['msg_time']]['msg_time'] = local_date(config('shop.time_format'), $rows['msg_time']);
                $msg[$rows['msg_time']]['msg_type'] = $GLOBALS['_LANG']['message_type'][$rows['msg_type']];
                $msg[$rows['msg_time']]['msg_title'] = nl2br(htmlspecialchars($rows['msg_title']));
                $msg[$rows['msg_time']]['message_img'] = $rows['message_img'];
                $msg[$rows['msg_time']]['tablename'] = $rows['tablename'];

                if (isset($rows['order_id'])) {
                    $msg[$rows['msg_time']]['order_id'] = $rows['order_id'];
                }
                $msg[$rows['msg_time']]['comment_rank'] = $rows['comment_rank'];
                $msg[$rows['msg_time']]['id_value'] = $rows['id_value'];

                /*如果id_value为true为商品评论,根据商品id取出商品名称*/
                if ($rows['id_value']) {
                    $sql_goods = "SELECT goods_name FROM " . table('goods');
                    $sql_goods .= "WHERE goods_id= " . $rows['id_value'];
                    $goods_res = $GLOBALS['db']->getRow($sql_goods);
                    $msg[$rows['msg_time']]['goods_name'] = $goods_res['goods_name'];
                    $msg[$rows['msg_time']]['goods_url'] = build_uri('goods', array('gid' => $rows['id_value']), $goods_res['goods_name']);
                }
            }

            $msg[$rows['msg_time']]['tablename'] = $rows['tablename'];
            $id = $rows['ID'];
            $reply = array();
            if (isset($msg[$rows['msg_time']]['tablename'])) {
                $table_name = $msg[$rows['msg_time']]['tablename'];

                if ($table_name == 'feedback') {
                    $sql = "SELECT user_name AS re_name, user_email AS re_email, msg_time AS re_time, msg_content AS re_content ,parent_id" .
                        " FROM " . table('feedback') .
                        " WHERE parent_id = '" . $id . "'";
                } else {
                    $sql = 'SELECT user_name AS re_name, email AS re_email, add_time AS re_time, content AS re_content ,parent_id
                FROM ' . table('comment') .
                        " WHERE parent_id = $id ";
                }
                $reply = $GLOBALS['db']->getRow($sql);
                if ($reply) {
                    $msg[$rows['msg_time']]['re_name'] = $reply['re_name'];
                    $msg[$rows['msg_time']]['re_email'] = $reply['re_email'];
                    $msg[$rows['msg_time']]['re_time'] = local_date(config('shop.time_format'), $reply['re_time']);
                    $msg[$rows['msg_time']]['re_content'] = nl2br(htmlspecialchars($reply['re_content']));
                }
            }
        }

        return $msg;
    }
}
