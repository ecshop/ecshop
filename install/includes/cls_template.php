<?php

if (! defined('IN_ECS')) {
    exit('Hacking attempt');
}

class template
{
    /**
     * 用来存储变量的空间
     *
     * @var array
     */
    public $vars = [];

    /**
     * 模板存放的目录路径
     *
     * @var string
     */
    public $path = '';

    /**
     * 构造函数
     *
     * @param  string  $path
     * @return void
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * 模拟smarty的assign函数
     *
     * @param  string  $name  变量的名字
     * @param  mix  $value  变量的值
     * @return void
     */
    public function assign($name, $value)
    {
        $this->vars[$name] = $value;
    }

    /**
     * 模拟smarty的fetch函数
     *
     * @param  string  $file  文件相对路径
     * @return string 模板的内容(文本格式)
     */
    public function fetch($file)
    {
        extract($this->vars);
        ob_start();
        include $this->path.$file;
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    /**
     * 模拟smarty的display函数
     *
     * @param  string  $file  文件相对路径
     * @return void
     */
    public function display($file)
    {
        echo $this->fetch($file);
    }
}
