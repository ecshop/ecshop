<?php

/**
 * ECShop 2.7 Smarty → Laravel Blade 模板标签转换器
 *
 * 支持的转换:
 * 1. 变量输出: {$var} → {{ $var }}
 * 2. 数组访问: {$arr.key} → {{ $arr['key'] }}
 * 3. 条件语句: {if} {elseif} {else} {/if}
 * 4. 循环语句: {foreach} {foreachelse} {/foreach}
 * 5. 包含文件: {include file="xxx.htm"}
 * 6. 脚本插入: {insert_scripts files="..."}
 * 7. 原始输出: {literal}...{/literal}
 * 8. Smarty修饰符: |escape, |escape:html, |nl2br, |default, |truncate
 * 9. Smarty内置变量: {$smarty.get.*}, {$smarty.request.*}, {$smarty.foreach.*}
 * 10. html_options 函数
 * 11. 比较运算符: eq, neq, gt, gte, lt, lte
 */
class Smarty2BladeConverter
{
    private bool $dryRun;
    private bool $backup;
    private int $convertedFiles = 0;
    private int $totalReplacements = 0;
    private array $warnings = [];
    private array $protectedBlocks = [];
    private int $protectedIndex = 0;

    public function __construct(bool $dryRun = false, bool $backup = false)
    {
        $this->dryRun = $dryRun;
        $this->backup = $backup;
    }

    public function convertDirectory(string $dir): void
    {
        $files = glob($dir . '/*.blade.php');
        foreach (glob($dir . '/*', GLOB_ONLYDIR) as $sub) {
            $files = array_merge($files, glob($sub . '/*.blade.php'));
        }
        echo "找到 " . count($files) . " 个模板文件\n\n";
        foreach ($files as $file) {
            $this->convertFile($file);
        }
        $this->printSummary();
    }

    public function convertFile(string $filePath): void
    {
        if (!file_exists($filePath)) {
            echo "错误: 文件不存在 - {$filePath}\n";
            return;
        }
        $original = file_get_contents($filePath);
        $converted = $this->convert($original, $filePath);
        if ($original === $converted) {
            echo "  [跳过] " . basename($filePath) . " (无需转换)\n";
            return;
        }
        $replacements = $this->countDifferences($original, $converted);
        $this->totalReplacements += $replacements;
        $this->convertedFiles++;
        echo "  [转换] " . basename($filePath) . " ({$replacements} 处替换)\n";
        if (!empty($this->warnings)) {
            foreach ($this->warnings as $w) {
                echo "    ⚠ {$w}\n";
            }
            $this->warnings = [];
        }
        if ($this->dryRun) return;
        if ($this->backup) copy($filePath, $filePath . '.smarty.bak');
        file_put_contents($filePath, $converted);
    }

    public function convert(string $content, string $filePath = ''): string
    {
        $this->protectedBlocks = [];
        $this->protectedIndex = 0;

        // Step 0: Unwrap commented smarty tags <!-- {if ...} -->
        $content = preg_replace('/<!--\s*(\{(?:if|elseif|else|\/if|foreach|\/foreach|foreachelse|assign|include|html_options|insert_scripts)\b[^}]*\})\s*-->/s', '$1', $content);

        $content = $this->protectLiteralBlocks($content);
        // Remove the protectCommentedSmarty since we unwrapped them
        $content = $this->convertIncludes($content);
        $content = $this->convertInsertScripts($content);
        $content = $this->convertHtmlOptions($content);
        $content = $this->convertForeach($content);
        $content = $this->convertConditionals($content);
        $content = $this->convertVariables($content);
        $content = $this->restoreProtectedBlocks($content);

        return $content;
    }

    // ===== 保护机制 =====

    private function protectLiteralBlocks(string $content): string
    {
        return preg_replace_callback('/\{literal\}(.*?)\{\/literal\}/s', function ($m) {
            $ph = "___PROTECTED_{$this->protectedIndex}___";
            $this->protectedBlocks[$ph] = $m[1];
            $this->protectedIndex++;
            return $ph;
        }, $content);
    }

    private function protectCommentedSmarty(string $content): string
    {
        return preg_replace_callback(
            '/<!--\s*(\{(?:if|elseif|else|\/if|foreach|\/foreach|foreachelse)\b[^}]*\})\s*-->/s',
            function ($m) {
                $ph = "___PROTECTED_{$this->protectedIndex}___";
                $this->protectedBlocks[$ph] = $m[0];
                $this->protectedIndex++;
                return $ph;
            },
            $content
        );
    }

