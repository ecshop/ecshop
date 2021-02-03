<?php

namespace App\Support;

class Shop
{
    /**
     * 获得当前环境的 URL 地址
     * @return string
     */
    public function url()
    {
        return request()->rootUrl();
    }

    /**
     * 获得当前环境的 HTTP 协议方式
     * @return  string
     */
    public function http()
    {
        return request()->scheme() . '://';
    }

    /**
     * 获得数据目录的路径
     * @param int $sid
     * @return string 路径
     */
    public function data_dir($sid = 0)
    {
        if (empty($sid)) {
            $s = 'data';
        } else {
            $s = 'user_files/';
            $s .= ceil($sid / 3000) . '/';
            $s .= $sid % 3000;
        }
        return $s;
    }

    /**
     * 获得图片的目录路径
     * @param int $sid
     * @return string 路径
     */
    public function image_dir($sid = 0)
    {
        if (empty($sid)) {
            $s = 'images';
        } else {
            $s = 'user_files/';
            $s .= ceil($sid / 3000) . '/';
            $s .= ($sid % 3000) . '/';
            $s .= 'images';
        }
        return $s;
    }
}
