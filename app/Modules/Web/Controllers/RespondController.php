<?php

declare(strict_types=1);

namespace App\Modules\Web\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RespondController extends BaseController
{
    public function __invoke(Request $request)
    {

use App\Plugins\Payment\PaymentFactory;

define('IN_ECS', true);

require dirname(__FILE__).'/includes/init.php';
require ROOT_PATH.'includes/lib_payment.php';
require ROOT_PATH.'includes/lib_order.php';
/* 支付方式代码 */
$pay_code = ! empty($_REQUEST['code']) ? trim($_REQUEST['code']) : '';

/* 参数是否为空 */
if (empty($pay_code)) {
    $msg = $_LANG['pay_not_exist'];
} else {
    /* 检查code里面有没有问号 */
    if (strpos($pay_code, '?') !== false) {
        $arr1 = explode('?', $pay_code);
        $arr2 = explode('=', $arr1[1]);

        $_REQUEST['code'] = $arr1[0];
        $_REQUEST[$arr2[0]] = $arr2[1];
        $_GET['code'] = $arr1[0];
        $_GET[$arr2[0]] = $arr2[1];
        $pay_code = $arr1[0];
    }

    /* 判断是否启用 */
    $sql = 'SELECT COUNT(*) FROM '.$ecs->table('payment')." WHERE pay_code = '$pay_code' AND enabled = 1";
    if ($db->getOne($sql) == 0) {
        $msg = $_LANG['pay_disabled'];
    } elseif (PaymentFactory::isRegistered($pay_code)) {
        $payment = PaymentFactory::create($pay_code);
        $msg = (@$payment->respond()) ? $_LANG['pay_success'] : $_LANG['pay_fail'];
    } else {
        $msg = $_LANG['pay_not_exist'];
    }
}

assign_template();
$position = assign_ur_here();
$smarty->assign('page_title', $position['title']);   // 页面标题
$smarty->assign('ur_here', $position['ur_here']); // 当前位置
$smarty->assign('page_title', $position['title']);   // 页面标题
$smarty->assign('ur_here', $position['ur_here']); // 当前位置
$smarty->assign('helps', get_shop_help());      // 网店帮助

$smarty->assign('message', $msg);
$smarty->assign('shop_url', $ecs->url());

$smarty->display('respond.dwt');

}
}
