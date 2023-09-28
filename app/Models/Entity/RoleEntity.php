<?php

declare(strict_types=1);

namespace App\Models\Entity;

use Focite\Generator\Support\ArrayObject;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'RoleEntity')]
class RoleEntity
{
    use ArrayObject;

    #[OA\Property(property: 'role_id', description: '', type: 'integer')]
    protected int $roleId;

    #[OA\Property(property: 'role_name', description: '', type: 'string')]
    protected string $roleName;

    #[OA\Property(property: 'action_list', description: '', type: 'string')]
    protected string $actionList;

    #[OA\Property(property: 'role_describe', description: '', type: 'string')]
    protected string $roleDescribe;

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

    /**
     * 获取
     */
    public function getRoleName(): string
    {
        return $this->roleName;
    }

    /**
     * 设置
     */
    public function setRoleName(string $roleName): void
    {
        $this->roleName = $roleName;
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
    public function getRoleDescribe(): string
    {
        return $this->roleDescribe;
    }

    /**
     * 设置
     */
    public function setRoleDescribe(string $roleDescribe): void
    {
        $this->roleDescribe = $roleDescribe;
    }
}
