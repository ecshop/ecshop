<?php

namespace App\Models\Entity;

/**
 * Class AdminLogEntity
 * @package App\Models\Entity
 */
class AdminLogEntity
{
    /**
     * @var int 
     */
    private int $log_id;

    /**
     * @var int 
     */
    private int $log_time;

    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $log_info;

    /**
     * @var string 
     */
    private string $ip_address;

    /**
     * @return int
     */
    public function getLogId(): int
    {
        return $this->log_id;
    }

    /**
     * @param int $value
     */
    public function setLogId(int $value)
    {
        $this->log_id = $value;
    }

    /**
     * @return int
     */
    public function getLogTime(): int
    {
        return $this->log_time;
    }

    /**
     * @param int $value
     */
    public function setLogTime(int $value)
    {
        $this->log_time = $value;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $value
     */
    public function setUserId(int $value)
    {
        $this->user_id = $value;
    }

    /**
     * @return string
     */
    public function getLogInfo(): string
    {
        return $this->log_info;
    }

    /**
     * @param string $value
     */
    public function setLogInfo(string $value)
    {
        $this->log_info = $value;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ip_address;
    }

    /**
     * @param string $value
     */
    public function setIpAddress(string $value)
    {
        $this->ip_address = $value;
    }

}
