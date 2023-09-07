<?php

declare(strict_types=1);

namespace App\Bundles\User\Controllers;

use Illuminate\Contracts\Support\Renderable;

class IndexController extends BaseController
{
    public function index(): Renderable
    {
        return view('user::index');
    }
}
