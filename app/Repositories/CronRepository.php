<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\CronModel;
use App\Models\Entity\Cron;
use App\Repositories\CurdRepository;

class CronRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CronRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): CronRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CronRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveCron(Cron $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnCron(int $id): ?Cron
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Cron();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnCron(array $condition): ?Cron
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Cron();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnCron(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Cron();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnCron(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Cron();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): CronModel
    {
        return new CronModel();
    }
}
