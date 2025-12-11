<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\AreaRegionEntity;
use App\Models\AreaRegion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class AreaRegionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AreaRegionRepository $instance = null;

    /**
     * 单例 AreaRegionRepository
     */
    public static function getInstance(): AreaRegionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AreaRegionRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 AreaRegionEntity
     */
    public function saveEntity(AreaRegionEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AreaRegionEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new AreaRegionEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AreaRegionEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new AreaRegionEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('area_region');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new AreaRegion;
    }
}
