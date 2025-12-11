<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\FavourableActivityEntity;
use App\Models\FavourableActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class FavourableActivityRepository extends CurdRepository implements RepositoryInterface
{
    private static ?FavourableActivityRepository $instance = null;

    /**
     * 单例 FavourableActivityRepository
     */
    public static function getInstance(): FavourableActivityRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new FavourableActivityRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 FavourableActivityEntity
     */
    public function saveEntity(FavourableActivityEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?FavourableActivityEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new FavourableActivityEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?FavourableActivityEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new FavourableActivityEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('favourable_activity');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new FavourableActivity;
    }
}
