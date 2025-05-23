<?php

define('UC_CLIENT_VERSION', '1.5.0');  // note UCenter 版本标识
define('UC_CLIENT_RELEASE', '20081031');

define('API_DELETEUSER', 1);    // note 用户删除 API 接口开关
define('API_RENAMEUSER', 1);    // note 用户改名 API 接口开关
define('API_GETTAG', 1);        // note 获取标签 API 接口开关
define('API_SYNLOGIN', 1);      // note 同步登录 API 接口开关
define('API_SYNLOGOUT', 1);     // note 同步登出 API 接口开关
define('API_UPDATEPW', 1);      // note 更改用户密码 开关
define('API_UPDATEBADWORDS', 1); // note 更新关键字列表 开关
define('API_UPDATEHOSTS', 1);   // note 更新域名解析缓存 开关
define('API_UPDATEAPPS', 1);    // note 更新应用列表 开关
define('API_UPDATECLIENT', 1);  // note 更新客户端缓存 开关
define('API_UPDATECREDIT', 1);  // note 更新用户积分 开关
define('API_GETCREDITSETTINGS', 1);  // note 向 UCenter 提供积分设置 开关
define('API_GETCREDIT', 1);     // note 获取用户的某项积分 开关
define('API_UPDATECREDITSETTINGS', 1);  // note 更新应用积分设置 开关

define('API_RETURN_SUCCEED', '1');
define('API_RETURN_FAILED', '-1');
define('API_RETURN_FORBIDDEN', '-2');

define('IN_ECS', true);
require './init.php';
// 数据验证
if (! defined('IN_UC')) {
    error_reporting(0);
    set_magic_quotes_runtime(0);

    $_DCACHE = $get = $post = [];

    $code = @$_GET['code'];
    parse_str(_authcode($code, 'DECODE', UC_KEY), $get);
    $get = _stripslashes($get);

    $timestamp = time();
    if ($timestamp - $get['time'] > 3600) {
        exit('Authracation has expiried');
    }
    if (empty($get)) {
        exit('Invalid Request');
    }
}

$action = $get['action'];
include ROOT_PATH.'uc_client/lib/xml.class.php';
$post = xml_unserialize(file_get_contents('php://input'));

if (in_array($get['action'], ['test', 'deleteuser', 'renameuser', 'gettag', 'synlogin', 'synlogout', 'updatepw', 'updatebadwords', 'updatehosts', 'updateapps', 'updateclient', 'updatecredit', 'getcreditsettings', 'updatecreditsettings'])) {
    $uc_note = new uc_note;
    exit($uc_note->$get['action']($get, $post));
} else {
    exit(API_RETURN_FAILED);
}

$ecs_url = str_replace('/api', '', $ecs->url());

class uc_note
{
    public $db = '';

    public $tablepre = '';

    public $appdir = '';

    public function _serialize($arr, $htmlon = 0)
    {
        if (! function_exists('xml_serialize')) {
            include ROOT_PATH.'uc_client/lib/xml.class.php';
        }

        return xml_serialize($arr, $htmlon);
    }

    public function uc_note()
    {
        $this->appdir = ROOT_PATH;
        $this->db = $GLOBALS['db'];
    }

    public function test($get, $post)
    {
        return API_RETURN_SUCCEED;
    }

    public function deleteuser($get, $post)
    {
        $uids = $get['ids'];
        if (! API_DELETEUSER) {
            return API_RETURN_FORBIDDEN;
        }

        if (delete_user($uids)) {
            return API_RETURN_SUCCEED;
        }
    }

    public function renameuser($get, $post)
    {
        $uid = $get['uid'];
        $usernameold = $get['oldusername'];
        $usernamenew = $get['newusername'];
        if (! API_RENAMEUSER) {
            return API_RETURN_FORBIDDEN;
        }
        $this->db->query('UPDATE '.$GLOBALS['ecs']->table('users')." SET user_name='$usernamenew' WHERE user_id='$uid'");
        $this->db->query('UPDATE '.$GLOBALS['ecs']->table('affiliate_log')." SET user_name='$usernamenew' WHERE user_name='$usernameold'");
        $this->db->query('UPDATE '.$GLOBALS['ecs']->table('comment')." SET user_name='$usernamenew' WHERE user_name='$usernameold'");
        $this->db->query('UPDATE '.$GLOBALS['ecs']->table('feedback')." SET user_name='$usernamenew' WHERE user_name='$usernameold'");
        clear_cache_files();

        return API_RETURN_SUCCEED;
    }

