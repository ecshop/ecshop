<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\StatModel;
use App\Models\Entity\Stat;
use App\Repositories\CurdRepository;

class StatRepository extends CurdRepository implements RepositoryInterface
{
    private static ?StatRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): StatRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new StatRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveStat(Stat $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnStat(int $id): ?Stat
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Stat();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnStat(array $condition): ?Stat
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Stat();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnStat(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Stat();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnStat(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Stat();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): StatModel
    {
        return new StatModel();
    }
}
