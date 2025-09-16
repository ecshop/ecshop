<?php

declare(strict_types=1);

namespace app\api\common\controller;

use OpenApi\Attributes as OA;
use think\response\Json;

class SmsController extends BaseController
{
    #[OA\Post(path: 'sms/send', summary: '短信发送接口', tags: ['公共模块'])]
    public function send(): Json
    {
        return $this->success('短信发送接口 ok');
    }
}
