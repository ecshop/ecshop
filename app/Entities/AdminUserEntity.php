<?php

declare(strict_types=1);

namespace App\Entities;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminUserEntity')]
class AdminUserEntity
{
    use DTOHelper;

    const string getUserId = 'user_id';

    const string getUserName = 'user_name';

    const string getEmail = 'email';

    const string getPassword = 'password';

    const string getEcSalt = 'ec_salt';

    const string getAddTime = 'add_time';

    const string getLastLogin = 'last_login';

    const string getLastIp = 'last_ip';

    const string getActionList = 'action_list';

    const string getNavList = 'nav_list';

    const string getLangType = 'lang_type';

    const string getAgencyId = 'agency_id';

    const string getSuppliersId = 'suppliers_id';

    const string getTodolist = 'todolist';

    const string getRoleId = 'role_id';

    #[OA\Property(property: 'userId', description: '', type: 'integer')]
    private int $userId;

    #[OA\Property(property: 'userName', description: '', type: 'string')]
    private string $userName;

    #[OA\Property(property: 'email', description: '', type: 'string')]
    private string $email;

    #[OA\Property(property: 'password', description: '', type: 'string')]
    private string $password;

    #[OA\Property(property: 'ecSalt', description: '', type: 'string')]
    private string $ecSalt;

    #[OA\Property(property: 'addTime', description: '', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'lastLogin', description: '', type: 'integer')]
    private int $lastLogin;

    #[OA\Property(property: 'lastIp', description: '', type: 'string')]
    private string $lastIp;

    #[OA\Property(property: 'actionList', description: '', type: 'string')]
    private string $actionList;

    #[OA\Property(property: 'navList', description: '', type: 'string')]
    private string $navList;

    #[OA\Property(property: 'langType', description: '', type: 'string')]
    private string $langType;

    #[OA\Property(property: 'agencyId', description: '', type: 'integer')]
    private int $agencyId;

    #[OA\Property(property: 'suppliersId', description: '', type: 'integer')]
    private int $suppliersId;

    #[OA\Property(property: 'todolist', description: '', type: 'string')]
    private string $todolist;

    #[OA\Property(property: 'roleId', description: '', type: 'integer')]
    private int $roleId;

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
