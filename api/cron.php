<?php

define('IN_ECS', true);

require './init.php';
// require('../includes/lib_time.php');

$timestamp = gmtime();
check_method();
$error_log = [];
if (isset($set_modules)) {
    $set_modules = false;
    unset($set_modules);
}
$crondb = get_cron_info(); // 获得需要执行的计划任务数据
foreach ($crondb as $key => $cron_val) {
    if (file_exists(ROOT_PATH.'includes/modules/cron/'.$cron_val['cron_code'].'.php')) {
        if (! empty($cron_val['allow_ip'])) { // 设置了允许ip
            $allow_ip = explode(',', $cron_val['allow_ip']);
            $server_ip = real_server_ip();
            if (! in_array($server_ip, $allow_ip)) {
                continue;
            }
        }
        if (! empty($cron_val['minute'])) { // 设置了允许分钟段
            $m = explode(',', $cron_val['minute']);
            $m_now = intval(local_date('i', $timestamp));
            if (! in_array($m_now, $m)) {
                continue;
            }
        }
        if (! empty($cron_val['alow_files'])) { // 设置允许调用文件
            $f_info = parse_url($_SERVER['HTTP_REFERER']);
            $f_now = basename($f_info['path']);
            $f = explode(' ', $cron_val['alow_files']);
            if (! in_array($f_now, $f)) {
                continue;
            }
        }
        if (! empty($cron_val['cron_config'])) {
            foreach ($cron_val['cron_config'] as $k => $v) {
                $cron[$v['name']] = $v['value'];
            }
        }
        include_once ROOT_PATH.'includes/modules/cron/'.$cron_val['cron_code'].'.php';
    } else {
        $error_log[] = make_error_arr('includes/modules/cron/'.$cron_val['cron_code'].'.php not found!', __FILE__);
    }

    $close = $cron_val['run_once'] ? 0 : 1;
    $next_time = get_next_time($cron_val['cron']);
    $sql = 'UPDATE '.$ecs->table('crons').
        "SET thistime = '$timestamp', nextime = '$next_time', enable = $close ".
        "WHERE cron_id = '$cron_val[cron_id]' LIMIT 1";

    $db->query($sql);
}
write_error_arr($error_log);

function get_next_time($cron)
{
    $y = local_date('Y', $GLOBALS['timestamp']);
    $mo = local_date('n', $GLOBALS['timestamp']);
    $d = local_date('j', $GLOBALS['timestamp']);
    $w = local_date('w', $GLOBALS['timestamp']);
    $h = local_date('G', $GLOBALS['timestamp']);
    $sh = $sm = 0;
    $sy = $y;
    if ($cron['day']) {
        $sd = $cron['day'];
        $smo = $mo + 1;
    } else {
        $sd = $d;
        $smo = $mo;
        if ($cron['week'] != '') {
            $sd += $cron['week'] - $w + 7;
        }
    }
    if ($cron['hour']) {
        $sh = $cron['hour'];
        if (empty($cron['day']) && $cron['week'] == '') {
            $sd++;
        }
    }
    // $next = gmmktime($sh,$sm,0,$smo,$sd,$sy);
    $next = local_strtotime("$sy-$smo-$sd $sh:$sm:0");
    if ($next < $GLOBALS['timestamp']) {
        if ($cron['m']) {
            return $GLOBALS['timestamp'] + 60 - intval(local_date('s', $GLOBALS['timestamp']));
        } else {
            return $GLOBALS['timestamp'];
        }
    } else {
        return $next;
    }
}

function get_cron_info()
{
    $crondb = [];

    $sql = 'SELECT * FROM '.$GLOBALS['ecs']->table('crons')." WHERE enable = 1 AND nextime < $GLOBALS[timestamp]";
    $query = $GLOBALS['db']->query($sql);

    while ($rt = $GLOBALS['db']->fetch_array($query)) {
        $rt['cron'] = ['day' => $rt['day'], 'week' => $rt['week'], 'm' => $rt['minute'], 'hour' => $rt['hour']];
        $rt['cron_config'] = unserialize($rt['cron_config']);
        $rt['minute'] = trim($rt['minute']);
        $rt['allow_ip'] = trim($rt['allow_ip']);
        $crondb[] = $rt;
    }

    return $crondb;
}

function make_error_arr($msg, $file)
{
    $file = str_replace(ROOT_PATH, '', $file);

    return ['info' => $msg, 'file' => $file, 'time' => $GLOBALS['timestamp']];
}

function write_error_arr($err_arr)
{
    if (! empty($err_arr)) {
        $query = '';
        foreach ($err_arr as $key => $val) {
            $query .= $query ? ",('$val[info]', '$val[file]', '$val[time]')" : "('$val[info]', '$val[file]', '$val[time]')";
        }
        if ($query) {
            $sql = 'INSERT INTO '.$GLOBALS['ecs']->table('error_log').'(info, file, time) VALUES '.$query;
            $GLOBALS['db']->query($sql);
        }
    }
}

function check_method()
{
    $if_cron = PHP_SAPI == 'cli' ? true : false;
    if (! empty($GLOBALS['_CFG']['cron_method'])) {
        if (! $if_cron) {
            exit('Hacking attempt');
        }
    } else {
        if ($if_cron) {
            exit('Hacking attempt');
        } elseif (! isset($_GET['t']) || $GLOBALS['timestamp'] - intval($_GET['t']) > 60 || empty($_SERVER['HTTP_REFERER'])) {
            exit;
        }
    }
}
