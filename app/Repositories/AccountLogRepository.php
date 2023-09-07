<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AccountLogModel;
use App\Models\Entity\AccountLog;
use App\Repositories\CurdRepository;

class AccountLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AccountLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AccountLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AccountLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveAccountLog(AccountLog $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnAccountLog(int $id): ?AccountLog
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new AccountLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnAccountLog(array $condition): ?AccountLog
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new AccountLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnAccountLog(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new AccountLog();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnAccountLog(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new AccountLog();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AccountLogModel
    {
        return new AccountLogModel();
    }
}
