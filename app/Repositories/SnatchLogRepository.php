<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\SnatchLogEntity;
use App\Models\SnatchLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class SnatchLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SnatchLogRepository $instance = null;

    /**
     * 单例 SnatchLogRepository
     */
    public static function getInstance(): SnatchLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SnatchLogRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 SnatchLogEntity
     */
    public function saveEntity(SnatchLogEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?SnatchLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new SnatchLogEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?SnatchLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new SnatchLogEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('snatch_log');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new SnatchLog;
    }
}
