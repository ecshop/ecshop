<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\ShopConfigModel;
use App\Models\Entity\ShopConfig;
use App\Repositories\CurdRepository;

class ShopConfigRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ShopConfigRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ShopConfigRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ShopConfigRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveShopConfig(ShopConfig $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnShopConfig(int $id): ?ShopConfig
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new ShopConfig();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnShopConfig(array $condition): ?ShopConfig
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new ShopConfig();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnShopConfig(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new ShopConfig();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnShopConfig(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new ShopConfig();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): ShopConfigModel
    {
        return new ShopConfigModel();
    }
}
