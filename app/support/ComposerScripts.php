<?php

declare(strict_types=1);

namespace app\support;

class ComposerScripts
{
    public static function postAutoloadDump(): void
    {
        $file = dirname(__DIR__, 2).'/vendor/topthink/framework/src/think/route/dispatch/Callback.php';
        if (file_exists($file)) {
            $rawSegment = 'if (class_exists($this->class)) {';
            $newSegment = <<<'EOF'
if (Str::substr($this->class, -10) !== 'Controller') {
                $suffix = $this->rule->config('controller_suffix') ? 'Controller' : '';
                $this->class = $this->class . $suffix;
            }

EOF;

            $content = file_get_contents($file);
            if (! str_contains($content, 'controller_suffix')) {
                $content = str_replace($rawSegment, $newSegment.$rawSegment, $content);
                file_put_contents($file, $content);
            }
        }
    }
}
