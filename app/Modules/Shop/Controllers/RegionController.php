<?php

declare(strict_types=1);

namespace App\Modules\Shop\Controllers;

use Illuminate\Contracts\Support\Renderable;

class RegionController extends BaseController
{
    public function index(): Renderable
    {

require ROOT_PATH.'includes/cls_json.php';

header('Content-type: text/html; charset='.EC_CHARSET);

$type = ! empty($_REQUEST['type']) ? intval($_REQUEST['type']) : 0;
$parent = ! empty($_REQUEST['parent']) ? intval($_REQUEST['parent']) : 0;

$arr['regions'] = get_regions($type, $parent);
$arr['type'] = $type;
$arr['target'] = ! empty($_REQUEST['target']) ? stripslashes(trim($_REQUEST['target'])) : '';
$arr['target'] = htmlspecialchars($arr['target']);

$json = new JSON;
echo $json->encode($arr);
    }
}
