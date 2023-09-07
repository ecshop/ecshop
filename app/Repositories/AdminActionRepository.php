<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AdminActionModel;
use App\Models\Entity\AdminAction;
use App\Repositories\CurdRepository;

class AdminActionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdminActionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdminActionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdminActionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveAdminAction(AdminAction $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnAdminAction(int $id): ?AdminAction
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new AdminAction();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnAdminAction(array $condition): ?AdminAction
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new AdminAction();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnAdminAction(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new AdminAction();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnAdminAction(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new AdminAction();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdminActionModel
    {
        return new AdminActionModel();
    }
}
