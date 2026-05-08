<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\CollectGoodsEntity;
use App\Models\CollectGoods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class CollectGoodsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CollectGoodsRepository $instance = null;

    /**
     * 单例 CollectGoodsRepository
     */
    public static function getInstance(): CollectGoodsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CollectGoodsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 CollectGoodsEntity
     */
    public function saveEntity(CollectGoodsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?CollectGoodsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new CollectGoodsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?CollectGoodsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new CollectGoodsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('collect_goods');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new CollectGoods;
    }
}
