<?php

declare(strict_types=1);

namespace App\Modules\Admin\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Juling\Foundation\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLoginForm(): Renderable
    {
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');

        if ((intval($_CFG['captcha']) & CAPTCHA_ADMIN) && gd_version() > 0) {
            $this->assign('gd_version', gd_version());
            $this->assign('random', mt_rand());
        }

        return $this->display('login.htm');

        return view('admin::auth.login');
    }

    public function login(): JsonResponse
    {
        if (intval($_CFG['captcha']) & CAPTCHA_ADMIN) {
            include_once ROOT_PATH.'includes/cls_captcha.php';

            /* 检查验证码是否正确 */
            $validator = new captcha;
            if (! empty($_POST['captcha']) && ! $validator->check_word($_POST['captcha'])) {
                sys_msg($_LANG['captcha_error'], 1);
            }
        }

        $_POST['username'] = isset($_POST['username']) ? trim($_POST['username']) : '';
        $_POST['password'] = isset($_POST['password']) ? trim($_POST['password']) : '';

        $sql = 'SELECT `ec_salt` FROM '.$ecs->table('admin_user')."WHERE user_name = '".$_POST['username']."'";
        $ec_salt = $db->getOne($sql);
        if (! empty($ec_salt)) {
            /* 检查密码是否正确 */
            $sql = 'SELECT user_id, user_name, password, add_time, action_list, last_login,suppliers_id,ec_salt'.
                ' FROM '.$ecs->table('admin_user').
                " WHERE user_name = '".$_POST['username']."' AND password = '".md5(md5($_POST['password']).$ec_salt)."'";
        } else {
            /* 检查密码是否正确 */
            $sql = 'SELECT user_id, user_name, password, add_time, action_list, last_login,suppliers_id,ec_salt'.
                ' FROM '.$ecs->table('admin_user').
                " WHERE user_name = '".$_POST['username']."' AND password = '".md5($_POST['password'])."'";
        }
        $row = $db->getRow($sql);

        if ($row) {
            // 检查是否为供货商的管理员 所属供货商是否有效
            if (! empty($row['suppliers_id'])) {
                $supplier_is_check = suppliers_list_info(' is_check = 1 AND suppliers_id = '.$row['suppliers_id']);
                if (empty($supplier_is_check)) {
                    sys_msg($_LANG['login_disable'], 1);
                }
            }

            // 登录成功
            set_admin_session($row['user_id'], $row['user_name'], $row['action_list'], $row['last_login']);
            $_SESSION['suppliers_id'] = $row['suppliers_id'];
            if (empty($row['ec_salt'])) {
                $ec_salt = rand(1, 9999);
                $new_possword = md5(md5($_POST['password']).$ec_salt);
                $db->query('UPDATE '.$ecs->table('admin_user').
                    " SET ec_salt='".$ec_salt."', password='".$new_possword."'".
                    " WHERE user_id='$_SESSION[admin_id]'");
            }

            if ($row['action_list'] == 'all' && empty($row['last_login'])) {
                $_SESSION['shop_guide'] = true;
            }

            // 更新最后登录时间和IP
            $db->query('UPDATE '.$ecs->table('admin_user').
                " SET last_login='".gmtime()."', last_ip='".real_ip()."'".
                " WHERE user_id='$_SESSION[admin_id]'");

            if (isset($_POST['remember'])) {
                $time = gmtime() + 3600 * 24 * 365;
                setcookie('ECSCP[admin_id]', $row['user_id'], $time, null, null, null, true);
                setcookie('ECSCP[admin_pass]', md5($row['password'].$_CFG['hash_code'].$row['add_time']), $time, null, null, null, true);
            }

            // 清除购物车中过期的数据
            $this->clear_cart();

            ecs_header("Location: ./index.php\n");

            exit;
        } else {
            sys_msg($_LANG['login_faild'], 1);
        }

        return response()->json([]);
    }

    /* 填写管理员帐号和email页面 */
    public function showForgetForm(): Renderable
    {
        $this->assign('form_act', 'forget_pwd');
        $this->assign('ur_here', $_LANG['get_newpassword']);

        assign_query_info();

        return $this->display('get_pwd.htm');
    }

    /* 发送找回密码确认邮件 */
    public function forget()
    {
        $admin_username = ! empty($_POST['user_name']) ? trim($_POST['user_name']) : '';
        $admin_email = ! empty($_POST['email']) ? trim($_POST['email']) : '';

        if (empty($admin_username) || empty($admin_email)) {
            ecs_header("Location: privilege.php?act=login\n");
            exit;
        }

        /* 管理员用户名和邮件地址是否匹配，并取得原密码 */
        $sql = 'SELECT user_id, password, add_time FROM '.$ecs->table('admin_user').
            " WHERE user_name = '$admin_username' AND email = '$admin_email'";
        $admin_info = $db->getRow($sql);

        if (! empty($admin_info)) {
            /* 生成验证的code */
            $admin_id = $admin_info['user_id'];
            $code = md5($admin_id.$admin_info['password'].$admin_info['add_time']);

            /* 设置重置邮件模板所需要的内容信息 */
            $template = get_mail_template('send_password');
            $reset_email = $ecs->url().ADMIN_PATH.'/get_password.php?act=reset_pwd&uid='.$admin_id.'&code='.$code;

            $this->assign('user_name', $admin_username);
            $this->assign('reset_email', $reset_email);
            $this->assign('shop_name', $_CFG['shop_name']);
            $this->assign('send_date', local_date($_CFG['date_format']));
            $this->assign('sent_date', local_date($_CFG['date_format']));

            $content = $smarty->fetch('str:'.$template['template_content']);

            /* 发送确认重置密码的确认邮件 */
            if (send_mail(
                $admin_username,
                $admin_email,
                $template['template_subject'],
                $content,
                $template['is_html']
            )) {
                // 提示信息
                $link[0]['text'] = $_LANG['back'];
                $link[0]['href'] = 'privilege.php?act=login';

                sys_msg($_LANG['send_success'].$admin_email, 0, $link);
            } else {
                sys_msg($_LANG['send_mail_error'], 1);
            }
        } else {
            /* 提示信息 */
            sys_msg($_LANG['email_username_error'], 1);
        }
    }

    /* 验证从邮件地址过来的链接 */
    public function showResetForm(): Renderable
    {
        $code = ! empty($_GET['code']) ? trim($_GET['code']) : '';
        $adminid = ! empty($_GET['uid']) ? intval($_GET['uid']) : 0;

        if ($adminid == 0 || empty($code)) {
            ecs_header("Location: privilege.php?act=login\n");
            exit;
        }

        /* 以用户的原密码，与code的值匹配 */
        $sql = 'SELECT password FROM '.$ecs->table('admin_user')." WHERE user_id = '$adminid'";
        $password = $db->getOne($sql);

        if (md5($adminid.$password) != $code) {
            // 此链接不合法
            $link[0]['text'] = $_LANG['back'];
            $link[0]['href'] = 'privilege.php?act=login';

            sys_msg($_LANG['code_param_error'], 0, $link);
        } else {
            $this->assign('adminid', $adminid);
            $this->assign('code', $code);
            $this->assign('form_act', 'reset_pwd');
        }

        $this->assign('ur_here', $_LANG['get_newpassword']);

        assign_query_info();

        return $this->display('get_pwd.htm');
    }

    /* 验证新密码，更新管理员密码 */
    public function reset()
    {
        $new_password = isset($_POST['password']) ? trim($_POST['password']) : '';
        $adminid = isset($_POST['adminid']) ? intval($_POST['adminid']) : 0;
        $code = isset($_POST['code']) ? trim($_POST['code']) : '';

        if (empty($new_password) || empty($code) || $adminid == 0) {
            ecs_header("Location: privilege.php?act=login\n");
            exit;
        }

        /* 以用户的原密码，与code的值匹配 */
        $sql = 'SELECT password, add_time FROM '.$ecs->table('admin_user')." WHERE user_id = '$adminid'";
        $au = $db->getRow($sql);

        if (md5($adminid.$au['password'].$au['add_time']) != $code) {
            // 此链接不合法
            $link[0]['text'] = $_LANG['back'];
            $link[0]['href'] = 'privilege.php?act=login';

            sys_msg($_LANG['code_param_error'], 0, $link);
        }

        // 更新管理员的密码
        $ec_salt = rand(1, 9999);
        $sql = 'UPDATE '.$ecs->table('admin_user')."SET password = '".md5(md5($new_password).$ec_salt)."',`ec_salt`='$ec_salt' ".
            "WHERE user_id = '$adminid'";
        $result = $db->query($sql);
        if ($result) {
            $link[0]['text'] = $_LANG['login_now'];
            $link[0]['href'] = 'privilege.php?act=login';

            sys_msg($_LANG['update_pwd_success'], 0, $link);
        } else {
            sys_msg($_LANG['update_pwd_failed'], 1);
        }
    }
}
