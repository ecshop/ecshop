<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\AgencyEntity;
use App\Models\Agency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class AgencyRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AgencyRepository $instance = null;

    /**
     * 单例 AgencyRepository
     */
    public static function getInstance(): AgencyRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AgencyRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 AgencyEntity
     */
    public function saveEntity(AgencyEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AgencyEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new AgencyEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AgencyEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new AgencyEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('agency');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Agency;
    }
}
