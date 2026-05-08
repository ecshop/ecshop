#!/usr/bin/env php
<?php
/**
 * 测试转换脚本的输出
 */

require_once __DIR__ . '/Smarty2BladeConverter.php';

$converter = new Smarty2BladeConverter(true, false);

// 测试用例
$tests = [
    // 变量输出
    ['{$lang.cp_home}', '{{ $lang[\'cp_home\'] }}'],
    ['{$goods.goods_id}', '{{ $goods[\'goods_id\'] }}'],
    ['{$order.user_name|default:$lang.anonymous}', '{{ $order[\'user_name\'] ?? $lang[\'anonymous\'] }}'],
    ['{$goods.goods_name|escape}', '{{ $goods[\'goods_name\'] }}'],
    ['{$goods.goods_name|escape:html}', '{{ $goods[\'goods_name\'] }}'],
    ['{$var.desc|nl2br}', '{!! nl2br(e($var[\'desc\'])) !!}'],
    ['{$cfg.market_price_rate|default:1}', '{{ $cfg[\'market_price_rate\'] ?? 1 }}'],

    // 条件语句
    ['{if $gd_version > 0}', '@if($gd_version > 0)'],
    ['{if $var.type eq "text"}', '@if($var[\'type\'] == "text")'],
    ['{if $code neq \'real_goods\'}', '@if($code != \'real_goods\')'],
    ['{elseif $var.type eq "password"}', '@elseif($var[\'type\'] == "password")'],
    ['{else}', '@else'],
    ['{/if}', '@endif'],

    // 循环
    ['{foreach from=$goods_list item=goods}', '@foreach($goods_list as $goods)'],
    ['{foreach from=$lang.js_languages key=key item=item}', '@foreach($lang[\'js_languages\'] as $key => $item)'],
    ['{/foreach}', '@endforeach'],

    // Include
    ['{include file="pageheader.htm"}', '@include(\'pageheader\')'],
    ['{include file="pagefooter.htm"}', '@include(\'pagefooter\')'],

    // insert_scripts
    ['{insert_scripts files="../js/utils.js,validator.js"}', "<script src=\"../js/utils.js\"></script>\n<script src=\"validator.js\"></script>"],

    // Smarty 内置变量
    ['{$smarty.request.order_id}', '{{ request()->input(\'order_id\') }}'],
    ['{$smarty.get.act}', '{{ request()->query(\'act\') }}'],
];

echo "ECShop Smarty → Blade 转换测试\n";
echo str_repeat('=', 60) . "\n\n";

$passed = 0;
$failed = 0;

foreach ($tests as [$input, $expected]) {
    $result = $converter->convert($input);
    $ok = ($result === $expected);

    if ($ok) {
        $passed++;
        echo "  ✅ {$input}\n";
    } else {
        $failed++;
        echo "  ❌ {$input}\n";
        echo "     期望: {$expected}\n";
        echo "     实际: {$result}\n";
    }
}

echo "\n" . str_repeat('=', 60) . "\n";
echo "结果: {$passed} 通过, {$failed} 失败\n";

// 转换 login 文件预览
echo "\n\n=== login.blade.php 转换预览 ===\n\n";
$loginContent = file_get_contents(__DIR__ . '/../app/Modules/Admin/Views/auth/login.blade.php');
echo $converter->convert($loginContent);
echo "\n";
