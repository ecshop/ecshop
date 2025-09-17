<?php

declare(strict_types=1);

namespace app\bundles\admin\entity;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminRoleEntity')]
class AdminRoleEntity
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '角色ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'role_name', description: '角色名称', type: 'string')]
    private string $role_name;

    #[OA\Property(property: 'action_list', description: '权限操作列表', type: 'string')]
    private string $action_list;

    #[OA\Property(property: 'role_describe', description: '角色描述', type: 'string')]
    private string $role_describe;

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

    public function getRoleName(): string
    {
        return $this->role_name;
    }

    public function setRoleName(string $roleName): void
    {
        $this->role_name = $roleName;
    }

    public function getActionList(): string
    {
        return $this->action_list;
    }

    public function setActionList(string $actionList): void
    {
        $this->action_list = $actionList;
    }

    public function getRoleDescribe(): string
    {
        return $this->role_describe;
    }

    public function setRoleDescribe(string $roleDescribe): void
    {
        $this->role_describe = $roleDescribe;
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
