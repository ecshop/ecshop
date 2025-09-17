<?php

declare(strict_types=1);

namespace app\modules\admin\response\adminUser;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminUserResponse')]
class AdminUserResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '用户ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'userName', description: '用户名', type: 'string')]
    private string $userName;

    #[OA\Property(property: 'email', description: '邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'password', description: '登录密码', type: 'string')]
    private string $password;

    #[OA\Property(property: 'ecSalt', description: '加密盐', type: 'string')]
    private string $ecSalt;

    #[OA\Property(property: 'addTime', description: '添加时间', type: 'integer')]
    private int $addTime;

    #[OA\Property(property: 'lastLogin', description: '最后登录时间', type: 'integer')]
    private int $lastLogin;

    #[OA\Property(property: 'lastIp', description: '最后登录IP', type: 'string')]
    private string $lastIp;

    #[OA\Property(property: 'actionList', description: '操作权限列表', type: 'string')]
    private string $actionList;

    #[OA\Property(property: 'navList', description: '导航列表', type: 'string')]
    private string $navList;

    #[OA\Property(property: 'langType', description: '语言类型', type: 'string')]
    private string $langType;

    #[OA\Property(property: 'agencyId', description: '机构ID', type: 'integer')]
    private int $agencyId;

    #[OA\Property(property: 'supplierId', description: '供应商ID', type: 'integer')]
    private int $supplierId;

    #[OA\Property(property: 'todolist', description: '待办事项', type: 'string')]
    private string $todolist;

    #[OA\Property(property: 'roleId', description: '角色ID', type: 'integer')]
    private int $roleId;

    #[OA\Property(property: 'createdTime', description: '创建时间', type: 'string')]
    private string $createdTime;

    #[OA\Property(property: 'updatedTime', description: '更新时间', type: 'string')]
    private string $updatedTime;

    #[OA\Property(property: 'deletedTime', description: '删除时间', type: 'string')]
    private string $deletedTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEcSalt(): string
    {
        return $this->ecSalt;
    }

    public function setEcSalt(string $ecSalt): void
    {
        $this->ecSalt = $ecSalt;
    }

    public function getAddTime(): int
    {
        return $this->addTime;
    }

    public function setAddTime(int $addTime): void
    {
        $this->addTime = $addTime;
    }

    public function getLastLogin(): int
    {
        return $this->lastLogin;
    }

    public function setLastLogin(int $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    public function getLastIp(): string
    {
        return $this->lastIp;
    }

    public function setLastIp(string $lastIp): void
    {
        $this->lastIp = $lastIp;
    }

    public function getActionList(): string
    {
        return $this->actionList;
    }

    public function setActionList(string $actionList): void
    {
        $this->actionList = $actionList;
    }

    public function getNavList(): string
    {
        return $this->navList;
    }

    public function setNavList(string $navList): void
    {
        $this->navList = $navList;
    }

    public function getLangType(): string
    {
        return $this->langType;
    }

    public function setLangType(string $langType): void
    {
        $this->langType = $langType;
    }

    public function getAgencyId(): int
    {
        return $this->agencyId;
    }

    public function setAgencyId(int $agencyId): void
    {
        $this->agencyId = $agencyId;
    }

    public function getSupplierId(): int
    {
        return $this->supplierId;
    }

    public function setSupplierId(int $supplierId): void
    {
        $this->supplierId = $supplierId;
    }

    public function getTodolist(): string
    {
        return $this->todolist;
    }

    public function setTodolist(string $todolist): void
    {
        $this->todolist = $todolist;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->createdTime = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deletedTime;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deletedTime = $deletedTime;
    }
}
