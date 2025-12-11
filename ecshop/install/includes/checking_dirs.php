<?php

if (! defined('IN_ECS')) {
    exit('Hacking attempt');
}

$checking_dirs = [
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
    'temp/static_caches',
];
