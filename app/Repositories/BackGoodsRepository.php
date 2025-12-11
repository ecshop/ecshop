<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\BackGoodsEntity;
use App\Models\BackGoods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class BackGoodsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BackGoodsRepository $instance = null;

    /**
     * 单例 BackGoodsRepository
     */
    public static function getInstance(): BackGoodsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BackGoodsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 BackGoodsEntity
     */
    public function saveEntity(BackGoodsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BackGoodsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new BackGoodsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BackGoodsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new BackGoodsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('back_goods');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new BackGoods;
    }
}
