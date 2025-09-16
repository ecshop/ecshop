<?php

$app = new think\App;
$app->env->set([
    'APP_NAME' => 'ECSHOP',
    'RELEASE' => '20250916',
    'VERSION' => 'v3.0.0',
]);

return $app;
