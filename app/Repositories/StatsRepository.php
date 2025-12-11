<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\StatsEntity;
use App\Models\Stats;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class StatsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?StatsRepository $instance = null;

    /**
     * 单例 StatsRepository
     */
    public static function getInstance(): StatsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new StatsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 StatsEntity
     */
    public function saveEntity(StatsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?StatsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new StatsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?StatsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new StatsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('stats');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Stats;
    }
}
