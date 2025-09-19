<?php

declare(strict_types=1);

namespace app\bundles\shop\repository;

use app\bundles\shop\entity\ShopPluginsEntity;
use Exception;
use Juling\Foundation\Contract\RepositoryInterface;
use Juling\Foundation\Repository\CurdRepository;
use think\Model;

class ShopPluginsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ShopPluginsRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ShopPluginsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ShopPluginsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function createByEntity(ShopPluginsEntity $entity): int
    {
        return $this->create($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneEntityById(int $id): ?ShopPluginsEntity
    {
        $data = $this->findOneById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new ShopPluginsEntity;
        $entity->loadData($data);

        return $entity;
    }

    /**
     * 按照条件查询
     */
    public function findOneEntity(array $condition): ?ShopPluginsEntity
    {
        $data = $this->findOneByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new ShopPluginsEntity;
        $entity->loadData($data);

        return $entity;
    }

    /**
     * 查询列表
     *
     * @throws Exception
     */
    public function findAllEntity(array $condition = []): array
    {
        $result = $this->findAll($condition);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $entity = new ShopPluginsEntity;
            $entity->loadData($item);
            $result[$key] = $entity;
        }

        return $result;
    }

    /**
     * 分页查询
     *
     * @throws Exception
     */
    public function paginateEntity(array $condition, int $page, int $pageSize): array
    {
        $result = $this->paginate($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $entity = new ShopPluginsEntity;
            $entity->loadData($item);
            $result['data'][$key] = $entity;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(string $modelName = 'ShopPlugins'): Model
    {
        $model = '\\app\\bundles\\shop\\model\\'.$modelName.'Model';

        return new $model;
    }
}
