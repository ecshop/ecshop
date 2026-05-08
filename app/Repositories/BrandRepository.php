<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\BrandEntity;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class BrandRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BrandRepository $instance = null;

    /**
     * 单例 BrandRepository
     */
    public static function getInstance(): BrandRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BrandRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 BrandEntity
     */
    public function saveEntity(BrandEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BrandEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new BrandEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BrandEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new BrandEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('brand');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Brand;
    }
}