    private function restoreProtectedBlocks(string $content): string
    {
        foreach ($this->protectedBlocks as $ph => $orig) {
            $content = str_replace($ph, $orig, $content);
        }
        return $content;
    }

    // ===== Include =====

    private function convertIncludes(string $content): string
    {
        return preg_replace_callback('/\{include\s+file=["\']([^"\']+)["\']\}/', function ($m) {
            $file = preg_replace('/\.htm$/', '', $m[1]);
            return "@include('{$file}')";
        }, $content);
    }

    // ===== insert_scripts =====

    private function convertInsertScripts(string $content): string
    {
        return preg_replace_callback('/\{insert_scripts\s+files=["\']([^"\']*)["\']?\}/', function ($m) {
            $scripts = [];
            foreach (explode(',', $m[1]) as $f) {
                $f = trim($f);
                if ($f !== '') $scripts[] = "<script src=\"{$f}\"></script>";
            }
            return implode("\n", $scripts);
        }, $content);
    }

    // ===== html_options =====

    private function convertHtmlOptions(string $content): string
    {
        // 改进的 html_options 解析，支持更复杂的属性
        $content = preg_replace_callback(
            '/\{html_options\b([^}]+)\}/',
            function ($m) {
                $attrs = $m[1];
                $options = $selected = $values = $output = null;

                if (preg_match('/options\s*=\s*\$([^\s}]+)/', $attrs, $match)) {
                    $options = $this->convertVarExprNoBraces($match[1]);
                }
                if (preg_match('/selected\s*=\s*\$([^\s}]+)/', $attrs, $match)) {
                    $selected = $this->convertVarExprNoBraces($match[1]);
                }
                if (preg_match('/values\s*=\s*\$([^\s}]+)/', $attrs, $match)) {
                    $values = $this->convertVarExprNoBraces($match[1]);
                }
                if (preg_match('/output\s*=\s*\$([^\s}]+)/', $attrs, $match)) {
                    $output = $this->convertVarExprNoBraces($match[1]);
                }

                if ($options) {
                    $selCheck = $selected ? " @if(\$__k == {$selected}) selected @endif" : "";
                    return "@foreach({$options} as \$__k => \$__v)<option value=\"{{ \$__k }}\"{$selCheck}>{{ \$__v }}</option>@endforeach";
                }

                if ($values && $output) {
                    $selCheck = $selected ? " @if(\$__v == {$selected}) selected @endif" : "";
                    return "@foreach({$values} as \$__i => \$__v)<option value=\"{{ \$__v }}\"{$selCheck}>{{ {$output}[\$__i] }}</option>@endforeach";
                }

                return $m[0]; // 无法解析则保持原样
            },
            $content
        );

        return $content;
    }

    // ===== foreach =====

    private function convertForeach(string $content): string
    {
        // 通用 foreach 解析器 - 处理所有参数顺序
        $content = preg_replace_callback(
            '/\{foreach\b([^}]+)\}/',
            function ($m) {
                $attrs = $m[1];
                $from = $item = $key = null;

                // 提取 from= (允许等号前后有空格)
                if (preg_match('/from\s*=\s*\$([^\s}]+)/', $attrs, $fm)) {
                    $from = $this->dotNotation($fm[1]);
                }
                // 提取 item= (允许等号前后有空格)
                if (preg_match('/item\s*=\s*(\w+)/', $attrs, $im)) {
                    $item = $im[1];
                }
                // 提取 key= (允许等号前后有空格)
                if (preg_match('/key\s*=\s*(\w+)/', $attrs, $km)) {
                    $key = $km[1];
                }

                if (!$from || !$item) {
                    $this->warnings[] = "无法解析 foreach: {$m[0]}";
                    return $m[0];
                }

                return $key
                    ? "@foreach({$from} as \${$key} => \${$item})"
                    : "@foreach({$from} as \${$item})";
            },
            $content
        );

        // foreachelse → forelse/empty
        $count = 0;
        do {
            $content = preg_replace(
                '/@foreach(\([^)]+\s+as\s+[^)]+\))(.*?)\{foreachelse\}(.*?)\{\/foreach\}/s',
                '@forelse$1$2@empty$3@endforelse',
                $content, -1, $count
            );
        } while ($count > 0);

        $content = str_replace('{/foreach}', '@endforeach', $content);

        return $content;
    }

