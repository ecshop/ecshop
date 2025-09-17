<?php

declare(strict_types=1);

namespace app\modules\admin\response\adminRole;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'AdminRoleResponse')]
class AdminRoleResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'id', description: '角色ID', type: 'integer')]
    private int $id;

    #[OA\Property(property: 'roleName', description: '角色名称', type: 'string')]
    private string $roleName;

    #[OA\Property(property: 'actionList', description: '权限操作列表', type: 'string')]
    private string $actionList;

    #[OA\Property(property: 'roleDescribe', description: '角色描述', type: 'string')]
    private string $roleDescribe;

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

    public function getRoleName(): string
    {
        return $this->roleName;
    }

    public function setRoleName(string $roleName): void
    {
        $this->roleName = $roleName;
    }

    public function getActionList(): string
    {
        return $this->actionList;
    }

    public function setActionList(string $actionList): void
    {
        $this->actionList = $actionList;
    }

    public function getRoleDescribe(): string
    {
        return $this->roleDescribe;
    }

    public function setRoleDescribe(string $roleDescribe): void
    {
        $this->roleDescribe = $roleDescribe;
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
