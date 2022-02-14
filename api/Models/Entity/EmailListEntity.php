<?php

namespace App\Models\Entity;

/**
 * Class EmailListEntity
 * @package App\Models\Entity
 */
class EmailListEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var string 
     */
    private string $email;

    /**
     * @var int 
     */
    private int $stat;

    /**
     * @var string 
     */
    private string $hash;

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value)
    {
        $this->email = $value;
    }

    /**
     * @return int
     */
    public function getStat(): int
    {
        return $this->stat;
    }

    /**
     * @param int $value
     */
    public function setStat(int $value)
    {
        $this->stat = $value;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $value
     */
    public function setHash(string $value)
    {
        $this->hash = $value;
    }

}
