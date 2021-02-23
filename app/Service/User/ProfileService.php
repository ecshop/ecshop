<?php

namespace App\Service\User;

/**
 * Class UserService
 * @package App\Service\User
 */
class ProfileService
{

    /**
     * 取得用户信息
     * @param int $user_id 用户id
     * @return  array   用户信息
     */
    public function user_info($user_id)
    {
        $sql = "SELECT * FROM " . table('users') .
            " WHERE user_id = '$user_id'";
        $user = $GLOBALS['db']->getRow($sql);

        unset($user['question']);
        unset($user['answer']);

        /* 格式化帐户余额 */
        if ($user) {
//        if ($user['user_money'] < 0)
//        {
//            $user['user_money'] = 0;
//        }
            $user['formated_user_money'] = price_format($user['user_money'], false);
            $user['formated_frozen_money'] = price_format($user['frozen_money'], false);
        }

        return $user;
    }

    /**
     * 修改用户
     * @param int $user_id 订单id
     * @param array $user key => value
     * @return  bool
     */
    public function update_user($user_id, $user)
    {
        return $GLOBALS['db']->autoExecute(
            table('users'),
            $user,
            'UPDATE',
            "user_id = '$user_id'"
        );
    }


    /**
     * 修改个人资料（Email, 性别，生日)
     *
     * @access  public
     * @param array $profile array_keys(user_id int, email string, sex int, birthday string);
     *
     * @return  boolen      $bool
     */
    public function edit_profile($profile)
    {
        if (empty($profile['user_id'])) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['not_login']);

            return false;
        }

        $cfg = array();
        $cfg['username'] = $GLOBALS['db']->getOne("SELECT user_name FROM " . table('users') . " WHERE user_id='" . $profile['user_id'] . "'");
        if (isset($profile['sex'])) {
            $cfg['gender'] = intval($profile['sex']);
        }
        if (!empty($profile['email'])) {
            if (!is_email($profile['email'])) {
                $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['email_invalid'], $profile['email']));

                return false;
            }
            $cfg['email'] = $profile['email'];
        }
        if (!empty($profile['birthday'])) {
            $cfg['bday'] = $profile['birthday'];
        }


        if (!$GLOBALS['user']->edit_user($cfg)) {
            if ($GLOBALS['user']->error == ERR_EMAIL_EXISTS) {
                $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['email_exist'], $profile['email']));
            } else {
                $GLOBALS['err']->add('DB ERROR!');
            }

            return false;
        }

        /* 过滤非法的键值 */
        $other_key_array = array('msn', 'qq', 'office_phone', 'home_phone', 'mobile_phone');
        foreach ($profile['other'] as $key => $val) {
            //删除非法key值
            if (!in_array($key, $other_key_array)) {
                unset($profile['other'][$key]);
            } else {
                $profile['other'][$key] = htmlspecialchars(trim($val)); //防止用户输入javascript代码
            }
        }
        /* 修改在其他资料 */
        if (!empty($profile['other'])) {
            $GLOBALS['db']->autoExecute(table('users'), $profile['other'], 'UPDATE', "user_id = '$profile[user_id]'");
        }

        return true;
    }

    /**
     * 获取用户帐号信息
     *
     * @access  public
     * @param int $user_id 用户user_id
     *
     * @return void
     */
    public function get_profile($user_id)
    {


        /* 会员帐号信息 */
        $info = array();
        $infos = array();
        $sql = "SELECT user_name, birthday, sex, question, answer, rank_points, pay_points,user_money, user_rank," .
            " msn, qq, office_phone, home_phone, mobile_phone, passwd_question, passwd_answer " .
            "FROM " . table('users') . " WHERE user_id = '$user_id'";
        $infos = $GLOBALS['db']->getRow($sql);
        $infos['user_name'] = addslashes($infos['user_name']);

        $row = $user->get_profile_by_name($infos['user_name']); //获取用户帐号信息
        $_SESSION['email'] = $row['email'];    //注册SESSION

        /* 会员等级 */
        if ($infos['user_rank'] > 0) {
            $sql = "SELECT rank_id, rank_name, discount FROM " . table('user_rank') .
                " WHERE rank_id = '$infos[user_rank]'";
        } else {
            $sql = "SELECT rank_id, rank_name, discount, min_points" .
                " FROM " . table('user_rank') .
                " WHERE min_points<= " . intval($infos['rank_points']) . " ORDER BY min_points DESC";
        }

        if ($row = $GLOBALS['db']->getRow($sql)) {
            $info['rank_name'] = $row['rank_name'];
        } else {
            $info['rank_name'] = $GLOBALS['_LANG']['undifine_rank'];
        }

        $cur_date = date('Y-m-d H:i:s');

        /* 会员红包 */
        $bonus = array();
        $sql = "SELECT type_name, type_money " .
            "FROM " . table('bonus_type') . " AS t1, " . table('user_bonus') . " AS t2 " .
            "WHERE t1.type_id = t2.bonus_type_id AND t2.user_id = '$user_id' AND t1.use_start_date <= '$cur_date' " .
            "AND t1.use_end_date > '$cur_date' AND t2.order_id = 0";
        $bonus = $GLOBALS['db']->getAll($sql);
        if ($bonus) {
            for ($i = 0, $count = count($bonus); $i < $count; $i++) {
                $bonus[$i]['type_money'] = price_format($bonus[$i]['type_money'], false);
            }
        }

        $info['discount'] = $_SESSION['discount'] * 100 . "%";
        $info['email'] = $_SESSION['email'];
        $info['user_name'] = $_SESSION['user_name'];
        $info['rank_points'] = isset($infos['rank_points']) ? $infos['rank_points'] : '';
        $info['pay_points'] = isset($infos['pay_points']) ? $infos['pay_points'] : 0;
        $info['user_money'] = isset($infos['user_money']) ? $infos['user_money'] : 0;
        $info['sex'] = isset($infos['sex']) ? $infos['sex'] : 0;
        $info['birthday'] = isset($infos['birthday']) ? $infos['birthday'] : '';
        $info['question'] = isset($infos['question']) ? htmlspecialchars($infos['question']) : '';

        $info['user_money'] = price_format($info['user_money'], false);
        $info['pay_points'] = $info['pay_points'] . config('shop.integral_name');
        $info['bonus'] = $bonus;
        $info['qq'] = $infos['qq'];
        $info['msn'] = $infos['msn'];
        $info['office_phone'] = $infos['office_phone'];
        $info['home_phone'] = $infos['home_phone'];
        $info['mobile_phone'] = $infos['mobile_phone'];
        $info['passwd_question'] = $infos['passwd_question'];
        $info['passwd_answer'] = $infos['passwd_answer'];

        return $info;
    }

}
