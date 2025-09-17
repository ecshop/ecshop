<?php

declare(strict_types=1);

namespace app\api\common\controller;

use app\api\common\response\captcha\CaptchaImageResponse;
use app\support\captcha\Captcha;
use OpenApi\Attributes as OA;
use Ramsey\Uuid\Uuid;
use think\response\Json;

class CaptchaController extends BaseController
{
    #[OA\Post(path: 'captcha/image', summary: '图片验证码接口', tags: ['公共模块'])]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CaptchaImageResponse::class))]
    public function image(): Json
    {
        try {
            $captchaId = Uuid::uuid4()->toString();

            $captchaBundleService = new Captcha;
            $captchaImg = $captchaBundleService->create($captchaId);

            $response = new CaptchaImageResponse($captchaId, $captchaImg);

            return $this->success($response->toArray());
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}
