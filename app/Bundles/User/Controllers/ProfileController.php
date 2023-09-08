<?php

declare(strict_types=1);

namespace App\Bundles\User\Controllers;

use App\Http\Controllers\User\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;

class ProfileController extends BaseController
{
    private function showProfileForm(): Renderable
    {
        return view('user::profile.index');
    }

    private function update(Request $request): JsonResponse
    {
        return $this->success('');
    }
}
