<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\SnatchLogModel;
use App\Models\Entity\SnatchLog;
use App\Repositories\CurdRepository;

class SnatchLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SnatchLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SnatchLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SnatchLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveSnatchLog(SnatchLog $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnSnatchLog(int $id): ?SnatchLog
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new SnatchLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnSnatchLog(array $condition): ?SnatchLog
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new SnatchLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnSnatchLog(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new SnatchLog();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnSnatchLog(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new SnatchLog();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): SnatchLogModel
    {
        return new SnatchLogModel();
    }
}
