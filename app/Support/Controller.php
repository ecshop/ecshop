<?php

namespace App\Support;

use App\Api\JsonResponse;
use App\Api\JwtTrait;
use Swift\Http\Response;

/**
 * Class Controller
 * @package App\Support
 */
abstract class Controller
{
    use JsonResponse, JwtTrait;

    /**
     * @var array
     */
    protected $_vars = [];

    /**
     * @param $name
     * @param $value
     */
    public function assign($name, $value)
    {
        $this->_vars = array_merge($this->_vars, [$name => $value]);
    }

    public function fetch()
    {

    }

    /**
     * @param $name
     * @return string|Response
     */
    public function display($name)
    {
        return view($name, $this->_vars);
    }
}
