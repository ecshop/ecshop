<?php

namespace app\controller\admin;
/**
 * 帮助信息接口
 */
class HelpController extends InitController
{
    public function initialize()
    {
        parent::initialize();

    }

    public function index()
    {
        $get_keyword = trim($_GET['al']); // 获取关键字
        header("location:http://help.ecshop.com/do.php?k=" . $get_keyword . "&v=" . $_CFG['ecs_version'] . "&l=" . $_CFG['lang'] . "&c=" . EC_CHARSET);
    }

}
