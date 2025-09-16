<?php

declare(strict_types=1);

namespace app\api\common\response\captcha;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CaptchaImageResponse')]
class CaptchaImageResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'captchaId', description: '图片验证码ID', type: 'string')]
    private string $captchaId;

    #[OA\Property(property: 'captchaImage', description: '图片验证码', type: 'string')]
    private string $captchaImage;

    public function __construct(string $captchaId, string $captchaImage)
    {
        $this->captchaId = $captchaId;
        $this->captchaImage = $captchaImage;
    }

    public function getCaptchaId(): string
    {
        return $this->captchaId;
    }

    public function setCaptchaId(string $captchaId): void
    {
        $this->captchaId = $captchaId;
    }

    public function getCaptchaImage(): string
    {
        return $this->captchaImage;
    }

    public function setCaptchaImage(string $captchaImage): void
    {
        $this->captchaImage = $captchaImage;
    }
}