    // ===== 条件语句 =====

    private function convertConditionals(string $content): string
    {
        $content = preg_replace_callback('/\{if\s+(.+?)\}/', function ($m) {
            return "@if(" . $this->convertExpr($m[1]) . ")";
        }, $content);

        $content = preg_replace_callback('/\{elseif\s+(.+?)\}/', function ($m) {
            return "@elseif(" . $this->convertExpr($m[1]) . ")";
        }, $content);

        $content = str_replace('{else}', '@else', $content);
        $content = str_replace('{/if}', '@endif', $content);

        return $content;
    }

    private function convertExpr(string $expr): string
    {
        $expr = preg_replace('/\beq\b/', '==', $expr);
        $expr = preg_replace('/\bneq\b/', '!=', $expr);
        $expr = preg_replace('/\bgt\b/', '>', $expr);
        $expr = preg_replace('/\bgte\b/', '>=', $expr);
        $expr = preg_replace('/\blt\b/', '<', $expr);
        $expr = preg_replace('/\blte\b/', '<=', $expr);
        $expr = preg_replace('/\bnot\b/', '!', $expr);
        $expr = preg_replace('/\band\b/', '&&', $expr);
        $expr = preg_replace('/\bor\b/', '||', $expr);
        $expr = preg_replace('/\bmod\b/', '%', $expr);

        $expr = $this->convertSmartyVarsInExpr($expr);
        $expr = $this->convertDotVarsInline($expr);

        return $expr;
    }

    // ===== 变量输出 =====

    private function convertVariables(string $content): string
    {
        return preg_replace_callback('/\{\$([^}]+)\}/', function ($m) {
            return $this->convertVarExpr($m[1]);
        }, $content);
    }

    private function convertVarExpr(string $expr): string
    {
        $parts = $this->splitModifiers($expr);
        $varPart = array_shift($parts);

        // Smarty 内置变量
        $varPart = $this->convertSmartyVarName($varPart);

        // 点号 → 方括号
        $varPart = $this->dotAccess($varPart);

        // 方括号内的点号
        $varPart = preg_replace_callback('/\[(\$\w+)\.(\w+)\]/', function ($m) {
            return "[{$m[1]}['{$m[2]}']]";
        }, $varPart);

        // 如果已是函数调用(如 request()->...)
        $phpExpr = str_starts_with($varPart, 'request()') ? $varPart : '$' . $varPart;

        $rawOutput = false;

        foreach ($parts as $mod) {
            $modParts = explode(':', $mod, 3);
            $name = $modParts[0];
            $arg1 = $modParts[1] ?? null;
            $arg2 = $modParts[2] ?? null;

            switch ($name) {
                case 'escape':
                    break; // Blade {{ }} 默认转义
                case 'nl2br':
                    $phpExpr = "nl2br(e({$phpExpr}))";
                    $rawOutput = true;
                    break;
                case 'default':
                    $default = $arg1 ?? "''";
                    if (str_starts_with($default, '$')) {
                        $default = $this->convertDotVarsInline($default);
                    }
                    $phpExpr = "{$phpExpr} ?? {$default}";
                    break;
                case 'truncate':
                    $len = $arg1 ?? 80;
                    $suffix = $arg2 ? trim($arg2, '"\'') : '...';
                    $phpExpr = "\Illuminate\Support\Str::limit({$phpExpr}, {$len}, '{$suffix}')";
                    break;
                case 'html':
                case '"html"':
                    break;
                default:
                    if (trim($name) !== '') {
                        $this->warnings[] = "未知修饰符: |{$mod}";
                    }
            }
        }

        return $rawOutput ? "{!! {$phpExpr} !!}" : "{{ {$phpExpr} }}";
    }

    private function splitModifiers(string $expr): array
    {
        $parts = [];
        $cur = '';
        $inQ = false;
        $qc = '';
        for ($i = 0; $i < strlen($expr); $i++) {
            $ch = $expr[$i];
            if ($inQ) {
                $cur .= $ch;
                if ($ch === $qc) $inQ = false;
                continue;
            }
            if ($ch === '"' || $ch === "'") {
                $inQ = true;
                $qc = $ch;
                $cur .= $ch;
                continue;
            }
            if ($ch === '|') {
                $parts[] = $cur;
                $cur = '';
                continue;
            }
            $cur .= $ch;
        }
        if ($cur !== '') $parts[] = $cur;
        return $parts;
    }

