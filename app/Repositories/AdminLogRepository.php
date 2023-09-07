<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AdminLogModel;
use App\Models\Entity\AdminLog;
use App\Repositories\CurdRepository;

class AdminLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdminLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdminLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdminLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveAdminLog(AdminLog $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnAdminLog(int $id): ?AdminLog
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new AdminLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnAdminLog(array $condition): ?AdminLog
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new AdminLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnAdminLog(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new AdminLog();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnAdminLog(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new AdminLog();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdminLogModel
    {
        return new AdminLogModel();
    }
}
