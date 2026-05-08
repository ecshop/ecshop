<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\PackEntity;
use App\Models\Pack;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class PackRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PackRepository $instance = null;

    /**
     * 单例 PackRepository
     */
    public static function getInstance(): PackRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PackRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 PackEntity
     */
    public function saveEntity(PackEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?PackEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new PackEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?PackEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new PackEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('pack');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Pack;
    }
}
