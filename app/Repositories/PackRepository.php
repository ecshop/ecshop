<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\PackModel;
use App\Models\Entity\Pack;
use App\Repositories\CurdRepository;

class PackRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PackRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): PackRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PackRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function savePack(Pack $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnPack(int $id): ?Pack
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Pack();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnPack(array $condition): ?Pack
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Pack();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnPack(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Pack();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnPack(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Pack();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): PackModel
    {
        return new PackModel();
    }
}
