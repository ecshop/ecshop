<?php

namespace app\support\sitemap;

class SitemapItem
{
    /**
     * @access   public
     * @param string $loc 位置
     * @param string $lastmod 日期格式 YYYY-MM-DD
     * @param string $changefreq 更新频率的单位 (always, hourly, daily, weekly, monthly, yearly, never)
     * @param string $priority 更新频率 0-1
     */
    public function __construct($loc, $lastmod = '', $changefreq = '', $priority = '')
    {
        $this->loc = $loc;
        $this->lastmod = $lastmod;
        $this->changefreq = $changefreq;
        $this->priority = $priority;
    }
}
