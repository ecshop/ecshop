<?php

declare(strict_types=1);

namespace App\Modules\Admin\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Juling\Foundation\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLoginForm(): Renderable
    {
        return view('admin::auth.login');
    }

    public function login(): JsonResponse
    {
        return response()->json([]);
    }
}
