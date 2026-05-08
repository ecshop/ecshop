<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\PackageGoodsEntity;
use App\Models\PackageGoods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class PackageGoodsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PackageGoodsRepository $instance = null;

    /**
     * 单例 PackageGoodsRepository
     */
    public static function getInstance(): PackageGoodsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PackageGoodsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 PackageGoodsEntity
     */
    public function saveEntity(PackageGoodsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?PackageGoodsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new PackageGoodsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?PackageGoodsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new PackageGoodsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('package_goods');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new PackageGoods;
    }
}
