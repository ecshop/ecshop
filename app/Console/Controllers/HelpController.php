<?php

namespace App\Console\Controllers;

/**
 * 帮助信息接口
 */
class HelpController extends InitController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $get_keyword = trim($_GET['al']); // 获取关键字
        header("location:http://help.ecshop.com/do.php?k=" . $get_keyword . "&v=" . config('shop.ecs_version') . "&l=" . config('shop.lang') . "&c=" . EC_CHARSET);
    }
}