    public function gettag($get, $post)
    {
        $name = $get['id'];
        if (! API_GETTAG) {
            return API_RETURN_FORBIDDEN;
        }
        $tags = fetch_tag($name);
        $return = [$name, $tags];
        include_once ROOT_PATH.'uc_client/client.php';

        return uc_serialize($return, 1);
    }

    public function synlogin($get, $post)
    {
        $uid = intval($get['uid']);
        $username = $get['username'];
        if (! API_SYNLOGIN) {
            return API_RETURN_FORBIDDEN;
        }
        header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
        set_login($uid, $username);
    }

    public function synlogout($get, $post)
    {
        if (! API_SYNLOGOUT) {
            return API_RETURN_FORBIDDEN;
        }

        header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
        set_cookie();
        set_session();
    }

    public function updatepw($get, $post)
    {
        if (! API_UPDATEPW) {
            return API_RETURN_FORBIDDEN;
        }
        $username = $get['username'];
        // $password = md5($get['password']);
        $newpw = md5(time().rand(100000, 999999));
        $this->db->query('UPDATE '.$GLOBALS['ecs']->table('users')." SET password='$newpw' WHERE user_name='$username'");

        return API_RETURN_SUCCEED;
    }

    public function updatebadwords($get, $post)
    {
        if (! API_UPDATEBADWORDS) {
            return API_RETURN_FORBIDDEN;
        }
        $cachefile = $this->appdir.'./uc_client/data/cache/badwords.php';
        $fp = fopen($cachefile, 'w');
        $data = [];
        if (is_array($post)) {
            foreach ($post as $k => $v) {
                $data['findpattern'][$k] = $v['findpattern'];
                $data['replace'][$k] = $v['replacement'];
            }
        }
        $s = "<?php\r\n";
        $s .= '$_CACHE[\'badwords\'] = '.var_export($data, true).";\r\n";
        fwrite($fp, $s);
        fclose($fp);

        return API_RETURN_SUCCEED;
    }

    public function updatehosts($get, $post)
    {
        if (! API_UPDATEHOSTS) {
            return API_RETURN_FORBIDDEN;
        }
        $cachefile = $this->appdir.'./uc_client/data/cache/hosts.php';
        $fp = fopen($cachefile, 'w');
        $s = "<?php\r\n";
        $s .= '$_CACHE[\'hosts\'] = '.var_export($post, true).";\r\n";
        fwrite($fp, $s);
        fclose($fp);

        return API_RETURN_SUCCEED;
    }

    public function updateapps($get, $post)
    {
        if (! API_UPDATEAPPS) {
            return API_RETURN_FORBIDDEN;
        }
        $UC_API = $post['UC_API'];

        $cachefile = $this->appdir.'./uc_client/data/cache/apps.php';
        $fp = fopen($cachefile, 'w');
        $s = "<?php\r\n";
        $s .= '$_CACHE[\'apps\'] = '.var_export($post, true).";\r\n";
        fwrite($fp, $s);
        fclose($fp);

        // clear_cache_files();
        return API_RETURN_SUCCEED;
    }

    public function updateclient($get, $post)
    {
        if (! API_UPDATECLIENT) {
            return API_RETURN_FORBIDDEN;
        }
        $cachefile = $this->appdir.'./uc_client/data/cache/settings.php';
        $fp = fopen($cachefile, 'w');
        $s = "<?php\r\n";
        $s .= '$_CACHE[\'settings\'] = '.var_export($post, true).";\r\n";
        fwrite($fp, $s);
        fclose($fp);

        return API_RETURN_SUCCEED;
    }

