<?php

namespace App\Plugins\Payment;

interface PaymentInterface
{
    public function get_code(array $order, array $payment): string;

    public function respond(): bool;

    public static function getModuleInfo(): array;
}
