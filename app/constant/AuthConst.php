<?php

declare(strict_types=1);

namespace app\constant;

class AuthConst
{
    const string Admin = 'AuthAdmin';

    const string User = 'AuthUser';

    public static function getModule(string $guard): string
    {
        return match ($guard) {
            self::Admin => 'admin',
            default => 'user',
        };
    }
}
