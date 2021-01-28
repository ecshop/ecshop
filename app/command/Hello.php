<?php

namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;

class Hello extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('hello')
            ->setDescription('the hello command');
    }

    protected function execute(Input $input, Output $output)
    {
        // 指令输出
        $list = array_merge(
            glob(dirname(__DIR__) . '/controller/*.php'),
            glob(dirname(__DIR__) . '/controller/*/*.php'),
            glob(dirname(__DIR__) . '/helper/*.php'),
            glob(dirname(__DIR__) . '/library/*.php')
        );

        foreach ($list as $item) {
            $dir = dirname($item);
            $class = str_replace(['cls_', 'lib_'], '', basename($item, '.php'));
            $to = $dir . '/' . parse_name($class, 1) . '.php';
            rename($item, $to);
        }
    }
}
