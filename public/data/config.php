<?php
// database host
$db_host = "localhost:3306";

// database name
$db_name = "ecshop";

// database username
$db_user = "root";

// database password
$db_pass = "root";

// table prefix
$prefix = "ecs_";

$timezone = "UTC";

$cookie_path = "/";

$cookie_domain = "";

$session = "1440";


function dd($a)
{
    echo '<pre>';
    print_r($a);
    exit('</pre>');
}