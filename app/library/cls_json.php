<?php

/**
 * JSON 类
 */

if (!defined('IN_ECS')) {
    die('Hacking attempt');
}

class JSON
{
    public function encode($arg)
    {
        return json_encode($arg);
    }

    public function decode($text, $type = 0)
    {
        if (empty($text)) {
            return '';
        } elseif (!is_string($text)) {
            return false;
        }

        return addslashes_deep_obj(json_decode(stripslashes($text), $type));
    }
}
