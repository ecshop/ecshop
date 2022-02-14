<?php

namespace App\Models\Entity;

/**
 * Class ErrorLogEntity
 * @package App\Models\Entity
 */
class ErrorLogEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var string 
     */
    private string $info;

    /**
     * @var string 
     */
    private string $file;

    /**
     * @var int 
     */
    private int $time;

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
     * @return string
     */
    public function getInfo(): string
    {
        return $this->info;
    }

    /**
     * @param string $value
     */
    public function setInfo(string $value)
    {
        $this->info = $value;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $value
     */
    public function setFile(string $value)
    {
        $this->file = $value;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $value
     */
    public function setTime(int $value)
    {
        $this->time = $value;
    }

}
