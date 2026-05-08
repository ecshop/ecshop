<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\RegFieldsEntity;
use App\Models\RegFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class RegFieldsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?RegFieldsRepository $instance = null;

    /**
     * 单例 RegFieldsRepository
     */
    public static function getInstance(): RegFieldsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new RegFieldsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 RegFieldsEntity
     */
    public function saveEntity(RegFieldsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?RegFieldsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new RegFieldsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?RegFieldsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new RegFieldsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('reg_fields');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new RegFields;
    }
}
