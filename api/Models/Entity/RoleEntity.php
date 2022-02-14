<?php

namespace App\Models\Entity;

/**
 * Class RoleEntity
 * @package App\Models\Entity
 */
class RoleEntity
{
    /**
     * @var int 
     */
    private int $role_id;

    /**
     * @var string 
     */
    private string $role_name;

    /**
     * @var string 
     */
    private string $action_list;

    /**
     * @var string 
     */
    private string $role_describe;

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

    /**
     * @return string
     */
    public function getRoleName(): string
    {
        return $this->role_name;
    }

    /**
     * @param string $value
     */
    public function setRoleName(string $value)
    {
        $this->role_name = $value;
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
    public function getRoleDescribe(): string
    {
        return $this->role_describe;
    }

    /**
     * @param string $value
     */
    public function setRoleDescribe(string $value)
    {
        $this->role_describe = $value;
    }

}
