<?php

namespace App\Models\Entity;

/**
 * Class VoteLogEntity
 * @package App\Models\Entity
 */
class VoteLogEntity
{
    /**
     * @var int 
     */
    private int $log_id;

    /**
     * @var int 
     */
    private int $vote_id;

    /**
     * @var string 
     */
    private string $ip_address;

    /**
     * @var int 
     */
    private int $vote_time;

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
    public function getVoteId(): int
    {
        return $this->vote_id;
    }

    /**
     * @param int $value
     */
    public function setVoteId(int $value)
    {
        $this->vote_id = $value;
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

    /**
     * @return int
     */
    public function getVoteTime(): int
    {
        return $this->vote_time;
    }

    /**
     * @param int $value
     */
    public function setVoteTime(int $value)
    {
        $this->vote_time = $value;
    }

}
