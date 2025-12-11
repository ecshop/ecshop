<?php

declare(strict_types=1);

namespace App\Api\Admin\Responses\Role;

use Juling\Foundation\Support\DTOHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'RoleResponse')]
class RoleResponse
{
    use DTOHelper;

    #[OA\Property(property: 'roleId', description: '', type: 'integer')]
    private int $roleId;

    #[OA\Property(property: 'roleName', description: '', type: 'string')]
    private string $roleName;

    #[OA\Property(property: 'actionList', description: '', type: 'string')]
    private string $actionList;

    #[OA\Property(property: 'roleDescribe', description: '', type: 'string')]
    private string $roleDescribe;

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
