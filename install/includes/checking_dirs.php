<?php

if (!defined('IN_ECS')) {
    die('Hacking attempt');
}

$checking_dirs = array(
    'cert',
    'images',
    'data',
    'data/afficheimg',
    'data/brandlogo',
    'data/cardimg',
    'data/feedbackimg',
    'data/packimg',
    'data/sqldata',
    'temp',
    'temp/backup',
    'temp/caches',
    'temp/compiled',
    'temp/query_caches',
    'temp/static_caches'
);
