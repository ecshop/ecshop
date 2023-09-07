<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\ErrorLogModel;
use App\Models\Entity\ErrorLog;
use App\Repositories\CurdRepository;

class ErrorLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ErrorLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ErrorLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ErrorLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveErrorLog(ErrorLog $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnErrorLog(int $id): ?ErrorLog
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new ErrorLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnErrorLog(array $condition): ?ErrorLog
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new ErrorLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnErrorLog(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new ErrorLog();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnErrorLog(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new ErrorLog();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): ErrorLogModel
    {
        return new ErrorLogModel();
    }
}
