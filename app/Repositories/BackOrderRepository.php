<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\BackOrderEntity;
use App\Models\BackOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class BackOrderRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BackOrderRepository $instance = null;

    /**
     * 单例 BackOrderRepository
     */
    public static function getInstance(): BackOrderRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BackOrderRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 BackOrderEntity
     */
    public function saveEntity(BackOrderEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BackOrderEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new BackOrderEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BackOrderEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new BackOrderEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('back_order');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new BackOrder;
    }
}
