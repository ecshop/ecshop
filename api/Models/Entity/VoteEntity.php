<?php

namespace App\Models\Entity;

/**
 * Class VoteEntity
 * @package App\Models\Entity
 */
class VoteEntity
{
    /**
     * @var int 
     */
    private int $vote_id;

    /**
     * @var string 
     */
    private string $vote_name;

    /**
     * @var int 
     */
    private int $start_time;

    /**
     * @var int 
     */
    private int $end_time;

    /**
     * @var int 
     */
    private int $can_multi;

    /**
     * @var int 
     */
    private int $vote_count;

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
    public function getVoteName(): string
    {
        return $this->vote_name;
    }

    /**
     * @param string $value
     */
    public function setVoteName(string $value)
    {
        $this->vote_name = $value;
    }

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->start_time;
    }

    /**
     * @param int $value
     */
    public function setStartTime(int $value)
    {
        $this->start_time = $value;
    }

    /**
     * @return int
     */
    public function getEndTime(): int
    {
        return $this->end_time;
    }

    /**
     * @param int $value
     */
    public function setEndTime(int $value)
    {
        $this->end_time = $value;
    }

    /**
     * @return int
     */
    public function getCanMulti(): int
    {
        return $this->can_multi;
    }

    /**
     * @param int $value
     */
    public function setCanMulti(int $value)
    {
        $this->can_multi = $value;
    }

    /**
     * @return int
     */
    public function getVoteCount(): int
    {
        return $this->vote_count;
    }

    /**
     * @param int $value
     */
    public function setVoteCount(int $value)
    {
        $this->vote_count = $value;
    }

}
