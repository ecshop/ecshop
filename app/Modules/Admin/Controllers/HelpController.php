<?php

declare(strict_types=1);

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

class HelpController extends BaseController
{
    public function __invoke(Request $request)
    {

        $get_keyword = trim($_GET['al']); // 获取关键字
        header('location:http://help.ecshop.com/do.php?k='.$get_keyword.'&v='.$_CFG['ecs_version'].'&l='.$_CFG['lang'].'&c='.EC_CHARSET);

    }
}
