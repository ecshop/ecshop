<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\NavModel;
use App\Models\Entity\Nav;
use App\Repositories\CurdRepository;

class NavRepository extends CurdRepository implements RepositoryInterface
{
    private static ?NavRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): NavRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new NavRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveNav(Nav $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnNav(int $id): ?Nav
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Nav();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnNav(array $condition): ?Nav
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Nav();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnNav(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Nav();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnNav(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Nav();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): NavModel
    {
        return new NavModel();
    }
}
