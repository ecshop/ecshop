<?php

namespace App\Models\Entity;

/**
 * Class VoteOptionEntity
 * @package App\Models\Entity
 */
class VoteOptionEntity
{
    /**
     * @var int 
     */
    private int $option_id;

    /**
     * @var int 
     */
    private int $vote_id;

    /**
     * @var string 
     */
    private string $option_name;

    /**
     * @var int 
     */
    private int $option_count;

    /**
     * @var int 
     */
    private int $option_order;

    /**
     * @return int
     */
    public function getOptionId(): int
    {
        return $this->option_id;
    }

    /**
     * @param int $value
     */
    public function setOptionId(int $value)
    {
        $this->option_id = $value;
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
    public function getOptionName(): string
    {
        return $this->option_name;
    }

    /**
     * @param string $value
     */
    public function setOptionName(string $value)
    {
        $this->option_name = $value;
    }

    /**
     * @return int
     */
    public function getOptionCount(): int
    {
        return $this->option_count;
    }

    /**
     * @param int $value
     */
    public function setOptionCount(int $value)
    {
        $this->option_count = $value;
    }

    /**
     * @return int
     */
    public function getOptionOrder(): int
    {
        return $this->option_order;
    }

    /**
     * @param int $value
     */
    public function setOptionOrder(int $value)
    {
        $this->option_order = $value;
    }

}
