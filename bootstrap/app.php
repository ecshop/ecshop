<?php

$app = new think\App;
$app->env->set([
    'APP_NAME' => 'ECSHOP',
    'VERSION' => 'v3.0.0',
    'RELEASE' => '20250916',
]);

return $app;
