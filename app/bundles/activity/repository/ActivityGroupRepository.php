<?php

declare(strict_types=1);

namespace app\bundles\activity\repository;

use app\bundles\activity\entity\ActivityGroupEntity;
use Exception;
use Juling\Foundation\Contract\RepositoryInterface;
use Juling\Foundation\Repository\CurdRepository;
use think\Model;

class ActivityGroupRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ActivityGroupRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ActivityGroupRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ActivityGroupRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function createByEntity(ActivityGroupEntity $entity): int    {
        return $this->create($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneEntityById(int $id): ?ActivityGroupEntity
    {
        $data = $this->findOneById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new ActivityGroupEntity();
        $entity->loadData($data);

        return $entity;
    }

    /**
     * 按照条件查询
     */
    public function findOneEntity(array $condition): ?ActivityGroupEntity
    {
        $data = $this->findOneByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new ActivityGroupEntity();
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
            $entity = new ActivityGroupEntity();
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
            $entity = new ActivityGroupEntity();
            $entity->loadData($item);
            $result['data'][$key] = $entity;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(string $modelName = 'ActivityGroup'): Model
    {
        $model = '\\app\\bundles\\activity\\model\\'.$modelName.'Model';

        return new $model();
    }
}
