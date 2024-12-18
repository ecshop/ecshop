<?php

if (! defined('IN_ECS')) {
    exit('Hacking attempt');
}

class ECS
{
    public $db_name = '';

    public $prefix = 'ecs_';

    /**
     * 构造函数
     *
     * @param  string  $ver  版本号
     * @return void
     */
    public function __construct($db_name, $prefix)
    {
        $this->db_name = $db_name;
        $this->prefix = $prefix;
    }

    /**
     * 将指定的表名加上前缀后返回
     *
     * @param  string  $str  表名
     * @return string
     */
    public function table($str)
    {
        return '`'.$this->db_name.'`.`'.$this->prefix.$str.'`';
    }

    /**
     * ECSHOP 密码编译方法;
     *
     * @param  string  $pass  需要编译的原始密码
     * @return string
     */
    public function compile_password($pass)
    {
        return md5($pass);
    }

    /**
     * 取得当前的域名
     *
     *
     * @return string 当前的域名
     */
    public function get_domain()
    {
        /* 协议 */
        $protocol = $this->http();

        /* 域名或IP地址 */
        if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
            $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
        } elseif (isset($_SERVER['HTTP_HOST'])) {
            $host = $_SERVER['HTTP_HOST'];
        } else {
            /* 端口 */
            if (isset($_SERVER['SERVER_PORT'])) {
                $port = ':'.$_SERVER['SERVER_PORT'];

                if (($port == ':80' && $protocol == 'http://') || ($port == ':443' && $protocol == 'https://')) {
                    $port = '';
                }
            } else {
                $port = '';
            }

            if (isset($_SERVER['SERVER_NAME'])) {
                $host = $_SERVER['SERVER_NAME'].$port;
            } elseif (isset($_SERVER['SERVER_ADDR'])) {
                $host = $_SERVER['SERVER_ADDR'].$port;
            }
        }

        return $protocol.$host;
    }

    /**
     * 获得 ECSHOP 当前环境的 URL 地址
     *
     *
     * @return void
     */
    public function url()
    {
        $curr = strpos(PHP_SELF, ADMIN_PATH.'/') !== false ?
            preg_replace('/(.*)('.ADMIN_PATH.')(\/?)(.)*/i', '\1', dirname(PHP_SELF)) :
            dirname(PHP_SELF);

        $root = str_replace('\\', '/', $curr);

        if (substr($root, -1) != '/') {
            $root .= '/';
        }

        return $this->get_domain().$root;
    }

    /**
     * 获得 ECSHOP 当前环境的 HTTP 协议方式
     *
     *
     * @return void
     */
    public function http()
    {
        return (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) != 'off')) ? 'https://' : 'http://';
    }

    /**
     * 获得数据目录的路径
     *
     * @param  int  $sid
     * @return string 路径
     */
    public function data_dir($sid = 0)
    {
        if (empty($sid)) {
            $s = 'data';
        } else {
            $s = 'user_files/';
            $s .= ceil($sid / 3000).'/';
            $s .= $sid % 3000;
        }

        return $s;
    }

    /**
     * 获得图片的目录路径
     *
     * @param  int  $sid
     * @return string 路径
     */
    public function image_dir($sid = 0)
    {
        if (empty($sid)) {
            $s = 'images';
        } else {
            $s = 'user_files/';
            $s .= ceil($sid / 3000).'/';
            $s .= ($sid % 3000).'/';
            $s .= 'images';
        }

        return $s;
    }
}
