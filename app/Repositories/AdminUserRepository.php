<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AdminUserModel;
use App\Models\Entity\AdminUser;
use App\Repositories\CurdRepository;

class AdminUserRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdminUserRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdminUserRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdminUserRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveAdminUser(AdminUser $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnAdminUser(int $id): ?AdminUser
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new AdminUser();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnAdminUser(array $condition): ?AdminUser
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new AdminUser();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnAdminUser(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new AdminUser();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnAdminUser(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new AdminUser();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdminUserModel
    {
        return new AdminUserModel();
    }
}
