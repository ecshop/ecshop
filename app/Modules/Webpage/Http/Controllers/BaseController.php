<?php

declare(strict_types=1);

namespace App\Modules\Webpage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

abstract class BaseController extends Controller
{
    const string VIEW_NAMESPACE = 'webpage::';

    protected function view($template, array $vars = []): Renderable
    {
        return $this->display(self::VIEW_NAMESPACE.$template, $vars);
    }
}
