<?php

namespace App\Service\User\Auth;

/**
 * Class ForgotService
 * @package App\Service\User\Auth
 */
class ForgotService
{
    /**
     *  会员找回密码时，对输入的用户名和邮件地址匹配
     *
     * @access  public
     * @param string $user_name 用户帐号
     * @param string $email 用户Email
     *
     * @return  boolen
     */
    public function check_userinfo($user_name, $email)
    {
        if (empty($user_name) || empty($email)) {
            return redirect("user.php?act=get_password");
        }

        /* 检测用户名和邮件地址是否匹配 */
        $user_info = $GLOBALS['user']->check_pwd_info($user_name, $email);
        if (!empty($user_info)) {
            return $user_info;
        } else {
            return false;
        }
    }

    /**
     *  用户进行密码找回操作时，发送一封确认邮件
     *
     * @access  public
     * @param string $uid 用户ID
     * @param string $user_name 用户帐号
     * @param string $email 用户Email
     * @param string $code key
     *
     * @return  boolen  $result;
     */
    public function send_pwd_email($uid, $user_name, $email, $code)
    {
        if (empty($uid) || empty($user_name) || empty($email) || empty($code)) {
            return redirect("user.php?act=get_password");
        }

        /* 设置重置邮件模板所需要的内容信息 */
        $template = get_mail_template('send_password');
        $reset_email = $GLOBALS['ecs']->url() . 'user.php?act=get_password&uid=' . $uid . '&code=' . $code;

        View::assign('user_name', $user_name);
        View::assign('reset_email', $reset_email);
        View::assign('shop_name', config('shop.shop_name'));
        View::assign('send_date', date('Y-m-d'));
        View::assign('sent_date', date('Y-m-d'));

        $content = $GLOBALS['smarty']->fetch('str:' . $template['template_content']);

        /* 发送确认重置密码的确认邮件 */
        if (send_mail($user_name, $email, $template['template_subject'], $content, $template['is_html'])) {
            return true;
        } else {
            return false;
        }
    }

}
