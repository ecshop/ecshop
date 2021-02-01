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
        echo "hello \n";
    }
}
