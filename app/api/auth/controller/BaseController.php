<?php

declare(strict_types=1);

namespace app\api\auth\controller;

use Juling\Foundation\Response\JsonResponse;
use Juling\Foundation\Routing\Controller;

abstract class BaseController extends Controller
{
    use JsonResponse;
}
