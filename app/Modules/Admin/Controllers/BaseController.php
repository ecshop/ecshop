<?php

declare(strict_types=1);

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\AdminServiceProvider;
use Illuminate\Contracts\Support\Renderable;

abstract class BaseController extends Controller
{
    /**
     * 视图渲染
     */
    protected function display($template, array $vars = []): Renderable
    {
        if (! empty($vars)) {
            $this->vars = array_merge($this->vars, $vars);
        }

        return view(AdminServiceProvider::NS.'::'.$template, $this->vars);
    }
}
