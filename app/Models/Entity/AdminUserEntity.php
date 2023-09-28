<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminUserEntity')]
class AdminUserEntity
{
    use ArrayObject;

    #[OA\Property(property: 'user_id', description: '', type: 'integer')]
    protected int $userId;

    #[OA\Property(property: 'user_name', description: '', type: 'string')]
    protected string $userName;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    protected string $email;

    #[OA\Property(property: 'password', description: '', type: 'string')]
    protected string $password;

    #[OA\Property(property: 'ec_salt', description: '', type: 'string')]
    protected string $ecSalt;

    #[OA\Property(property: 'add_time', description: '', type: 'integer')]
    protected int $addTime;

    #[OA\Property(property: 'last_login', description: '', type: 'integer')]
    protected int $lastLogin;

    #[OA\Property(property: 'last_ip', description: '', type: 'string')]
    protected string $lastIp;

    #[OA\Property(property: 'action_list', description: '', type: 'string')]
    protected string $actionList;

    #[OA\Property(property: 'nav_list', description: '', type: 'string')]
    protected string $navList;

    #[OA\Property(property: 'lang_type', description: '', type: 'string')]
    protected string $langType;

    #[OA\Property(property: 'agency_id', description: '', type: 'integer')]
    protected int $agencyId;

    #[OA\Property(property: 'suppliers_id', description: '', type: 'integer')]
    protected int $suppliersId;

    #[OA\Property(property: 'todolist', description: '', type: 'string')]
    protected string $todolist;

    #[OA\Property(property: 'role_id', description: '', type: 'integer')]
    protected int $roleId;

    /**
     * 获取
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * 设置
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * 获取
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * 设置
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * 获取
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * 设置
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * 获取
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * 设置
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * 获取
     */
    public function getEcSalt(): string
    {
        return $this->ecSalt;
    }

    /**
     * 设置
     */
    public function setEcSalt(string $ecSalt): void
    {
        $this->ecSalt = $ecSalt;
    }

    /**
     * 获取
     */
    public function getAddTime(): int
    {
        return $this->addTime;
    }

    /**
     * 设置
     */
    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    /**
     * 获取
     */
    public function getLastLogin(): int
    {
        return $this->lastLogin;
    }

    /**
     * 设置
     */
    public function setLastLogin(int $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * 获取
     */
    public function getLastIp(): string
    {
        return $this->lastIp;
    }

    /**
     * 设置
     */
    public function setLastIp(string $lastIp): void
    {
        $this->lastIp = $lastIp;
    }

    /**
     * 获取
     */
    public function getActionList(): string
    {
        return $this->actionList;
    }

    /**
     * 设置
     */
    public function setActionList(string $actionList): void
    {
        $this->actionList = $actionList;
    }

    /**
     * 获取
     */
    public function getNavList(): string
    {
        return $this->navList;
    }

    /**
     * 设置
     */
    public function setNavList(string $navList): void
    {
        $this->navList = $navList;
    }

    /**
     * 获取
     */
    public function getLangType(): string
    {
        return $this->langType;
    }

    /**
     * 设置
     */
    public function setLangType(string $langType): void
    {
        $this->langType = $langType;
    }

    /**
     * 获取
     */
    public function getAgencyId(): int
    {
        return $this->agencyId;
    }

    /**
     * 设置
     */
    public function setAgencyId(int $agencyId): void
    {
        $this->agencyId = $agencyId;
    }

    /**
     * 获取
     */
    public function getSuppliersId(): int
    {
        return $this->suppliersId;
    }

    /**
     * 设置
     */
    public function setSuppliersId(int $suppliersId): void
    {
        $this->suppliersId = $suppliersId;
    }

    /**
     * 获取
     */
    public function getTodolist(): string
    {
        return $this->todolist;
    }

    /**
     * 设置
     */
    public function setTodolist(string $todolist): void
    {
        $this->todolist = $todolist;
    }

    /**
     * 获取
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * 设置
     */
    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }
}
