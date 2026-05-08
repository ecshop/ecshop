<?php

namespace App\Plugins\Payment;

class PaymentFactory
{
    private static $instances = [];

    private static $loaded = [];

    private static $classMap = [
        'alipay' => 'alipay',
        'bank' => 'bank',
        'balance' => 'balance',
        'cod' => 'cod',
        'post' => 'post',
    ];

    private static $pluginBaseDir = '';

    public static function create(string $payCode): PaymentInterface
    {
        $payCode = strtolower($payCode);

        if (isset(self::$instances[$payCode])) {
            return self::$instances[$payCode];
        }

        if (! isset(self::$classMap[$payCode])) {
            throw new \RuntimeException("Payment plugin '{$payCode}' not registered.");
        }

        $shortName = self::$classMap[$payCode];
        $className = __NAMESPACE__.'\\'.$shortName;

        if (! isset(self::$loaded[$shortName])) {
            self::loadPlugin($shortName);
        }

        $instance = new $className;
        if (! $instance instanceof PaymentInterface) {
            throw new \RuntimeException("Payment class '{$className}' must implement PaymentInterface.");
        }

        self::$instances[$payCode] = $instance;

        return $instance;
    }

    public static function getModuleInfo(string $payCode): ?array
    {
        $payCode = strtolower($payCode);

        if (! isset(self::$classMap[$payCode])) {
            return null;
        }

        $shortName = self::$classMap[$payCode];
        $className = __NAMESPACE__.'\\'.$shortName;

        if (! isset(self::$loaded[$shortName])) {
            self::loadPlugin($shortName);
        }

        if (method_exists($className, 'getModuleInfo')) {
            return $className::getModuleInfo();
        }

        return null;
    }

    public static function getAllModules(): array
    {
        $modules = [];

        foreach (self::$classMap as $code => $shortName) {
            $className = __NAMESPACE__.'\\'.$shortName;

            if (! isset(self::$loaded[$shortName])) {
                self::loadPlugin($shortName);
            }

            if (method_exists($className, 'getModuleInfo')) {
                $info = $className::getModuleInfo();
                $info['code'] = $code;
                $modules[] = $info;
            }
        }

        return $modules;
    }

    public static function getAllPayCodes(): array
    {
        return array_keys(self::$classMap);
    }

    public static function isRegistered(string $payCode): bool
    {
        return isset(self::$classMap[strtolower($payCode)]);
    }

    public static function register(string $payCode, string $className): void
    {
        self::$classMap[strtolower($payCode)] = $className;
    }

    private static function loadPlugin(string $className): void
    {
        if (self::$pluginBaseDir === '') {
            if (defined('ROOT_PATH')) {
                self::$pluginBaseDir = ROOT_PATH.'app/Plugins/Payment/';
            } else {
                self::$pluginBaseDir = dirname(__FILE__).'/';
            }
        }

        $file = self::$pluginBaseDir.ucfirst($className).'.php';

        if (! file_exists($file)) {
            throw new \RuntimeException("Payment plugin file not found: {$file}");
        }

        require_once $file;
        self::$loaded[$className] = true;
    }
}
