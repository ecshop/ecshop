<?php

namespace App\Models\Entity;

/**
 * Class SearchengineEntity
 * @package App\Models\Entity
 */
class SearchengineEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var date 
     */
    private date $date;

    /**
     * @var string 
     */
    private string $searchengine;

    /**
     * @var int 
     */
    private int $count;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value)
    {
        $this->id = $value;
    }

    /**
     * @return date
     */
    public function getDate(): date
    {
        return $this->date;
    }

    /**
     * @param date $value
     */
    public function setDate(date $value)
    {
        $this->date = $value;
    }

    /**
     * @return string
     */
    public function getSearchengine(): string
    {
        return $this->searchengine;
    }

    /**
     * @param string $value
     */
    public function setSearchengine(string $value)
    {
        $this->searchengine = $value;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $value
     */
    public function setCount(int $value)
    {
        $this->count = $value;
    }

}
