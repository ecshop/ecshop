<?php

namespace App\Models\Entity;

/**
 * Class AdminActionEntity
 * @package App\Models\Entity
 */
class AdminActionEntity
{
    /**
     * @var int 
     */
    private int $action_id;

    /**
     * @var int 
     */
    private int $parent_id;

    /**
     * @var string 
     */
    private string $action_code;

    /**
     * @var string 
     */
    private string $relevance;

    /**
     * @return int
     */
    public function getActionId(): int
    {
        return $this->action_id;
    }

    /**
     * @param int $value
     */
    public function setActionId(int $value)
    {
        $this->action_id = $value;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @param int $value
     */
    public function setParentId(int $value)
    {
        $this->parent_id = $value;
    }

    /**
     * @return string
     */
    public function getActionCode(): string
    {
        return $this->action_code;
    }

    /**
     * @param string $value
     */
    public function setActionCode(string $value)
    {
        $this->action_code = $value;
    }

    /**
     * @return string
     */
    public function getRelevance(): string
    {
        return $this->relevance;
    }

    /**
     * @param string $value
     */
    public function setRelevance(string $value)
    {
        $this->relevance = $value;
    }

}
