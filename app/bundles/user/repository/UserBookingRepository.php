<?php

declare(strict_types=1);

namespace app\bundles\user\repository;

use app\bundles\user\entity\UserBookingEntity;
use Exception;
use Juling\Foundation\Contract\RepositoryInterface;
use Juling\Foundation\Repository\CurdRepository;
use think\Model;

class UserBookingRepository extends CurdRepository implements RepositoryInterface
{
    private static ?UserBookingRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): UserBookingRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new UserBookingRepository;
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function createByEntity(UserBookingEntity $entity): int
    {
        return $this->create($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneEntityById(int $id): ?UserBookingEntity
    {
        $data = $this->findOneById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new UserBookingEntity;
        $entity->loadData($data);

        return $entity;
    }

    /**
     * 按照条件查询
     */
    public function findOneEntity(array $condition): ?UserBookingEntity
    {
        $data = $this->findOneByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new UserBookingEntity;
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
            $entity = new UserBookingEntity;
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
            $entity = new UserBookingEntity;
            $entity->loadData($item);
            $result['data'][$key] = $entity;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(string $modelName = 'UserBooking'): Model
    {
        $model = '\\app\\bundles\\user\\model\\'.$modelName.'Model';

        return new $model;
    }
}
