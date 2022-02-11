<?php

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

list($host, $port) = explode(':', $db_host);
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $host,
    'port' => $port,
    'database' => $db_name,
    'username' => $db_user,
    'password' => $db_pass,
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => $prefix,
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();