    public function updatecredit($get, $post)
    {
        if (! API_UPDATECREDIT) {
            return API_RETURN_FORBIDDEN;
        }
        $cfg = unserialize($GLOBALS['_CFG']['integrate_config']);
        $credit = intval($get['credit']);
        $amount = intval($get['amount']);
        $uid = intval($get['uid']);
        $points = [0 => 'rank_points', 1 => 'pay_points'];
        $sql = 'UPDATE '.$GLOBALS['ecs']->table('users')." SET {$points[$credit]} = {$points[$credit]} + '$amount' WHERE user_id = $uid";
        $this->db->query($sql);
        if ($this->db->affected_rows() <= 0) {
            return API_RETURN_FAILED;
        }
        $sql = 'INSERT INTO '.$GLOBALS['ecs']->table('account_log')."(user_id, {$points[$credit]}, change_time, change_desc, change_type)".
            " VALUES ('$uid', '$amount', '".gmtime()."', '".$cfg['uc_lang']['exchange']."', '99')";
        $this->db->query($sql);

        return API_RETURN_SUCCEED;
    }

    public function getcredit($get, $post)
    {
        if (! API_GETCREDIT) {
            return API_RETURN_FORBIDDEN;
        }

        /*$uid = intval($get['uid']);
        $credit = intval($get['credit']);
        return $credit >= 1 && $credit <= 8 ? $this->db->result_first("SELECT extcredits$credit FROM ".$this->tablepre."members WHERE uid='$uid'") : 0;*/
    }

    public function getcreditsettings($get, $post)
    {
        if (! API_GETCREDITSETTINGS) {
            return API_RETURN_FORBIDDEN;
        }
        $cfg = unserialize($GLOBALS['_CFG']['integrate_config']);
        $credits = $cfg['uc_lang']['credits'];
        include_once ROOT_PATH.'uc_client/client.php';

        return uc_serialize($credits);
    }

    public function updatecreditsettings($get, $post)
    {
        if (! API_UPDATECREDITSETTINGS) {
            return API_RETURN_FORBIDDEN;
        }

        $outextcredits = [];
        foreach ($get['credit'] as $appid => $credititems) {
            if ($appid == UC_APPID) {
                foreach ($credititems as $value) {
                    $outextcredits[] = [
                        'appiddesc' => $value['appiddesc'],
                        'creditdesc' => $value['creditdesc'],
                        'creditsrc' => $value['creditsrc'],
                        'title' => $value['title'],
                        'unit' => $value['unit'],
                        'ratio' => $value['ratio'],
                    ];
                }
            }
        }
        $this->db->query('UPDATE '.$GLOBALS['ecs']->table('shop_config')." SET value='".serialize($outextcredits)."' WHERE code='points_rule'");

        return API_RETURN_SUCCEED;
    }
}

/**
 *  删除用户接口函数
 *
 * @param  int  $uids
 * @return void
 */
function delete_user($uids = '')
{
    if (empty($uids)) {
        return;
    } else {
        $uids = stripslashes($uids);
        $sql = 'DELETE FROM '.$GLOBALS['ecs']->table('users')." WHERE user_id IN ($uids)";
        $result = $GLOBALS['db']->query($sql);

        return true;
    }
}

/**
 * 设置用户登陆
 *
 * @param  int  $uid
 * @return void
 */
function set_login($user_id = '', $user_name = '')
{
    if (empty($user_id)) {
        return;
    } else {
        $sql = 'SELECT user_name, email FROM '.$GLOBALS['ecs']->table('users')." WHERE user_id='$user_id' LIMIT 1";
        $row = $GLOBALS['db']->getRow($sql);
        if ($row) {
            set_cookie($user_id, $row['user_name'], $row['email']);
            set_session($user_id, $row['user_name'], $row['email']);
            include_once ROOT_PATH.'includes/lib_main.php';
            update_user_info();
        } else {
            include_once ROOT_PATH.'uc_client/client.php';
            if ($data = uc_get_user($user_name)) {
                [$uid, $uname, $email] = $data;
                $sql = 'REPLACE INTO '.$GLOBALS['ecs']->table('users')."(user_id, user_name, email) VALUES('$uid', '$uname', '$email')";
                $GLOBALS['db']->query($sql);
                set_login($uid);
            } else {
                return false;
            }
        }
    }
}

/**
 *  设置cookie
 *
 * @return void
 */
