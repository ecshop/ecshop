<?php

declare(strict_types=1);

namespace App\Modules\Shop\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Shop\ShopServiceProvider;
use Illuminate\Contracts\Support\Renderable;
use OpenApi\Attributes as OA;

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

        return view(ShopServiceProvider::NS.'::'.$template, $this->vars);
    }
}
