<?php

if (! defined('IN_ECS')) {
    exit('Hacking attempt');
}

/**
 * 获得GD的版本号
 *
 * @return string 返回版本号，可能的值为0，1，2
 */
function get_gd_version()
{
    include_once ROOT_PATH.'includes/cls_image.php';

    return cls_image::gd_version();
}

/**
 * 检测服务器上是否存在指定的文件类型
 *
 * @param  array  $file_types  文件路径数组，形如array('dwt'=>'', 'lbi'=>'', 'dat'=>'')
 * @return string 全部可写返回空串，否则返回以逗号分隔的文件类型组成的消息串
 */
function file_types_exists($file_types)
{
    global $_LANG;

    $msg = '';
    foreach ($file_types as $file_type => $file_path) {
        if (! file_exists($file_path)) {
            $msg .= $_LANG['cannt_support_'.$file_type].', ';
        }
    }

    $msg = preg_replace("/,\s*$/", '', $msg);

    return $msg;
}

/**
 * 获得系统的信息
 *
 * @return array 系统各项信息组成的数组
 */
function get_system_info()
{
    global $_LANG;

    $system_info = [];

    /* 检查系统基本参数 */
    $system_info[] = [$_LANG['php_os'], PHP_OS];
    $system_info[] = [$_LANG['php_ver'], PHP_VERSION];

    /* 检查MYSQL支持情况 */
    $mysql_enabled = function_exists('mysqli_connect') ? $_LANG['support'] : $_LANG['not_support'];
    $system_info[] = [$_LANG['does_support_mysql'], $mysql_enabled];

    /* 检查图片处理函数库 */
    $gd_ver = get_gd_version();
    $gd_ver = empty($gd_ver) ? $_LANG['not_support'] : $gd_ver;
    if ($gd_ver > 0) {
        $gd_info = gd_info();
        $jpeg_enabled = ($gd_info['JPEG Support'] === true) ? $_LANG['support'] : $_LANG['not_support'];
        $gif_enabled = ($gd_info['GIF Create Support'] === true) ? $_LANG['support'] : $_LANG['not_support'];
        $png_enabled = ($gd_info['PNG Support'] === true) ? $_LANG['support'] : $_LANG['not_support'];
    } else {
        $jpeg_enabled = $_LANG['not_support'];
        $gif_enabled = $_LANG['not_support'];
        $png_enabled = $_LANG['not_support'];
    }
    $system_info[] = [$_LANG['gd_version'], $gd_ver];
    $system_info[] = [$_LANG['jpeg'], $jpeg_enabled];
    $system_info[] = [$_LANG['gif'], $gif_enabled];
    $system_info[] = [$_LANG['png'], $png_enabled];

    /* 检查系统是否支持以dwt,lib,dat为扩展名的文件 */
    $file_types = [
        'dwt' => ROOT_PATH.'themes/default/index.dwt',
        'lbi' => ROOT_PATH.'themes/default/library/member.lbi',
        'dat' => ROOT_PATH.'includes/ipdata/ipdata.dat',
    ];
    $exists_info = file_types_exists($file_types);
    $exists_info = empty($exists_info) ? $_LANG['support_dld'] : $exists_info;
    $system_info[] = [$_LANG['does_support_dld'], $exists_info];

    /* 服务器是否安全模式开启 */
    $safe_mode = ini_get('safe_mode') == '1' ? $_LANG['safe_mode_on'] : $_LANG['safe_mode_off'];
    $system_info[] = [$_LANG['safe_mode'], $safe_mode];

    return $system_info;
}

/**
 * 获得数据库列表
 *
 * @param  string  $db_host  主机
 * @param  string  $db_port  端口号
 * @param  string  $db_user  用户名
 * @param  string  $db_pass  密码
 * @return mixed 成功返回数据库列表组成的数组，失败返回false
 */
function get_db_list($db_host, $db_port, $db_user, $db_pass)
{
    global $err, $_LANG;
    $databases = [];
    $filter_dbs = ['information_schema', 'mysql', 'performance_schema', 'sys'];
    $db_host = construct_db_host($db_host, $db_port);
    $conn = @mysqli_connect($db_host, $db_user, $db_pass);

    if ($conn === false) {
        $err->add($_LANG['connect_failed']);

        return false;
    }
    keep_right_conn($conn);

    $result = mysqli_query($conn, 'SHOW DATABASES');
    if ($result !== false) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (in_array($row['Database'], $filter_dbs)) {
                continue;
            }
            $databases[] = $row['Database'];
        }
    } else {
        $err->add($_LANG['query_failed']);

        return false;
    }
    @mysqli_close($conn);

    return $databases;
}

