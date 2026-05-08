<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\GroupGoodsEntity;
use App\Models\GroupGoods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class GroupGoodsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GroupGoodsRepository $instance = null;

    /**
     * 单例 GroupGoodsRepository
     */
    public static function getInstance(): GroupGoodsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GroupGoodsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 GroupGoodsEntity
     */
    public function saveEntity(GroupGoodsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?GroupGoodsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new GroupGoodsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?GroupGoodsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new GroupGoodsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('group_goods');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new GroupGoods;
    }
}
