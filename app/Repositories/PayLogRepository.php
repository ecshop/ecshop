<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\PayLogModel;
use App\Models\Entity\PayLog;
use App\Repositories\CurdRepository;

class PayLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PayLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): PayLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PayLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function savePayLog(PayLog $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnPayLog(int $id): ?PayLog
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new PayLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnPayLog(array $condition): ?PayLog
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new PayLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnPayLog(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new PayLog();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnPayLog(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new PayLog();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): PayLogModel
    {
        return new PayLogModel();
    }
}