/**
 * 创建指定名字的数据库
 *
 * @param  string  $db_host  主机
 * @param  string  $db_port  端口号
 * @param  string  $db_user  用户名
 * @param  string  $db_pass  密码
 * @param  string  $db_name  数据库名
 * @return bool 成功返回true，失败返回false
 */
function create_database($db_host, $db_port, $db_user, $db_pass, $db_name)
{
    global $err, $_LANG;
    $db_host = construct_db_host($db_host, $db_port);
    $conn = @mysqli_connect($db_host, $db_user, $db_pass);

    if ($conn === false) {
        $err->add($_LANG['connect_failed']);

        return false;
    }

    keep_right_conn($conn);
    if (mysqli_select_db($conn, $db_name) === false) {
        $sql = "CREATE DATABASE $db_name DEFAULT CHARACTER SET ".EC_DB_CHARSET;
        if (mysqli_query($conn, $sql) === false) {
            $err->add($_LANG['cannt_create_database']);

            return false;
        }
    }
    @mysqli_close($conn);

    return true;
}

/**
 * 保证进行正确的数据库连接（如字符集设置）
 *
 * @param  string  $conn  数据库连接
 * @return void
 */
function keep_right_conn($conn)
{
    mysqli_query($conn, 'SET character_set_connection='.EC_DB_CHARSET.', character_set_results='.EC_DB_CHARSET.', character_set_client=binary');
    mysqli_query($conn, "SET sql_mode=''");
}

/**
 * 创建配置文件
 *
 * @param  string  $db_host  主机
 * @param  string  $db_port  端口号
 * @param  string  $db_user  用户名
 * @param  string  $db_pass  密码
 * @param  string  $db_name  数据库名
 * @param  string  $prefix  数据表前缀
 * @param  string  $timezone  时区
 * @return bool 成功返回true，失败返回false
 */
function create_config_file($db_host, $db_port, $db_user, $db_pass, $db_name, $prefix, $timezone)
{
    global $err, $_LANG;
    $db_host = construct_db_host($db_host, $db_port);

    $content = '<?'."php\n";
    $content .= "// database host\n";
    $content .= "\$db_host   = \"$db_host\";\n\n";
    $content .= "// database name\n";
    $content .= "\$db_name   = \"$db_name\";\n\n";
    $content .= "// database username\n";
    $content .= "\$db_user   = \"$db_user\";\n\n";
    $content .= "// database password\n";
    $content .= "\$db_pass   = \"$db_pass\";\n\n";
    $content .= "// table prefix\n";
    $content .= "\$prefix    = \"$prefix\";\n\n";
    $content .= "\$timezone    = \"$timezone\";\n\n";
    $content .= "\$cookie_path    = \"/\";\n\n";
    $content .= "\$cookie_domain    = \"\";\n\n";
    $content .= "\$session = \"1440\";\n\n";
    $content .= "define('AUTH_KEY', 'this is a key');\n\n";
    $content .= "define('OLD_AUTH_KEY', '');\n\n";
    $content .= "define('API_TIME', '');";

    $fp = @fopen(ROOT_PATH.'data/config.php', 'wb+');
    if (! $fp) {
        $err->add($_LANG['open_config_file_failed']);

        return false;
    }
    if (! @fwrite($fp, trim($content))) {
        $err->add($_LANG['write_config_file_failed']);

        return false;
    }
    @fclose($fp);

    return true;
}

/**
 * 把host、port重组成指定的串
 *
 * @param  string  $db_host  主机
 * @param  string  $db_port  端口号
 * @return string host、port重组后的串，形如host:port
 */
function construct_db_host($db_host, $db_port)
{
    return $db_host.':'.$db_port;
}

/**
 * 安装数据
 *
 * @param  array  $sql_files  SQL文件路径组成的数组
 * @return bool 成功返回true，失败返回false
 */
function install_data($sql_files)
{
    global $err;

    include ROOT_PATH.'data/config.php';
    include_once ROOT_PATH.'includes/cls_mysql.php';
    include_once ROOT_PATH.'includes/cls_sql_executor.php';

    $db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
    $se = new sql_executor($db, EC_DB_CHARSET, 'ecs_', $prefix);
    $result = $se->run_all($sql_files);
    if ($result === false) {
        $err->add($se->error);

        return false;
    }

    return true;
}

/**
 * 创建管理员帐号
 *
 * @param  string  $admin_name
 * @param  string  $admin_password
 * @param  string  $admin_password2
 * @param  string  $admin_email
 * @return bool 成功返回true，失败返回false
 */
