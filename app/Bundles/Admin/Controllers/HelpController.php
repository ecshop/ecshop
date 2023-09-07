<?php

declare(strict_types=1);

namespace App\Bundles\Admin\Controllers;

class HelpController extends BaseController
{
    public function index()
    {

    }





$get_keyword = trim($_GET['al']); // 获取关键字
header("location:http://help.ecshop.com/do.php?k=" . $get_keyword . "&v=" . $_CFG['ecs_version'] . "&l=" . $_CFG['lang'] . "&c=" . EC_CHARSET);

}