    // ===== 点号与内置变量 =====

    private function dotAccess(string $expr): string
    {
        if (!str_contains($expr, '.')) return $expr;
        $parts = explode('.', $expr);
        $result = array_shift($parts);
        foreach ($parts as $p) {
            $result .= is_numeric($p) ? "[{$p}]" : "['{$p}']";
        }
        return $result;
    }

    private function dotNotation(string $expr): string
    {
        return '$' . $this->dotAccess($expr);
    }

    private function convertDotVarsInline(string $expr): string
    {
        return preg_replace_callback('/\$(\w+(?:\.\w+)+)/', function ($m) {
            return '$' . $this->dotAccess($m[1]);
        }, $expr);
    }

    private function convertSmartyVarsInExpr(string $expr): string
    {
        $expr = preg_replace_callback('/\$smarty\.get\.(\w+)/', fn($m) => "request()->query('{$m[1]}')", $expr);
        $expr = preg_replace_callback('/\$smarty\.request\.(\w+)/', fn($m) => "request()->input('{$m[1]}')", $expr);
        $expr = preg_replace('/\$smarty\.foreach\.\w+\.iteration/', '$loop->iteration', $expr);
        $expr = preg_replace('/\$smarty\.foreach\.\w+\.first/', '$loop->first', $expr);
        $expr = preg_replace('/\$smarty\.foreach\.\w+\.last/', '$loop->last', $expr);
        $expr = preg_replace('/\$smarty\.foreach\.\w+\.total/', '$loop->count', $expr);
        $expr = preg_replace('/\$smarty\.foreach\.\w+\.index/', '$loop->index', $expr);
        return $expr;
    }

    private function convertSmartyVarName(string $name): string
    {
        if (preg_match('/^smarty\.get\.(\w+)$/', $name, $m)) return "request()->query('{$m[1]}')";
        if (preg_match('/^smarty\.request\.(\w+)$/', $name, $m)) return "request()->input('{$m[1]}')";
        if (preg_match('/^smarty\.foreach\.\w+\.iteration$/', $name)) return 'loop->iteration';
        if (preg_match('/^smarty\.foreach\.\w+\.first$/', $name)) return 'loop->first';
        if (preg_match('/^smarty\.foreach\.\w+\.last$/', $name)) return 'loop->last';
        if (preg_match('/^smarty\.foreach\.\w+\.total$/', $name)) return 'loop->count';
        return $name;
    }

    // ===== 工具 =====

    private function convertVarExprNoBraces(string $expr): string
    {
        $parts = $this->splitModifiers($expr);
        $varPart = array_shift($parts);
        $varPart = $this->convertSmartyVarName($varPart);
        $varPart = $this->dotAccess($varPart);
        
        // 处理方括号内的点号
        $varPart = preg_replace_callback('/\[\$?(\w+(?:\.\w+)+)\]/', function ($m) {
            return "[" . $this->convertDotVarsInline('$' . $m[1]) . "]";
        }, $varPart);

        $phpExpr = str_starts_with($varPart, 'request()') || str_starts_with($varPart, 'loop->') ? $varPart : '$' . $varPart;
        
        foreach ($parts as $mod) {
            $modParts = explode(':', $mod, 3);
            $name = $modParts[0];
            $arg1 = $modParts[1] ?? null;
            switch ($name) {
                case 'default':
                    $default = $arg1 ?? "''";
                    $phpExpr = "({$phpExpr} ?? {$default})";
                    break;
            }
        }
        return $phpExpr;
    }
    private function countDifferences(string $a, string $b): int
    {
        $la = explode("\n", $a);
        $lb = explode("\n", $b);
        $d = 0;
        for ($i = 0; $i < max(count($la), count($lb)); $i++) {
            if (($la[$i] ?? '') !== ($lb[$i] ?? '')) $d++;
        }
        return $d;
    }

    private function printSummary(): void
    {
        echo "\n================================\n";
        echo "转换完成!\n";
        echo "  转换文件数: {$this->convertedFiles}\n";
        echo "  总替换行数: {$this->totalReplacements}\n";
        if ($this->dryRun) echo "  [预览模式] 未实际写入文件\n";
        echo "================================\n";
    }
}
