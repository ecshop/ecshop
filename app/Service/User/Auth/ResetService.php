<?php

namespace App\Service\User\Auth;

/**
 * Class ResetService
 * @package App\Service\User\Auth
 */
class ResetService
{

    /**
     *  将指定user_id的密码修改为new_password。可以通过旧密码和验证字串验证修改。
     *
     * @access  public
     * @param int $user_id 用户ID
     * @param string $new_password 用户新密码
     * @param string $old_password 用户旧密码
     * @param string $code 验证码（md5($user_id . md5($password))）
     *
     * @return  boolen  $bool
     */
    public function edit_password($user_id, $old_password, $new_password = '', $code = '')
    {
        if (empty($user_id)) {
            $GLOBALS['err']->add($GLOBALS['_LANG']['not_login']);
        }

        if ($GLOBALS['user']->edit_password($user_id, $old_password, $new_password, $code)) {
            return true;
        } else {
            $GLOBALS['err']->add($GLOBALS['_LANG']['edit_password_failure']);

            return false;
        }
    }
}
