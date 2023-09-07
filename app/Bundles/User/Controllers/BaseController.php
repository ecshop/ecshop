<?php

declare(strict_types=1);

namespace App\Bundles\User\Controllers;

use App\Bundles\Foundation\Controllers\Controller;

abstract class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