function create_admin_passport($admin_name, $admin_password, $admin_password2, $admin_email)
{
    global $err, $_LANG;

    if ($admin_password === '') {
        $err->add($_LANG['password_empty_error']);

        return false;
    }

    if ($admin_password === '') {
        $err->add($_LANG['password_empty_error']);

        return false;
    }

    if (! (strlen($admin_password) >= 8 && preg_match("/\d+/", $admin_password) && preg_match('/[a-zA-Z]+/', $admin_password))) {
        $err->add($_LANG['js_languages']['password_invaild']);

        return false;
    }

    if ($admin_password !== $admin_password2) {
        $err->add($_LANG['passwords_not_eq']);

        return false;
    }

    include ROOT_PATH.'data/config.php';
    include_once ROOT_PATH.'includes/cls_mysql.php';
    include_once ROOT_PATH.'includes/lib_common.php';

    $nav_list = implode(',', $_LANG['admin_user']);

    $db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
    $sql = "INSERT INTO $prefix".'admin_user '.
        '(user_name, email, password, add_time, action_list, nav_list)'.
        'VALUES '.
        "('$admin_name', '$admin_email', '".md5($admin_password)."', ".gmtime().", 'all', '$nav_list')";
    if (! $db->query($sql, 'SILENT')) {
        $err->add($_LANG['create_passport_failed']);

        return false;
    }

    return true;
}

/**
 * 其它设置
 *
 * @param  string  $system_lang  系统语言
 * @param  string  $disable_captcha  是否开启验证码
 * @param  string  $integrate_code  用户接口
 * @return bool 成功返回true，失败返回false
 */
function do_others($system_lang = 'zh_cn', $captcha = 1, $integrate_code = 'ecshop')
{
    global $err, $_LANG;

    include ROOT_PATH.'data/config.php';
    include_once ROOT_PATH.'includes/cls_mysql.php';
    $db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);

    /* 更新 ECSHOP 语言 */
    $sql = "UPDATE $prefix"."shop_config SET value='".$system_lang."' WHERE code='lang'";
    if (! $db->query($sql, 'SILENT')) {
        $err->add($db->errno().' '.$db->error());

        return false;
    }

    /* 更新用户接口 */
    if (! empty($integrate_code)) {
        $sql = "UPDATE $prefix"."shop_config SET value='".$integrate_code."' WHERE code='integrate_code'";
        if (! $db->query($sql, 'SILENT')) {
            $err->add($db->errno().' '.$db->error());

            return false;
        }
    }

    /* 处理验证码 */
    if (! empty($captcha)) {
        $sql = "UPDATE $prefix"."shop_config SET value = '12' WHERE code = 'captcha'";
        if (! $db->query($sql, 'SILENT')) {
            $err->add($db->errno().' '.$db->error());

            return false;
        }
    }

    /* 更新用户接口配置 */
    if (file_exists(ROOT_PATH.'data/config_temp.php')) {
        include ROOT_PATH.'data/config_temp.php';
        $sql = "UPDATE $prefix"."shop_config SET value = '".serialize($cfg)."' WHERE code = 'integrate_config'";
        if (! $db->query($sql, 'SILENT')) {
            $err->add($db->errno().' '.$db->error());

            return false;
        }
    }

    return true;
}

/**
 * 安装完成后的一些善后处理
 *
 * @return bool 成功返回true，失败返回false
 */
function deal_aftermath()
{
    global $err, $_LANG;

    include ROOT_PATH.'data/config.php';
    include_once ROOT_PATH.'includes/cls_ecshop.php';
    include_once ROOT_PATH.'includes/cls_mysql.php';

    $db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);

    /* 更新 ECSHOP 安装日期 */
    $sql = "UPDATE $prefix"."shop_config SET value='".time()."' WHERE code='install_date'";
    if (! $db->query($sql, 'SILENT')) {
        $err->add($db->errno().' '.$db->error());
    }

    /* 更新 ECSHOP 版本 */
    $sql = "UPDATE $prefix"."shop_config SET value='".VERSION."' WHERE code='ecs_version'";
    if (! $db->query($sql, 'SILENT')) {
        $err->add($db->errno().' '.$db->error());

        return false;
    }

    /* 写入 hash_code，做为网站唯一性密钥 */
    $hash_code = md5(md5(time()).md5($db->dbhash).md5(time()));
    $sql = "UPDATE $prefix"."shop_config SET value = '$hash_code' WHERE code = 'hash_code' ";
    if (! $db->query($sql, 'SILENT')) {
        $err->add($db->errno().' '.$db->error());

        return false;
    }

    /* 写入安装锁定文件 */
    $fp = @fopen(ROOT_PATH.'data/install.lock', 'wb+');
    if (! $fp) {
        $err->add($_LANG['open_installlock_failed']);

        return false;
    }
    if (! @fwrite($fp, 'ECSHOP INSTALLED')) {
        $err->add($_LANG['write_installlock_failed']);

        return false;
    }
    @fclose($fp);

    return true;
}

