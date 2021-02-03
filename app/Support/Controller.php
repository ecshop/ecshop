<?php

namespace App\Support;

use App\Api\JsonResponse;
use App\Api\JwtTrait;

/**
 * Class Controller
 * @package App\Support
 */
abstract class Controller
{
    use JsonResponse, JwtTrait;
}
