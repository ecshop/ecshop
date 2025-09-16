<?php

declare(strict_types=1);

namespace app\bundles\captcha\service;

use think\captcha\facade\Captcha;
use think\facade\Cache;

class CaptchaBundleService
{
    const string CAPTCHA_CACHE_ID = 'captcha_id:%s';

    public function create(string $captchaId, int $ttl = 1800): string
    {
        $captcha = Captcha::create();

        Cache::set(sprintf(self::CAPTCHA_CACHE_ID, $captchaId), $captcha['code'], $ttl);

        return $captcha['img'];
    }

    public function check(string $captchaId, string $captchaCode): bool
    {
        $code = Cache::get(sprintf(self::CAPTCHA_CACHE_ID, $captchaId));

        return $code === $captchaCode;
    }
}
