<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\FavourableActivityModel;
use App\Models\Entity\FavourableActivity;
use App\Repositories\CurdRepository;

class FavourableActivityRepository extends CurdRepository implements RepositoryInterface
{
    private static ?FavourableActivityRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): FavourableActivityRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new FavourableActivityRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveFavourableActivity(FavourableActivity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnFavourableActivity(int $id): ?FavourableActivity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new FavourableActivity();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnFavourableActivity(array $condition): ?FavourableActivity
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new FavourableActivity();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnFavourableActivity(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new FavourableActivity();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnFavourableActivity(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new FavourableActivity();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): FavourableActivityModel
    {
        return new FavourableActivityModel();
    }
}
