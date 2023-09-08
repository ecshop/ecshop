<?php

declare(strict_types=1);

namespace App\Bundles\User\Controllers;

use App\Bundles\Foundation\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class AuthController extends Controller
{
    private function showLoginForm(): Renderable
    {
        return view('user::auth.login');
    }

    protected array $middleware = [
        [RedirectIfAuthenticated::class, [GlobalConst::USER_MODULE]],
    ];

    /**
     * 显示登录页面
     */
    private function login(Request $request): Renderable
    {
        return view('login');
    }

    /**
     * 登录操作
     */
    private function loginHandle(Request $request): JsonResponse
    {
        try {
            validate(LoginRequest::class)->check($request->post());
        } catch (ValidateException $e) {
            return $this->error($e->getError());
        }

        $loginInput = new LoginInput();
        $loginInput->setUsername($request->post('username'));
        $loginInput->setPassword($request->post('password'));
        $loginInput->setRememberMe($request->post('remember') === 'on');

        try {
            $loginService = new LoginService();
            $loginService->login($loginInput, GlobalConst::USER_MODULE);

            return $this->success('ok');
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * 显示注册页面
     */
    public function register(Request $request): Renderable
    {
        return view('register');
    }

    /**
     * 注册操作
     */
    private function registerHandle(Request $request): JsonResponse
    {
        try {
            validate(RegisterRequest::class)->check($request->post());
        } catch (ValidateException $e) {
            return $this->error($e->getError());
        }

        return $this->success('data');
    }

    /**
     * 显示忘记密码页面
     */
    private function forgot(Request $request): Renderable
    {
        return view('forgot');
    }

    /**
     * 忘记密码操作
     */
    private function forgotHandle(Request $request): JsonResponse
    {
        try {
            validate(ForgetRequest::class)->check($request->post());
        } catch (ValidateException $e) {
            return $this->error($e->getError());
        }

        return $this->success('data');
    }

    /**
     * 显示重置密码页面
     */
    private function reset(Request $request): Renderable
    {
        return view('reset');
    }

    /**
     * 重置密码操作
     */
    private function resetHandle(Request $request): JsonResponse
    {
        try {
            validate(ResetRequest::class)->check($request->post());
        } catch (ValidateException $e) {
            return $this->error($e->getError());
        }

        return $this->success('data');
    }

    /**
     * 社会化登录
     */
    private function connect(Request $request): Redirect
    {
        return redirect('/');
    }

    /**
     * 社会化登录回调
     */
    private function callback(Request $request): Redirect
    {
        return redirect('/');
    }

    /**
     * 显示社会化登录绑定页面
     */
    private function bind(Request $request): Renderable
    {
        return view('bind');
    }

    /**
     * 社会化登录绑定操作
     */
    private function bindHandle(Request $request): JsonResponse
    {
        return $this->success('data');
    }
}
