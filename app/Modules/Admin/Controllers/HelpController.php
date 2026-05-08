<?php

declare(strict_types=1);

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpController extends BaseController
{
    public function __invoke(Request $request)
    {

define('IN_ECS', true);
require dirname(__FILE__).'/includes/init.php';

$get_keyword = trim($_GET['al']); // 获取关键字
header('location:http://help.ecshop.com/do.php?k='.$get_keyword.'&v='.$_CFG['ecs_version'].'&l='.$_CFG['lang'].'&c='.EC_CHARSET);

}
}