/**
 * 取得当前的域名
 *
 *
 * @return string 当前的域名
 */
function get_domain()
{
    /* 协议 */
    $protocol = http();

    /* 域名或IP地址 */
    if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
        $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
    } elseif (isset($_SERVER['HTTP_HOST'])) {
        $host = $_SERVER['HTTP_HOST'];
    } else {
        /* 端口 */
        if (isset($_SERVER['SERVER_PORT'])) {
            $port = ':'.$_SERVER['SERVER_PORT'];

            if (($port == ':80' && $protocol == 'http://') || ($port == ':443' && $protocol == 'https://')) {
                $port = '';
            }
        } else {
            $port = '';
        }

        if (isset($_SERVER['SERVER_NAME'])) {
            $host = $_SERVER['SERVER_NAME'].$port;
        } elseif (isset($_SERVER['SERVER_ADDR'])) {
            $host = $_SERVER['SERVER_ADDR'].$port;
        }
    }

    return $protocol.$host;
}

/**
 * 获得 ECSHOP 当前环境的 URL 地址
 *
 *
 * @return void
 */
function url()
{
    $PHP_SELF = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $ecserver = 'http://'.$_SERVER['HTTP_HOST'].($_SERVER['SERVER_PORT'] && $_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT'] : '');
    $default_appurl = $ecserver.substr($PHP_SELF, 0, strpos($PHP_SELF, 'install/') - 1);

    return $default_appurl;
}

/**
 * 获得 ECSHOP 当前环境的 HTTP 协议方式
 *
 *
 * @return void
 */
function http()
{
    return (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) != 'off')) ? 'https://' : 'http://';
}

function insertconfig($s, $find, $replace)
{
    if (preg_match($find, $s)) {
        $s = preg_replace($find, $replace, $s);
    } else {
        // 插入到最后一行
        $s .= "\r\n".$replace;
    }

    return $s;
}

function getgpc($k, $var = 'G')
{
    switch ($var) {
        case 'G':
            $var = &$_GET;
            break;
        case 'P':
            $var = &$_POST;
            break;
        case 'C':
            $var = &$_COOKIE;
            break;
        case 'R':
            $var = &$_REQUEST;
            break;
    }

    return isset($var[$k]) ? $var[$k] : '';
}

function var_to_hidden($k, $v)
{
    return "<input type=\"hidden\" name=\"$k\" value=\"$v\" />";
}

function dfopen($url, $limit = 0, $post = '', $cookie = '', $bysocket = false, $ip = '', $timeout = 15, $block = true)
{
    $return = '';
    $matches = parse_url($url);
    $host = $matches['host'];
    $path = $matches['path'] ? $matches['path'].'?'.$matches['query'].($matches['fragment'] ? '#'.$matches['fragment'] : '') : '/';
    $port = ! empty($matches['port']) ? $matches['port'] : 80;

    if ($post) {
        $out = "POST $path HTTP/1.0\r\n";
        $out .= "Accept: */*\r\n";
        // $out .= "Referer: $boardurl\r\n";
        $out .= "Accept-Language: zh-cn\r\n";
        $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
        $out .= "Host: $host\r\n";
        $out .= 'Content-Length: '.strlen($post)."\r\n";
        $out .= "Connection: Close\r\n";
        $out .= "Cache-Control: no-cache\r\n";
        $out .= "Cookie: $cookie\r\n\r\n";
        $out .= $post;
    } else {
        $out = "GET $path HTTP/1.0\r\n";
        $out .= "Accept: */*\r\n";
        // $out .= "Referer: $boardurl\r\n";
        $out .= "Accept-Language: zh-cn\r\n";
        $out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
        $out .= "Host: $host\r\n";
        $out .= "Connection: Close\r\n";
        $out .= "Cookie: $cookie\r\n\r\n";
    }
    $fp = @fsockopen(($ip ? $ip : $host), $port, $errno, $errstr, $timeout);
    if (! $fp) {
        return ''; // note $errstr : $errno \r\n
    } else {
        stream_set_blocking($fp, $block);
        stream_set_timeout($fp, $timeout);
        @fwrite($fp, $out);
        $status = stream_get_meta_data($fp);
        if (! $status['timed_out']) {
            while (! feof($fp)) {
                if (($header = @fgets($fp)) && ($header == "\r\n" || $header == "\n")) {
                    break;
                }
            }

            $stop = false;
            while (! feof($fp) && ! $stop) {
                $data = fread($fp, ($limit == 0 || $limit > 8192 ? 8192 : $limit));
                $return .= $data;
                if ($limit) {
                    $limit -= strlen($data);
                    $stop = $limit <= 0;
                }
            }
        }
        @fclose($fp);

        return $return;
    }
}
