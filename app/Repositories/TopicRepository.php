<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\TopicEntity;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class TopicRepository extends CurdRepository implements RepositoryInterface
{
    private static ?TopicRepository $instance = null;

    /**
     * 单例 TopicRepository
     */
    public static function getInstance(): TopicRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new TopicRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 TopicEntity
     */
    public function saveEntity(TopicEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?TopicEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new TopicEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?TopicEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new TopicEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('topic');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Topic;
    }
}
