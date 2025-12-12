<?php

declare(strict_types=1);

namespace App\Modules\Shop\Controllers;

use Illuminate\Contracts\Support\Renderable;

class CaptchaController extends BaseController
{
    public function index(): Renderable
    {
        require ROOT_PATH.'includes/cls_captcha.php';

        $img = new captcha(ROOT_PATH.'data/captcha/', $_CFG['captcha_width'], $_CFG['captcha_height']);
        @ob_end_clean(); // 清除之前出现的多余输入
        if (isset($_REQUEST['is_login'])) {
            $img->session_word = 'captcha_login';
        }
        $img->generate_image();
    }
}
