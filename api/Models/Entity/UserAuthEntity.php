<?php

namespace App\Models\Entity;

/**
 * Class UserAuthEntity
 * @package App\Models\Entity
 */
class UserAuthEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $user_id;

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
    private string $password;

    /**
     * @var string 
     */
    private string $salt;

    /**
     * @var string 
     */
    private string $access_token;

    /**
     * @var string 
     */
    private string $refresh_token;

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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $value
     */
    public function setPassword(string $value)
    {
        $this->password = $value;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $value
     */
    public function setSalt(string $value)
    {
        $this->salt = $value;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * @param string $value
     */
    public function setAccessToken(string $value)
    {
        $this->access_token = $value;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refresh_token;
    }

    /**
     * @param string $value
     */
    public function setRefreshToken(string $value)
    {
        $this->refresh_token = $value;
    }

}
