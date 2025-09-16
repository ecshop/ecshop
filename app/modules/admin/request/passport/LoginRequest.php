<?php

declare(strict_types=1);

namespace app\modules\admin\request\passport;

use think\Validate;

class LoginRequest extends Validate
{
    /**
     * @var array
     */
    protected $rule = [
        'passport' => 'require',
        'password' => 'require',
        'captcha|验证码' => 'require|captcha',
    ];

    /**
     * @var array
     */
    protected $message = [
        'passport.require' => '登录用户名必须',
        'password.require' => '登录密码必须',
        'captcha.require' => '图片验证码必须',
    ];
}
