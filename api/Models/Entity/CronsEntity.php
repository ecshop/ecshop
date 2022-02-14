<?php

namespace App\Models\Entity;

/**
 * Class CronsEntity
 * @package App\Models\Entity
 */
class CronsEntity
{
    /**
     * @var int 
     */
    private int $cron_id;

    /**
     * @var string 
     */
    private string $cron_code;

    /**
     * @var string 
     */
    private string $cron_name;

    /**
     * @var string 
     */
    private string $cron_desc;

    /**
     * @var int 
     */
    private int $cron_order;

    /**
     * @var string 
     */
    private string $cron_config;

    /**
     * @var int 
     */
    private int $thistime;

    /**
     * @var int 
     */
    private int $nextime;

    /**
     * @var int 
     */
    private int $day;

    /**
     * @var string 
     */
    private string $week;

    /**
     * @var string 
     */
    private string $hour;

    /**
     * @var string 
     */
    private string $minute;

    /**
     * @var int 
     */
    private int $enable;

    /**
     * @var int 
     */
    private int $run_once;

    /**
     * @var string 
     */
    private string $allow_ip;

    /**
     * @var string 
     */
    private string $alow_files;

    /**
     * @return int
     */
    public function getCronId(): int
    {
        return $this->cron_id;
    }

    /**
     * @param int $value
     */
    public function setCronId(int $value)
    {
        $this->cron_id = $value;
    }

    /**
     * @return string
     */
    public function getCronCode(): string
    {
        return $this->cron_code;
    }

    /**
     * @param string $value
     */
    public function setCronCode(string $value)
    {
        $this->cron_code = $value;
    }

    /**
     * @return string
     */
    public function getCronName(): string
    {
        return $this->cron_name;
    }

    /**
     * @param string $value
     */
    public function setCronName(string $value)
    {
        $this->cron_name = $value;
    }

    /**
     * @return string
     */
    public function getCronDesc(): string
    {
        return $this->cron_desc;
    }

    /**
     * @param string $value
     */
    public function setCronDesc(string $value)
    {
        $this->cron_desc = $value;
    }

    /**
     * @return int
     */
    public function getCronOrder(): int
    {
        return $this->cron_order;
    }

    /**
     * @param int $value
     */
    public function setCronOrder(int $value)
    {
        $this->cron_order = $value;
    }

    /**
     * @return string
     */
    public function getCronConfig(): string
    {
        return $this->cron_config;
    }

    /**
     * @param string $value
     */
    public function setCronConfig(string $value)
    {
        $this->cron_config = $value;
    }

    /**
     * @return int
     */
    public function getThistime(): int
    {
        return $this->thistime;
    }

    /**
     * @param int $value
     */
    public function setThistime(int $value)
    {
        $this->thistime = $value;
    }

    /**
     * @return int
     */
    public function getNextime(): int
    {
        return $this->nextime;
    }

    /**
     * @param int $value
     */
    public function setNextime(int $value)
    {
        $this->nextime = $value;
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @param int $value
     */
    public function setDay(int $value)
    {
        $this->day = $value;
    }

    /**
     * @return string
     */
    public function getWeek(): string
    {
        return $this->week;
    }

    /**
     * @param string $value
     */
    public function setWeek(string $value)
    {
        $this->week = $value;
    }

    /**
     * @return string
     */
    public function getHour(): string
    {
        return $this->hour;
    }

    /**
     * @param string $value
     */
    public function setHour(string $value)
    {
        $this->hour = $value;
    }

    /**
     * @return string
     */
    public function getMinute(): string
    {
        return $this->minute;
    }

    /**
     * @param string $value
     */
    public function setMinute(string $value)
    {
        $this->minute = $value;
    }

    /**
     * @return int
     */
    public function getEnable(): int
    {
        return $this->enable;
    }

    /**
     * @param int $value
     */
    public function setEnable(int $value)
    {
        $this->enable = $value;
    }

    /**
     * @return int
     */
    public function getRunOnce(): int
    {
        return $this->run_once;
    }

    /**
     * @param int $value
     */
    public function setRunOnce(int $value)
    {
        $this->run_once = $value;
    }

    /**
     * @return string
     */
    public function getAllowIp(): string
    {
        return $this->allow_ip;
    }

    /**
     * @param string $value
     */
    public function setAllowIp(string $value)
    {
        $this->allow_ip = $value;
    }

    /**
     * @return string
     */
    public function getAlowFiles(): string
    {
        return $this->alow_files;
    }

    /**
     * @param string $value
     */
    public function setAlowFiles(string $value)
    {
        $this->alow_files = $value;
    }

}
