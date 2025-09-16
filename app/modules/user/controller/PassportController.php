<?php

declare(strict_types=1);

namespace app\modules\user\controller;

use app\middleware\RedirectIfAuthenticated;
use app\modules\user\request\passport\ForgetRequest;
use app\modules\user\request\passport\LoginRequest;
use app\modules\user\request\passport\ResetRequest;
use Juling\Foundation\Exception\CustomException;
use Juling\Foundation\Response\JsonResponse;
use Juling\Foundation\Routing\Controller;
use OpenApi\Attributes as OA;
use think\exception\ValidateException;
use think\facade\Config;
use think\facade\Log;
use think\Request;
use think\response\Json;
use think\response\View;
use Throwable;

class PassportController extends Controller
{
    use JsonResponse;

    protected array $middleware = [
        RedirectIfAuthenticated::class,
    ];

    protected function initialize(): void
    {
        Config::set([
            'view_path' => dirname(__DIR__).'/view/',
        ], 'view');
    }

    #[OA\Get(path: 'login', summary: '用户登录页面', tags: ['认证模块'])]
    public function showLoginForm(Request $request): View
    {
        $callback = $request->get('callback', '/');

        return view('/passport/login', ['callback' => urldecode($callback)]);
    }

    #[OA\Post(path: 'login', summary: '用户登录', tags: ['认证模块'])]
    public function login(Request $request): Json
    {
        try {
            $formData = $request->post();

            $v = new LoginRequest;
            if (! $v->check($formData)) {
                throw new CustomException($v->getError());
            }

            $loginInput = new LoginInput;
            $loginInput->setUsername($formData['username']);
            $loginInput->setPassword($formData['password']);
            $loginInput->setRememberMe($formData['remember'] === 'on');

            $loginBundleService = new LoginBundleService;
            if ($loginBundleService->login($loginInput)) {
                return $this->success('ok');
            }

            throw new CustomException('登录失败');
        } catch (Throwable $e) {
            Log::error($e);

            if ($e instanceof CustomException || $e instanceof ValidateException) {
                return $this->error($e->getMessage());
            }

            return $this->error('请求错误，请稍后再试。');
        }
    }

    #[OA\Get(path: 'forget', summary: '用户忘记密码页面', tags: ['认证模块'])]
    public function showForgetForm(Request $request): View
    {
        return view('/passport/forget');
    }

    #[OA\Post(path: 'forget', summary: '用户忘记密码', tags: ['认证模块'])]
    public function forget(Request $request): Json
    {
        try {
            $formData = $request->post();

            $v = new ForgetRequest;
            if (! $v->check($formData)) {
                throw new CustomException($v->getError());
            }

            return $this->success('data');
        } catch (Throwable $e) {
            Log::error($e);

            if ($e instanceof CustomException || $e instanceof ValidateException) {
                return $this->error($e->getMessage());
            }

            return $this->error('请求错误，请稍后再试。');
        }
    }

    #[OA\Get(path: 'reset', summary: '用户重设密码页面', tags: ['认证模块'])]
    public function showResetForm(Request $request): Json|View
    {
        $token = $request->get('token');

        // todo check

        return view('/passport/reset');
    }

    #[OA\Post(path: 'reset', summary: '用户重设密码', tags: ['认证模块'])]
    public function reset(Request $request): Json|View
    {
        try {
            $formData = $request->post();

            $v = new ResetRequest;
            if (! $v->check($formData)) {
                throw new CustomException($v->getError());
            }

            return $this->success('data');
        } catch (Throwable $e) {
            Log::error($e);

            if ($e instanceof CustomException || $e instanceof ValidateException) {
                return $this->error($e->getMessage());
            }

            return $this->error('请求错误，请稍后再试。');
        }
    }
}
