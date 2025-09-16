<?php

return [
    // 默认缓存驱动
    'default' => env('CACHE_DRIVER', 'file'),

    // 缓存连接方式配置
    'stores' => [
        'file' => [
            // 驱动方式
            'type' => 'File',
            // 缓存保存目录
            'path' => '',
            // 缓存前缀
            'prefix' => env('CACHE_PREFIX', ''),
            // 缓存有效期 0表示永久缓存
            'expire' => 0,
            // 缓存标签前缀
            'tag_prefix' => 'tag:',
            // 序列化机制 例如 ['serialize', 'unserialize']
            'serialize' => [],
        ],
        'redis' => [
            'type' => 'Redis',
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'port' => env('REDIS_PORT', 6379),
            'password' => env('REDIS_PASSWORD', ''),
            'select' => env('REDIS_DB', 0),
            'timeout' => 0,
            'expire' => 0,
            'persistent' => false,
            'prefix' => env('CACHE_PREFIX', ''),
            'tag_prefix' => 'tag:',
            'serialize' => [],
            'fail_delete' => false,
        ],
        // 更多的缓存连接
    ],
];
