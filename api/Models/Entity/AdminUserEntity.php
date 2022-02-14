<?php

namespace App\Models\Entity;

/**
 * Class AdminUserEntity
 * @package App\Models\Entity
 */
class AdminUserEntity
{
    /**
     * @var int 
     */
    private int $user_id;

    /**
     * @var string 
     */
    private string $user_name;

    /**
     * @var string 
     */
    private string $email;

    /**
     * @var string 
     */
    private string $password;

    /**
     * @var string 
     */
    private string $ec_salt;

    /**
     * @var int 
     */
    private int $add_time;

    /**
     * @var int 
     */
    private int $last_login;

    /**
     * @var string 
     */
    private string $last_ip;

    /**
     * @var string 
     */
    private string $action_list;

    /**
     * @var string 
     */
    private string $nav_list;

    /**
     * @var string 
     */
    private string $lang_type;

    /**
     * @var int 
     */
    private int $agency_id;

    /**
     * @var int 
     */
    private int $suppliers_id;

    /**
     * @var string 
     */
    private string $todolist;

    /**
     * @var int 
     */
    private int $role_id;

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
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $value
     */
    public function setUserName(string $value)
    {
        $this->user_name = $value;
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
    public function getEcSalt(): string
    {
        return $this->ec_salt;
    }

    /**
     * @param string $value
     */
    public function setEcSalt(string $value)
    {
        $this->ec_salt = $value;
    }

    /**
     * @return int
     */
    public function getAddTime(): int
    {
        return $this->add_time;
    }

    /**
     * @param int $value
     */
    public function setAddTime(int $value)
    {
        $this->add_time = $value;
    }

    /**
     * @return int
     */
    public function getLastLogin(): int
    {
        return $this->last_login;
    }

    /**
     * @param int $value
     */
    public function setLastLogin(int $value)
    {
        $this->last_login = $value;
    }

    /**
     * @return string
     */
    public function getLastIp(): string
    {
        return $this->last_ip;
    }

    /**
     * @param string $value
     */
    public function setLastIp(string $value)
    {
        $this->last_ip = $value;
    }

    /**
     * @return string
     */
    public function getActionList(): string
    {
        return $this->action_list;
    }

    /**
     * @param string $value
     */
    public function setActionList(string $value)
    {
        $this->action_list = $value;
    }

    /**
     * @return string
     */
    public function getNavList(): string
    {
        return $this->nav_list;
    }

    /**
     * @param string $value
     */
    public function setNavList(string $value)
    {
        $this->nav_list = $value;
    }

    /**
     * @return string
     */
    public function getLangType(): string
    {
        return $this->lang_type;
    }

    /**
     * @param string $value
     */
    public function setLangType(string $value)
    {
        $this->lang_type = $value;
    }

    /**
     * @return int
     */
    public function getAgencyId(): int
    {
        return $this->agency_id;
    }

    /**
     * @param int $value
     */
    public function setAgencyId(int $value)
    {
        $this->agency_id = $value;
    }

    /**
     * @return int
     */
    public function getSuppliersId(): int
    {
        return $this->suppliers_id;
    }

    /**
     * @param int $value
     */
    public function setSuppliersId(int $value)
    {
        $this->suppliers_id = $value;
    }

    /**
     * @return string
     */
    public function getTodolist(): string
    {
        return $this->todolist;
    }

    /**
     * @param string $value
     */
    public function setTodolist(string $value)
    {
        $this->todolist = $value;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->role_id;
    }

    /**
     * @param int $value
     */
    public function setRoleId(int $value)
    {
        $this->role_id = $value;
    }

}
