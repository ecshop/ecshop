<?php

namespace app\controller\admin;

/**
 *  云服务接口
 */
class CloudController extends InitController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {

        $data['api_ver'] = '1.0';
        $data['version'] = VERSION;
        $data['ecs_lang'] = config('shop.lang');
        $data['release'] = RELEASE;
        $data['charset'] = strtoupper(EC_CHARSET);
        $data['certificate_id'] = config('shop.certificate_id');
        $data['token'] = md5(config('shop.token'));
        $data['certi'] = config('shop.certi');
        $data['php_ver'] = PHP_VERSION;
        $data['mysql_ver'] = $db->version();
        $data['shop_url'] = urlencode($ecs->url());
        $data['admin_url'] = urlencode($ecs->url() . ADMIN_PATH);
        $data['sess_id'] = $GLOBALS['sess']->get_session_id();
        $data['stamp'] = time();
        $data['ent_id'] = config('shop.ent_id');
        $data['ent_ac'] = config('shop.ent_ac');
        $data['ent_sign'] = config('shop.ent_sign');
        $data['ent_email'] = config('shop.ent_email');

        $act = !empty($_REQUEST['act']) ? $_REQUEST['act'] : 'index';

        $must = array('version', 'ecs_lang', 'charset', 'stamp', 'api_ver');

        if ($act == 'default') {
            admin_priv('all');
            if (empty($_GET['act'])) {
                $act = 'index';
            } else {
                $query = '';
                $act = trim($_GET['act']);
                foreach ($_GET as $k => $v) {
                    if (array_key_exists($k, $data)) {
                        $query .= '&' . $k . '=' . $data[$k];
                    }
                }
            }
            if (!empty($_GET['link'])) {
                $url = parse_url($_GET['link']);
                if (!empty($url['host'])) {
                    return redirect("" . $url['scheme'] . "://" . $url['host'] . $url['path'] . "?" . $url['query'] . $query);
                }
            }

            foreach ($must as $v) {
                $query .= '&' . $v . '=' . $data[$v];
            }
            return redirect("http://cloud.ecshop.com/api.php?act=" . $act . $query);
        }
    }
}
