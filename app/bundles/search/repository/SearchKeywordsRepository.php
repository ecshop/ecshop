<?php

declare(strict_types=1);

namespace app\bundles\search\repository;

use app\bundles\search\entity\SearchKeywordsEntity;
use Exception;
use Juling\Foundation\Contract\RepositoryInterface;
use Juling\Foundation\Repository\CurdRepository;
use think\Model;

class SearchKeywordsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SearchKeywordsRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SearchKeywordsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SearchKeywordsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function createByEntity(SearchKeywordsEntity $entity): int
    {
        return $this->create($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneEntityById(int $id): ?SearchKeywordsEntity
    {
        $data = $this->findOneById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new SearchKeywordsEntity;
        $entity->loadData($data);

        return $entity;
    }

    /**
     * 按照条件查询
     */
    public function findOneEntity(array $condition): ?SearchKeywordsEntity
    {
        $data = $this->findOneByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new SearchKeywordsEntity;
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
            $entity = new SearchKeywordsEntity;
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
            $entity = new SearchKeywordsEntity;
            $entity->loadData($item);
            $result['data'][$key] = $entity;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(string $modelName = 'SearchKeywords'): Model
    {
        $model = '\\app\\bundles\\search\\model\\'.$modelName.'Model';

        return new $model;
    }
}