function set_cookie($user_id = '', $user_name = '', $email = '')
{
    if (empty($user_id)) {
        /* 摧毁cookie */
        $time = time() - 3600;
        setcookie('ECS[user_id]', '', $time, null, null, null, true);
        setcookie('ECS[username]', '', $time, null, null, null, true);
        setcookie('ECS[email]', '', $time, null, null, null, true);
    } else {
        /* 设置cookie */
        $time = time() + 3600 * 24 * 30;
        setcookie('ECS[user_id]', $user_id, $time, $GLOBALS['cookie_path'], $GLOBALS['cookie_domain'], null, true);
        setcookie('ECS[username]', $user_name, $time, $GLOBALS['cookie_path'], $GLOBALS['cookie_domain'], null, true);
        setcookie('ECS[email]', $email, $time, $GLOBALS['cookie_path'], $GLOBALS['cookie_domain'], null, true);
    }
}

/**
 *  设置指定用户SESSION
 *
 * @return void
 */
function set_session($user_id = '', $user_name = '', $email = '')
{
    if (empty($user_id)) {
        $GLOBALS['sess']->destroy_session();
    } else {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['email'] = $email;
    }
}

/**
 *  获取EC的TAG数据
 *
 * @param  string  $tagname
 * @param  int  $num  获取的数量 默认取最新的100条
 * @return array
 */
function fetch_tag($tagname, $num = 100)
{
    $rewrite = intval($GLOBALS['_CFG']['rewrite']) > 0;
    $sql = 'SELECT t.*, u.user_name, g.goods_name, g.goods_img, g.shop_price FROM '.$GLOBALS['ecs']->table('tag').' as t, '.$GLOBALS['ecs']->table('users').' as u, '.
        $GLOBALS['ecs']->table('goods')." as g WHERE tag_words = '$tagname' AND t.user_id = u.user_id AND g.goods_id = t.goods_id ORDER BY t.tag_id DESC LIMIT ".$num;
    $arr = $GLOBALS['db']->getAll($sql);
    $tag_list = [];
    foreach ($arr as $k => $v) {
        $tag_list[$k]['goods_name'] = $v['goods_name'];
        $tag_list[$k]['uid'] = $v['user_id'];
        $tag_list[$k]['username'] = $v['user_name'];
        $tag_list[$k]['dateline'] = time();
        $tag_list[$k]['url'] = $GLOBALS['ecs_url'].'goods.php?id='.$v['goods_id'];
        $tag_list[$k]['image'] = $GLOBALS['ecs_url'].$v['goods_img'];
        $tag_list[$k]['goods_price'] = $v['shop_price'];
    }

    return $tag_list;
}

/**
 *  uc自带函数1
 *
 * @param  string  $string
 * @return string $string
 */
function _setcookie($var, $value, $life = 0, $prefix = 1)
{
    global $cookiepre, $cookiedomain, $cookiepath, $timestamp, $_SERVER;
    setcookie(
        ($prefix ? $cookiepre : '').$var,
        $value,
        $life ? $timestamp + $life : 0,
        $cookiepath,
        $cookiedomain,
        $_SERVER['SERVER_PORT'] == 443 ? 1 : 0,
        true
    );
}

/**
 *  uc自带函数2
 *
 *
 * @return string $string
 */
function _authcode($string, $operation = 'DECODE', $key = '', $expiry = 0)
{
    $ckey_length = 4;
    $key = md5($key ? $key : UC_KEY);
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';

    $cryptkey = $keya.md5($keya.$keyc);
    $key_length = strlen($cryptkey);

    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);

    $result = '';
    $box = range(0, 255);

    $rndkey = [];
    for ($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }

    for ($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }

    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }

    if ($operation == 'DECODE') {
        if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        return $keyc.str_replace('=', '', base64_encode($result));
    }
}

/**
 *  uc自带函数3
 *
 * @param  string  $string
 * @return string $string
 */
function _stripslashes($string)
{
    if (is_array($string)) {
        foreach ($string as $key => $val) {
            $string[$key] = _stripslashes($val);
        }
    } else {
        $string = stripslashes($string);
    }

    return $string;
}
