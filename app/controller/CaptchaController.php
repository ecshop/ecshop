<?php

namespace app\controller;

/**
 * 生成验证码
 */
class CaptchaController extends InitController
{
    public function indexAction()
    {
        $img = new captcha(ROOT_PATH . 'data/captcha/', config('shop.captcha_width'), config('shop.captcha_height'));
        @ob_end_clean(); //清除之前出现的多余输入
        if (isset($_REQUEST['is_login'])) {
            $img->session_word = 'captcha_login';
        }
        $img->generate_image();
    }
}
