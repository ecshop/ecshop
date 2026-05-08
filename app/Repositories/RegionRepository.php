<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\RegionEntity;
use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class RegionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?RegionRepository $instance = null;

    /**
     * 单例 RegionRepository
     */
    public static function getInstance(): RegionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new RegionRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 RegionEntity
     */
    public function saveEntity(RegionEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?RegionEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new RegionEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?RegionEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new RegionEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('region');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Region;
    }
}
