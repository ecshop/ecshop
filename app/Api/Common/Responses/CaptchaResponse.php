<?php

declare(strict_types=1);

namespace App\Api\Common\Responses;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CaptchaResponse')]
class CaptchaResponse
{
    use DTOHelper;

    #[OA\Property(property: 'captcha', description: 'Base64格式的图片验证码', type: 'string')]
    private string $captcha;

    #[OA\Property(property: 'captchaId', description: '图片验证码ID', type: 'string')]
    private string $captchaId;

    public function getCaptcha(): string
    {
        return $this->captcha;
    }

    public function setCaptcha(string $captcha): void
    {
        $this->captcha = $captcha;
    }

    public function getCaptchaId(): string
    {
        return $this->captchaId;
    }

    public function setCaptchaId(string $captchaId): void
    {
        $this->captchaId = $captchaId;
    }
}
