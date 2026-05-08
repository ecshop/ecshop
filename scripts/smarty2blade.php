#!/usr/bin/env php
<?php

/**
 * ECShop 2.7 Smarty → Laravel Blade 模板标签转换脚本
 *
 * 用法: php scripts/smarty2blade.php [options]
 *   --dir=PATH      要转换的目录 (默认: app/Modules/Admin/Views)
 *   --file=PATH     转换单个文件
 *   --dry-run       只预览不写入
 *   --backup        转换前备份原文件
 */

require_once __DIR__ . '/Smarty2BladeConverter.php';

$opts = getopt('', ['dir:', 'file:', 'dry-run', 'backup', 'help']);

if (isset($opts['help'])) {
    echo <<<HELP
ECShop Smarty → Blade 模板转换脚本

用法: php scripts/smarty2blade.php [options]

选项:
  --dir=PATH      要转换的目录 (默认: app/Modules/Admin/Views)
  --file=PATH     转换单个文件
  --dry-run       只预览不写入
  --backup        转换前备份原文件 (.smarty.bak)
  --help          显示帮助

示例:
  php scripts/smarty2blade.php --dry-run
  php scripts/smarty2blade.php --file=app/Modules/Admin/Views/auth/login.blade.php
  php scripts/smarty2blade.php --backup

HELP;
    exit(0);
}

$dryRun = isset($opts['dry-run']);
$backup = isset($opts['backup']);
$converter = new Smarty2BladeConverter($dryRun, $backup);
$baseDir = dirname(__DIR__);

if (isset($opts['file'])) {
    $file = $opts['file'];
    if (!str_starts_with($file, '/')) $file = $baseDir . '/' . $file;
    echo "转换文件: {$file}\n\n";
    $converter->convertFile($file);
} else {
    $dir = $opts['dir'] ?? 'app/Modules/Admin/Views';
    if (!str_starts_with($dir, '/')) $dir = $baseDir . '/' . $dir;
    echo "转换目录: {$dir}\n";
    if ($dryRun) echo "[预览模式]\n";
    echo "\n";
    $converter->convertDirectory($dir);
}
