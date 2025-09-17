<?php

declare(strict_types=1);

namespace app\bundles\admin\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminUserEntity')]
class AdminUserEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '用户ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'user_name', description: '用户名', type: 'string')]
    private string $user_name;

    #[OA\Property(property: 'email', description: '邮箱', type: 'string')]
    private string $email;

    #[OA\Property(property: 'password', description: '登录密码', type: 'string')]
    private string $password;

    #[OA\Property(property: 'ec_salt', description: '加密盐', type: 'string')]
    private string $ec_salt;

    #[OA\Property(property: 'add_time', description: '添加时间', type: 'integer')]
    private int $add_time;

    #[OA\Property(property: 'last_login', description: '最后登录时间', type: 'integer')]
    private int $last_login;

    #[OA\Property(property: 'last_ip', description: '最后登录IP', type: 'string')]
    private string $last_ip;

    #[OA\Property(property: 'action_list', description: '操作权限列表', type: 'string')]
    private string $action_list;

    #[OA\Property(property: 'nav_list', description: '导航列表', type: 'string')]
    private string $nav_list;

    #[OA\Property(property: 'lang_type', description: '语言类型', type: 'string')]
    private string $lang_type;

    #[OA\Property(property: 'agency_id', description: '机构ID', type: 'integer')]
    private int $agency_id;

    #[OA\Property(property: 'supplier_id', description: '供应商ID', type: 'integer')]
    private int $supplier_id;

    #[OA\Property(property: 'todolist', description: '待办事项', type: 'string')]
    private string $todolist;

    #[OA\Property(property: 'role_id', description: '角色ID', type: 'integer')]
    private int $role_id;

    #[OA\Property(property: 'created_time', description: '创建时间', type: 'string')]
    private string $created_time;

    #[OA\Property(property: 'updated_time', description: '更新时间', type: 'string')]
    private string $updated_time;

    #[OA\Property(property: 'deleted_time', description: '删除时间', type: 'string')]
    private string $deleted_time;

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
        return $this->user_name;
    }

    public function setUserName(string $userName): void
    {
        $this->user_name = $userName;
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
        return $this->ec_salt;
    }

    public function setEcSalt(string $ecSalt): void
    {
        $this->ec_salt = $ecSalt;
    }

    public function getAddTime(): int
    {
        return $this->add_time;
    }

    public function setAddTime(int $addTime): void
    {
        $this->add_time = $addTime;
    }

    public function getLastLogin(): int
    {
        return $this->last_login;
    }

    public function setLastLogin(int $lastLogin): void
    {
        $this->last_login = $lastLogin;
    }

    public function getLastIp(): string
    {
        return $this->last_ip;
    }

    public function setLastIp(string $lastIp): void
    {
        $this->last_ip = $lastIp;
    }

    public function getActionList(): string
    {
        return $this->action_list;
    }

    public function setActionList(string $actionList): void
    {
        $this->action_list = $actionList;
    }

    public function getNavList(): string
    {
        return $this->nav_list;
    }

    public function setNavList(string $navList): void
    {
        $this->nav_list = $navList;
    }

    public function getLangType(): string
    {
        return $this->lang_type;
    }

    public function setLangType(string $langType): void
    {
        $this->lang_type = $langType;
    }

    public function getAgencyId(): int
    {
        return $this->agency_id;
    }

    public function setAgencyId(int $agencyId): void
    {
        $this->agency_id = $agencyId;
    }

    public function getSupplierId(): int
    {
        return $this->supplier_id;
    }

    public function setSupplierId(int $supplierId): void
    {
        $this->supplier_id = $supplierId;
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
        return $this->role_id;
    }

    public function setRoleId(int $roleId): void
    {
        $this->role_id = $roleId;
    }

    public function getCreatedTime(): string
    {
        return $this->created_time;
    }

    public function setCreatedTime(string $createdTime): void
    {
        $this->created_time = $createdTime;
    }

    public function getUpdatedTime(): string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updated_time = $updatedTime;
    }

    public function getDeletedTime(): string
    {
        return $this->deleted_time;
    }

    public function setDeletedTime(string $deletedTime): void
    {
        $this->deleted_time = $deletedTime;
    }
}
