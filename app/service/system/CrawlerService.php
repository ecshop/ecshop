<?php

namespace app\service\system;

use think\facade\Db;

/**
 * Class CrawlerService
 * @package app\service\system
 */
class CrawlerService
{
    /**
     * 判断是否为搜索引擎蜘蛛
     * @param bool $record
     * @return string
     */
    public function is_spider($record = true)
    {
        static $spider = null;

        if ($spider !== null) {
            return $spider;
        }

        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $spider = '';

            return false;
        }

        $searchengine_bot = array(
            'googlebot',
            'mediapartners-google',
            'baiduspider+',
            'msnbot',
            'yodaobot',
            'yahoo! slurp;',
            'yahoo! slurp china;',
            'iaskspider',
            'sogou web spider',
            'sogou push spider'
        );

        $searchengine_name = array(
            'GOOGLE',
            'GOOGLE ADSENSE',
            'BAIDU',
            'MSN',
            'YODAO',
            'YAHOO',
            'Yahoo China',
            'IASK',
            'SOGOU',
            'SOGOU'
        );

        $spider = strtolower($_SERVER['HTTP_USER_AGENT']);

        foreach ($searchengine_bot as $key => $value) {
            if (strpos($spider, $value) !== false) {
                $spider = $searchengine_name[$key];

                if ($record === true) {
                    Db::name('searchengine')->replace()->insert(array(
                        'date' => local_date('Y-m-d'),
                        'searchengine' => $spider,
                        'count' => 1));
                }

                return true;
            }
        }

        $spider = '';

        return false;
    }

}
