<?php

/**
 * @param string $table
 * @return string
 */
function table(string $table): string
{
    $database = config('database.connections.' . config('database.default') . '.database');
    $prefix = config('database.connections.' . config('database.default') . '.prefix');
    return '`' . $database . '`.`' . $prefix . $table . '`';
}
