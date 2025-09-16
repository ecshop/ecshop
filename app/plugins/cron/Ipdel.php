<?php

declare(strict_types=1);

namespace app\plugins\cron;

class Ipdel {
    public function config()
    {
            /* 代码 */
            $modules[$i]['code'] = basename(__FILE__, '.php');

            /* 描述对应的语言项 */
            $modules[$i]['desc'] = 'ipdel_desc';

            /* 作者 */
            $modules[$i]['author'] = 'ECSHOP TEAM';

            /* 网址 */
            $modules[$i]['website'] = 'http://www.ecshop.com';

            /* 版本号 */
            $modules[$i]['version'] = '1.0.0';

            /* 配置信息 */
            $modules[$i]['config'] = [
                ['name' => 'ipdel_day', 'type' => 'select', 'value' => '30'],
            ];
    }

    public function handle()
    {

        empty($cron['ipdel_day']) && $cron['ipdel_day'] = 7;

        $deltime = gmtime() - $cron['ipdel_day'] * 3600 * 24;
        $sql = 'DELETE FROM '.$ecs->table('stats').
            "WHERE  access_time < '$deltime'";
        $db->query($sql);

    }
}

