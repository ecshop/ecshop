<?php

namespace App\Models\Entity;

/**
 * Class PasswordResetEntity
 * @package App\Models\Entity
 */
class PasswordResetEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var string 
     */
    private string $type;

    /**
     * @var string 
     */
    private string $passport;

    /**
     * @var string 
     */
    private string $token;

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value)
    {
        $this->type = $value;
    }

    /**
     * @return string
     */
    public function getPassport(): string
    {
        return $this->passport;
    }

    /**
     * @param string $value
     */
    public function setPassport(string $value)
    {
        $this->passport = $value;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $value
     */
    public function setToken(string $value)
    {
        $this->token = $value;
    }

}
